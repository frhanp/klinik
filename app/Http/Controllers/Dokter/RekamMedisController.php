<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;
use App\Models\Tindakan;
use App\Models\User;
use App\Models\Obat;
use App\Models\DaftarTindakan;

class RekamMedisController extends Controller
{

    public function index(Request $request)
    {
        $dokterId = Auth::user()->dokter->id;

        // tambahan: query ringkasan per pasien
        $query = RekamMedis::query()
            ->selectRaw('u.id as pasien_id, u.name as nama_pasien,
            COUNT(rm.id) as jumlah_kunjungan,
            MAX(rm.created_at) as terakhir_kunjungan,
            MAX(rm.diagnosis) as diagnosis_terakhir')
            ->from('rekam_medis as rm')
            ->join('pemesanan as p', 'p.id', '=', 'rm.id_pemesanan')
            ->join('users as u', 'u.id', '=', 'p.id_pasien')
            ->where('p.id_dokter', $dokterId)
            ->groupBy('u.id', 'u.name')
            ->orderByDesc('terakhir_kunjungan');

        // tambahan: pencarian pasien
        if ($request->has('search') && $request->search != '') {
            $query->where('u.name', 'like', '%' . $request->search . '%');
        }

        $pasienRingkas = $query->paginate(10)->withQueryString();

        return view('dokter.rekam-medis.index', compact('pasienRingkas')); // tambahan: ganti variabel
    }

    // tambahan: tampilkan semua rekam medis milik pasien tertentu
    public function showByPasien(User $pasien)
    {
        $dokterId = Auth::user()->dokter->id;

        $rekamMedisList = RekamMedis::with(['pemesanan', 'tindakan', 'resep', 'foto'])
            ->whereHas(
                'pemesanan',
                fn($q) =>
                $q->where('id_pasien', $pasien->id)
                    ->where('id_dokter', $dokterId)
            )
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('dokter.rekam-medis.pasien', compact('pasien', 'rekamMedisList'));
    }
    public function create(Request $request)
{
    $pemesanan = Pemesanan::with('pasien', 'tindakanAwal')->findOrFail($request->query('id_pemesanan'));
    if ($pemesanan->id_dokter !== Auth::user()->dokter->id) {
        abort(403);
    }

    $daftarTindakans = DaftarTindakan::with('tindakanItems')->orderBy('nama_kategori')->get();

    $obats = Obat::where('stok', '>', 0)->orderBy('nama_obat')->get();
    $tindakanAwalIds = $pemesanan->tindakanAwal->pluck('id')->toArray();
    
    return view('dokter.rekam-medis.create', compact('pemesanan', 'daftarTindakans', 'obats', 'tindakanAwalIds'));
}

    public function store(Request $request)
    {
        // [MODIFIKASI] Validasi diganti total untuk resep
        $request->validate([
            'id_pemesanan' => ['required', 'exists:pemesanan,id'],
            'diagnosis' => ['required', 'string'],
            'perawatan' => ['required', 'string'],
            'catatan' => ['nullable', 'string'],
            'tindakans' => ['nullable', 'array'],
            'tindakans.*' => ['exists:tindakan,id'],
            'foto.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            // Validasi baru untuk resep yang terintegrasi
            'resep' => ['nullable', 'array'],
            'resep.*.obat_id' => ['required_with:resep', 'exists:obat,id'],
            'resep.*.tipe_harga' => ['required_with:resep', 'in:resep,non_resep'],
            'resep.*.jumlah' => ['required_with:resep', 'integer', 'min:1'],
            'resep.*.dosis' => ['nullable', 'string', 'max:100'],
            'resep.*.instruksi' => ['nullable', 'string'],
        ]);

        $pemesanan = Pemesanan::with('pembayaran')->findOrFail($request->id_pemesanan);
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) {
            abort(403);
        }

        if ($pemesanan->status === 'Selesai') {
            return redirect()->route('dokter.dashboard')->with('error', 'Tidak dapat mengubah rekam medis karena pembayaran sudah lunas.');
        }

        DB::transaction(function () use ($request, $pemesanan) {
            $rekamMedis = RekamMedis::updateOrCreate(
                ['id_pemesanan' => $pemesanan->id],
                $request->only('diagnosis', 'perawatan', 'catatan')
            );

            // --- [REVISI TOTAL] Logika Kalkulasi Biaya & Penyimpanan ---
            $totalBiaya = 0;

            // 1. Hitung biaya dari tindakan
            $tindakansToSync = [];
            if ($request->has('tindakans')) {
                $tindakansTerpilih = Tindakan::find($request->tindakans);
                foreach ($tindakansTerpilih as $tindakan) {
                    $tindakansToSync[$tindakan->id] = ['harga_saat_itu' => $tindakan->harga];
                    $totalBiaya += $tindakan->harga;
                }
            }
            $rekamMedis->tindakan()->sync($tindakansToSync);

            // 2. Proses resep, hitung biayanya, dan simpan (TERMASUK HARGA)
            if ($request->has('resep') && is_array($request->resep)) {
                $rekamMedis->resep()->delete(); // Hapus resep lama

                foreach ($request->resep as $item) {
                    if (!empty($item['obat_id']) && !empty($item['jumlah'])) {
                        $obat = Obat::find($item['obat_id']);
                        if ($obat) {
                            // Tentukan harga satuan berdasarkan pilihan dokter
                            $hargaSatuan = ($item['tipe_harga'] === 'resep')
                                ? $obat->harga_jual_resep
                                : $obat->harga_jual_non_resep;

                            // Tambahkan total harga obat ke total biaya keseluruhan
                            $totalBiaya += $hargaSatuan * $item['jumlah'];

                            // Buat resep baru DAN SIMPAN HARGANYA
                            $rekamMedis->resep()->create([
                                'obat_id'          => $item['obat_id'],
                                'jumlah'           => $item['jumlah'],
                                'harga_saat_resep' => $hargaSatuan, // <-- INI BAGIAN PENTINGNYA
                                'dosis'            => $item['dosis'] ?? null,
                                'instruksi'        => $item['instruksi'] ?? null,
                            ]);

                            // Kurangi stok obat
                            $obat->decrement('stok', $item['jumlah']);
                        }
                    }
                }
            }

            // 3. Setelah semua biaya terhitung, baru simpan ke pembayaran
            if ($totalBiaya > 0) {
                $pemesanan->pembayaran()->updateOrCreate(
                    ['pemesanan_id' => $pemesanan->id],
                    ['total_biaya' => $totalBiaya, 'status' => 'Belum Lunas']
                );
            } elseif ($pemesanan->pembayaran) {
                $pemesanan->pembayaran->delete();
            }
            // --- Akhir Revisi ---

            // Logika Foto & Status (Biarkan sama)
            if ($request->hasFile('foto')) {
                // ... (kode foto Anda) ...
            }

            if ($pemesanan->status !== 'Selesai') {
                $statusAkhir = ($totalBiaya > 0) ? 'Menunggu Pembayaran' : 'Selesai';
                $pemesanan->update(['status' => $statusAkhir]);
            }
        });

        return redirect()->route('dokter.dashboard')->with('success', 'Rekam medis berhasil disimpan.');
    }

    public function show(RekamMedis $rekamMedi) // Menggunakan nama variabel $rekamMedi dari route
    {
        // Pastikan dokter hanya bisa melihat rekam medis dari pasiennya
        if ($rekamMedi->pemesanan->id_dokter !== Auth::user()->dokter->id) {
            abort(403);
        }

        // [MODIFIKASI] Muat semua relasi yang dibutuhkan untuk rincian biaya
        $rekamMedi->load([
            'pemesanan.pasien',
            'pemesanan.pembayaran', // Untuk total biaya final
            'tindakan',
            'resep.obat', // Untuk rincian resep & harga
            'foto'
        ]);

        // Ganti nama variabel agar konsisten
        $rekamMedis = $rekamMedi;

        return view('dokter.rekam-medis.show', compact('rekamMedis'));
    }
}

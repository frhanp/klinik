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

        // [MODIFIKASI] Query diubah untuk join ke biodata_pasien dan mengambil NIK
        $query = RekamMedis::query()
            ->selectRaw('u.id as pasien_id, u.name as nama_pasien, bp.nik as nik_pasien,
               COUNT(rm.id) as jumlah_kunjungan,
               MAX(rm.created_at) as terakhir_kunjungan,
               MAX(rm.diagnosis) as diagnosis_terakhir')
            ->from('rekam_medis as rm')
            ->join('pemesanan as p', 'p.id', '=', 'rm.id_pemesanan')
            ->join('users as u', 'u.id', '=', 'p.id_pasien')
            ->leftJoin('biodata_pasien as bp', 'u.id', '=', 'bp.user_id') // Join untuk NIK
            ->where('p.id_dokter', $dokterId)
            ->groupBy('u.id', 'u.name', 'bp.nik') // Tambah NIK ke group by
            ->orderByDesc('terakhir_kunjungan');

        // Pencarian diperluas untuk bisa mencari berdasarkan NIK
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('u.name', 'like', '%' . $request->search . '%')
                    ->orWhere('bp.nik', 'like', '%' . $request->search . '%');
            });
        }

        $pasienRingkas = $query->paginate(10)->withQueryString();

        return view('dokter.rekam-medis.index', compact('pasienRingkas'));
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
    $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);

    $rekamMedis = $pemesanan->rekamMedis()->create([
        'diagnosis' => $request->diagnosis,
        'perawatan' => $request->perawatan,
        'catatan'   => $request->catatan,
    ]);

    $subtotalTindakan = 0;
    $subtotalObat = 0;
    $potongan = 0;

    // === Tindakan ===
    if ($request->tindakans) {
        foreach ($request->tindakans as $id) {
            $tindakan = Tindakan::find($id);
            if ($tindakan) {
                $rekamMedis->tindakan()->attach($id, [
                    'harga_saat_itu' => $tindakan->harga
                ]);
                $subtotalTindakan += $tindakan->harga;

                // Potongan BPJS untuk tindakan (Rp 2.500 per tindakan)
                if ($pemesanan->status_pasien == 'BPJS') {
                    $potongan += 2500;
                }
            }
        }
    }

    // === Obat ===
    if ($request->resep) {
        foreach ($request->resep as $item) {
            if (!empty($item['obat_id']) && !empty($item['jumlah'])) {
                $obat = Obat::find($item['obat_id']);
                if ($obat) {
                    $hargaSatuan = ($item['tipe_harga'] === 'resep')
                        ? $obat->harga_jual_resep
                        : $obat->harga_jual_non_resep;

                    $rekamMedis->resep()->create([
                        'obat_id'          => $item['obat_id'],
                        'jumlah'           => $item['jumlah'],
                        'harga_saat_resep' => $hargaSatuan,
                        'dosis'            => $item['dosis'] ?? null,
                        'instruksi'        => $item['instruksi'] ?? null,
                    ]);

                    $subtotalObat += $hargaSatuan * $item['jumlah'];

                    // Potongan BPJS: seluruh harga obat digratiskan
                    if ($pemesanan->status_pasien == 'BPJS') {
                        $potongan += $hargaSatuan * $item['jumlah'];
                    }

                    $obat->decrement('stok', $item['jumlah']);
                }
            }
        }
    }

    // === Subtotal & Total ===
    $subtotal = $subtotalTindakan + $subtotalObat;

    // Inhealth: potongan manual dari input form
    if ($pemesanan->status_pasien == 'Inhealth' && $request->filled('potongan')) {
        $potongan = (float) $request->potongan;
    }

    $totalFinal = max(0, $subtotal - $potongan);

    // === Simpan ke Pembayaran ===
    $pemesanan->pembayaran()->updateOrCreate(
        ['pemesanan_id' => $pemesanan->id],
        [
            'subtotal'         => $subtotal,
            'potongan'         => $potongan,
            'total_biaya'      => $totalFinal,
            'status_pembayaran'=> $totalFinal > 0 ? 'Menunggu Pembayaran' : 'Selesai'
        ]
    );

    return redirect()->route('dokter.dashboard')
        ->with('success', 'Rekam medis berhasil dibuat.');
}


    public function show(RekamMedis $rekamMedi) // Menggunakan nama variabel $rekamMedi dari route
    {
        // Pastikan dokter hanya bisa melihat rekam medis dari pasiennya
        if ($rekamMedi->pemesanan->id_dokter !== Auth::user()->dokter->id) {
            abort(403);
        }

        // Muat semua relasi yang dibutuhkan untuk rincian biaya
        $rekamMedi->load([
            'pemesanan.pasien',
            'pemesanan.pembayaran', // Untuk total biaya final
            'pemesanan.tindakan', // [MODIFIKASI] Eager load tindakan dari pemesanan
            'tindakan',
            'resep.obat', // Untuk rincian resep & harga
            'foto'
        ]);

        // [MODIFIKASI] Ambil ID tindakan awal dari relasi pemesanan yang sudah di-load
        $tindakanAwalIds = $rekamMedi->pemesanan->tindakan->pluck('id')->toArray();

        // Ganti nama variabel agar konsisten di view
        $rekamMedis = $rekamMedi;

        // [MODIFIKASI] Kirim data tindakanAwalIds ke view
        return view('dokter.rekam-medis.show', compact('rekamMedis', 'tindakanAwalIds'));
    }
}

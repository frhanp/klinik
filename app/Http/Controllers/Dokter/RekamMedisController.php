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
        $pemesanan = Pemesanan::with('pasien')->findOrFail($request->query('id_pemesanan'));
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) abort(403);

        $tindakans = Tindakan::all(); // <-- Ambil semua data tindakan

        return view('dokter.rekam-medis.create', compact('pemesanan', 'tindakans')); // <-- Kirim ke view
    }

    public function store(Request $request)
{
    $request->validate([
        'id_pemesanan' => ['required', 'exists:pemesanan,id'],
        'diagnosis' => ['required', 'string'],
        'perawatan' => ['required', 'string'],
        'catatan' => ['nullable', 'string'],
        'tindakans' => ['nullable', 'array'],
        'tindakans.*' => ['exists:tindakan,id'],
        'resep.*.nama_obat' => ['nullable', 'string', 'max:255'],
        'resep.*.dosis' => ['nullable', 'string', 'max:100'],
        'resep.*.instruksi' => ['nullable', 'string'],
        'foto.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
    ]);

    $pemesanan = Pemesanan::with('pembayaran')->findOrFail($request->id_pemesanan);
    if ($pemesanan->id_dokter !== Auth::user()->dokter->id) {
        abort(403);
    }

    // Blokir proses jika pembayaran sudah lunas (Selesai)
    if ($pemesanan->status === 'Selesai') {
        return redirect()->route('dokter.dashboard')->with('error', 'Tidak dapat mengubah rekam medis karena pembayaran sudah lunas.');
    }

    DB::transaction(function () use ($request, $pemesanan) {
        // Gunakan updateOrCreate untuk menghindari duplikasi rekam medis
        $rekamMedis = RekamMedis::updateOrCreate(
            ['id_pemesanan' => $pemesanan->id],
            $request->only('diagnosis', 'perawatan', 'catatan')
        );

        // --- Logika Perbaikan untuk Tindakan dan Harga ---
        $totalBiaya = 0;
        $tindakansToSync = []; 

        if ($request->has('tindakans')) {
            $tindakansTerpilih = Tindakan::find($request->tindakans);
            foreach ($tindakansTerpilih as $tindakan) {
                // Siapkan array untuk sync dengan menyertakan harga_saat_itu
                $tindakansToSync[$tindakan->id] = ['harga_saat_itu' => $tindakan->harga];
                $totalBiaya += $tindakan->harga;
            }
        }
        // Jalankan sync untuk memperbarui tindakan dan harga di tabel pivot
        $rekamMedis->tindakan()->sync($tindakansToSync);
        // --- Akhir Perbaikan ---

        // Logika untuk memperbarui atau membuat pembayaran
        if ($totalBiaya > 0) {
            $pemesanan->pembayaran()->updateOrCreate(
                ['pemesanan_id' => $pemesanan->id],
                [
                    'total_biaya' => $totalBiaya,
                    'status' => 'Belum Lunas',
                ]
            );
        } elseif ($pemesanan->pembayaran) {
            $pemesanan->pembayaran->delete();
        }
        
        // Proses Resep dan Foto (tetap sama)
        if ($request->has('resep') && is_array($request->resep)) {
            $rekamMedis->resep()->delete(); // Hapus resep lama dulu
            foreach ($request->resep as $item) {
                if (is_array($item) && !empty($item['nama_obat'])) {
                    $rekamMedis->resep()->create($item);
                }
            }
        }

        if ($request->hasFile('foto')) {
            // (Optional) Hapus foto lama jika perlu
            foreach ($request->file('foto') as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                    $path = $file->store('foto-rekam-medis', 'public');
                    $rekamMedis->foto()->create(['path_foto' => $path]);
                }
            }
        }

        // Logika status akhir yang aman: HANYA ubah status jika belum lunas
        if ($pemesanan->status !== 'Selesai') {
            $statusAkhir = ($totalBiaya > 0) ? 'Menunggu Pembayaran' : 'Selesai';
            $pemesanan->update(['status' => $statusAkhir]);
        }
    });

    return redirect()->route('dokter.dashboard')->with('success', 'Rekam medis berhasil disimpan.');
}

    public function show(RekamMedis $rekamMedi)
    {
        $rekamMedis = $rekamMedi;
        // Pastikan dokter hanya bisa melihat rekam medis dari pasiennya
        if ($rekamMedis->pemesanan->id_dokter !== Auth::user()->dokter->id) abort(403);

        $rekamMedis->load(['pemesanan.pasien', 'resep', 'foto', 'tindakan']); // Muat juga data tindakan
        return view('dokter.rekam-medis.show', compact('rekamMedis'));
    }
}

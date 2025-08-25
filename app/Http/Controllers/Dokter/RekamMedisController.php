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

        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) abort(403);

        DB::transaction(function () use ($request, $pemesanan) {
            $rekamMedis = RekamMedis::create($request->only('id_pemesanan', 'diagnosis', 'perawatan', 'catatan'));

            $totalBiaya = 0;
            if ($request->has('tindakans')) {
                $tindakansTerpilih = Tindakan::find($request->tindakans);
                foreach ($tindakansTerpilih as $tindakan) {
                    $rekamMedis->tindakan()->attach($tindakan->id, ['harga_saat_itu' => $tindakan->harga]);
                    $totalBiaya += $tindakan->harga;
                }
            }

            if ($totalBiaya > 0) {
                $pemesanan->pembayaran()->create([
                    'total_biaya' => $totalBiaya,
                    'status' => 'Belum Lunas',
                ]);
            }

            // Proses Resep (hanya jika ada dan valid)
            if ($request->has('resep') && is_array($request->resep)) {
                foreach ($request->resep as $item) {
                    if (is_array($item) && !empty($item['nama_obat'])) {
                        $rekamMedis->resep()->create([
                            'nama_obat' => $item['nama_obat'],
                            'dosis' => $item['dosis'] ?? '',
                            'instruksi' => $item['instruksi'] ?? ''
                        ]);
                    }
                }
            }

            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $file) {
                    if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                        $path = $file->store('foto-rekam-medis', 'public');
                        $rekamMedis->foto()->create(['path_foto' => $path]);
                    }
                }
            }

            $statusAkhir = ($totalBiaya > 0) ? 'Menunggu Pembayaran' : 'Selesai';
            $pemesanan->update(['status' => $statusAkhir]);
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

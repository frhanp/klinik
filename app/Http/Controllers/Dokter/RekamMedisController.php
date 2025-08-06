<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;
use App\Models\Tindakan;

class RekamMedisController extends Controller
{

    public function index(Request $request)
    {
        $dokterId = Auth::user()->dokter->id;

        // Query dasar untuk mengambil rekam medis milik dokter yang login
        $query = RekamMedis::query()
            ->whereHas('pemesanan', function ($q) use ($dokterId) {
                $q->where('id_dokter', $dokterId);
            })
            ->with('pemesanan.pasien') // Eager load relasi untuk efisiensi
            ->latest(); // Urutkan dari yang terbaru

        // Fitur Pencarian berdasarkan nama pasien
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('pemesanan.pasien', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $rekamMedisList = $query->paginate(10); // Tampilkan 10 data per halaman

        return view('dokter.rekam-medis.index', compact('rekamMedisList'));
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

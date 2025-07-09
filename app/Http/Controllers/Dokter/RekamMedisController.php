<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function create(Request $request)
    {
        $pemesanan = Pemesanan::with('pasien')->findOrFail($request->query('id_pemesanan'));
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) abort(403);
        
        return view('dokter.rekam-medis.create', compact('pemesanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pemesanan' => ['required', 'exists:pemesanan,id'],
            'diagnosis' => ['required', 'string'],
            'perawatan' => ['required', 'string'],
            'catatan' => ['nullable', 'string'],
            'resep.*.nama_obat' => ['nullable', 'string', 'max:255'],
            'resep.*.dosis' => ['nullable', 'string', 'max:100'],
            'resep.*.instruksi' => ['nullable', 'string'],
            'foto.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $pemesanan = Pemesanan::findOrFail($request->id_pemesanan);
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) abort(403);

        DB::transaction(function () use ($request, $pemesanan) {
            $rekamMedis = RekamMedis::create($request->only('id_pemesanan', 'diagnosis', 'perawatan', 'catatan'));

            if ($request->has('resep')) {
                foreach ($request->resep as $item) {
                    if (!empty($item['nama_obat'])) $rekamMedis->resep()->create($item);
                }
            }

            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $file) {
                    $path = $file->store('foto-rekam-medis', 'public');
                    $rekamMedis->foto()->create(['path_foto' => $path]);
                }
            }
            
            $pemesanan->update(['status' => 'Selesai']);
        });

        return redirect()->route('dokter.dashboard')->with('success', 'Rekam medis berhasil disimpan.');
    }

    public function show(RekamMedis $rekamMedi)
    {
        $rekamMedis = $rekamMedi;
        if ($rekamMedis->pemesanan->id_dokter !== Auth::user()->dokter->id) abort(403);
        
        $rekamMedis->load(['pemesanan.pasien', 'resep', 'foto']);
        return view('dokter.rekam-medis.show', compact('rekamMedis'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dokter;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('user', 'jadwal')->get()->map(function ($dokter) {
            $jadwalRingkas = $this->ringkasJadwal($dokter->jadwal);
            $dokter->hari_praktek = $jadwalRingkas['hari'];
            $dokter->jam_praktek = $jadwalRingkas['jam'];
            return $dokter;
        });

        return view('admin.jadwal.index', compact('dokters'));
    }

    public function show(Dokter $dokter)
    {
        // Di Laravel, jika parameter route adalah {jadwal}, kita harus menerima Dokter
        // karena resource 'jadwal' terikat pada model Jadwal.
        // Kita ubah cara memanggilnya di view nanti.
        // Untuk sekarang, kita terima ID dan cari dokternya.
        // Solusi lebih baik: ubah parameter route. Mari kita lakukan itu.
        // Route akan diubah menjadi jadwal/{dokter}

        $dokter->load('user', 'jadwal');
        return view('admin.jadwal.show', compact('dokter'));
    }

    /**
     * Menampilkan form untuk membuat jadwal baru.
     */
    public function create(Request $request)
    {
        $dokters = Dokter::with('user')->get();
        $selectedDokterId = $request->query('dokter_id'); // Ambil ID dokter dari URL
        return view('admin.jadwal.create', compact('dokters', 'selectedDokterId'));
    }

    /**
     * Menyimpan jadwal baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:dokter,id'],
            'hari' => ['required', 'string'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ]);

        Jadwal::create($request->all());

        // Redirect kembali ke halaman detail dokter tersebut
        return redirect()->route('admin.jadwal.show', $request->id_dokter)->with('success', 'Jadwal baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit jadwal.
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Memperbarui jadwal.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'hari' => ['required', 'string'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ]);

        $jadwal->update($request->all());

        // Redirect kembali ke halaman detail dokter tersebut
        return redirect()->route('admin.jadwal.show', $jadwal->id_dokter)->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal.
     */
    public function destroy(Jadwal $jadwal)
    {
        $idDokter = $jadwal->id_dokter;
        $jadwal->delete();
        // Redirect kembali ke halaman detail dokter tersebut
        return redirect()->route('admin.jadwal.show', $idDokter)->with('success', 'Jadwal berhasil dihapus.');
    }

    /**
     * Helper function untuk meringkas jadwal.
     */
    private function ringkasJadwal($jadwals)
    {
        if ($jadwals->isEmpty()) {
            return ['hari' => 'Belum diatur', 'jam' => '-'];
        }

        // Ringkas Hari
        $hariPraktek = $jadwals->pluck('hari')->implode(', ');

        // Ringkas Jam (ambil yang paling umum)
        $jamPraktek = $jadwals->groupBy(function($item) {
            return Carbon::parse($item->jam_mulai)->format('H:i') . ' - ' . Carbon::parse($item->jam_selesai)->format('H:i');
        })->map->count()->sortDesc()->keys()->first();

        return ['hari' => $hariPraktek, 'jam' => $jamPraktek];
    }
}

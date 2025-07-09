<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dokter;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('dokter.user')->latest()->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $dokters = Dokter::with('user')->get();
        return view('admin.jadwal.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:dokter,id'],
            'hari' => ['required', 'string'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'durasi_slot_menit' => ['required', 'integer', 'min:1'],
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $dokters = Dokter::with('user')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'dokters'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:dokter,id'],
            'hari' => ['required', 'string'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'durasi_slot_menit' => ['required', 'integer', 'min:1'],
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}

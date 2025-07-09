<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    /**
     * Menampilkan daftar jadwal milik dokter yang sedang login.
     */
    public function index()
    {
        $idDokter = Auth::user()->dokter->id;
        $jadwals = Jadwal::where('id_dokter', $idDokter)->orderBy('hari')->get();
        
        return view('dokter.jadwal.index', compact('jadwals'));
    }

    /**
     * Menampilkan detail jadwal (jika diperlukan).
     */
    public function show(Jadwal $jadwal)
    {
        // Memastikan dokter hanya bisa melihat jadwal miliknya sendiri
        if ($jadwal->id_dokter !== Auth::user()->dokter->id) {
            abort(403, 'AKSES DITOLAK');
        }

        return view('dokter.jadwal.show', compact('jadwal'));
    }
}

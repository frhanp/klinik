<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $idDokter = Auth::user()->dokter->id;
        $pemesananHariIni = Pemesanan::where('id_dokter', $idDokter)
            ->whereDate('tanggal_pesan', today())
            ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
            // --- UBAH BARIS DI BAWAH INI ---
            ->with('pasien', 'tindakanAwal') // Tambahkan 'tindakanAwal'
            // -----------------------------
            ->orderBy('waktu_pesan', 'asc')
            ->get();

        return view('dokter.dashboard', compact('pemesananHariIni'));
    }
}

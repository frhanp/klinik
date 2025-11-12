<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesananAktif = Pemesanan::where('id_pasien', Auth::id())
            ->whereIn('status', [
                'Dipesan',
                'Dikonfirmasi',
                'Menunggu Konfirmasi Pasien',
                'Dijadwalkan Ulang'
            ])
            ->orderBy('created_at', 'desc') 
            ->get(); 

            $adaPemesananAktif = $pemesananAktif->isNotEmpty();


        return view('pasien.dashboard', compact('pemesananAktif','adaPemesananAktif'));
    }
}

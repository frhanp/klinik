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
                'Menunggu Konfirmasi Pasien'
            ])
            ->orderBy('created_at', 'desc') // ambil yg terbaru dulu
            ->get(); // HAPUS take(6)


        return view('pasien.dashboard', compact('pemesananAktif'));
    }
}

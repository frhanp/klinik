<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh data yang bisa dikirim ke dashboard admin
        $jumlahPasien = User::where('peran', 'pasien')->count();
        $jumlahDokter = Dokter::count();
        $pemesananHariIni = Pemesanan::whereDate('tanggal_pesan', today())->count();

        return view('admin.dashboard', compact('jumlahPasien', 'jumlahDokter', 'pemesananHariIni'));
    }
}

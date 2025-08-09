<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasien = User::where('peran', 'pasien')->count();
        $jumlahDokter = Dokter::count();
        $pemesananHariIni = Pemesanan::whereDate('tanggal_pesan', today())->count();

        // Query untuk data chart pendapatan 6 bulan terakhir
        $pendapatanPerBulan = Pembayaran::select(
                DB::raw('SUM(total_biaya) as total'),
                DB::raw("DATE_FORMAT(tanggal_bayar, '%Y-%m') as bulan")
            )
            ->where('status', 'Lunas')
            ->where('tanggal_bayar', '>=', Carbon::now()->subMonths(5)->startOfMonth())
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();
        
        // Format data untuk Chart.js
        $labels = $pendapatanPerBulan->pluck('bulan')->map(function($bulan) {
            return Carbon::createFromFormat('Y-m', $bulan)->translatedFormat('F Y');
        });
        $data = $pendapatanPerBulan->pluck('total');

        return view('admin.dashboard', compact('jumlahPasien', 'jumlahDokter', 'pemesananHariIni', 'labels', 'data'));
    }
}

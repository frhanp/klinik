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
use App\Models\BiodataPasien;

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

        $tindakanPopuler = DB::table('rekam_medis_tindakan')
            ->join('tindakan', 'rekam_medis_tindakan.tindakan_id', '=', 'tindakan.id')
            ->select('tindakan.keterangan', DB::raw('count(rekam_medis_tindakan.tindakan_id) as jumlah'))
            ->groupBy('tindakan.keterangan')
            ->orderBy('jumlah', 'desc')
            ->limit(5)
            ->get();
        $tindakanLabels = $tindakanPopuler->pluck('keterangan');
        $tindakanData = $tindakanPopuler->pluck('jumlah');


        $statusPasienData = BiodataPasien::select('status_pasien', DB::raw('count(*) as jumlah'))
            ->whereNotNull('status_pasien')
            ->where('status_pasien', '!=', '')
            ->groupBy('status_pasien')
            ->get();
        
        $statusPasienLabels = $statusPasienData->pluck('status_pasien');
        $statusPasienData = $statusPasienData->pluck('jumlah');

        $kunjunganPasien = Pemesanan::select(
            DB::raw('DATE(tanggal_pesan) as tanggal'),
            DB::raw('COUNT(*) as jumlah')
        )
        ->where('status', 'Selesai') // Hanya hitung kunjungan yang selesai
        ->where('tanggal_pesan', '>=', Carbon::now()->subDays(30))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();
    $kunjunganLabels = $kunjunganPasien->pluck('tanggal');
    $kunjunganData = $kunjunganPasien->pluck('jumlah');

    // 5. [BARU] GRAFIK TOP DOKTER (Berdasarkan Tindakan)
    $dokterPopuler = DB::table('rekam_medis_tindakan as rmt')
        ->join('rekam_medis as rm', 'rmt.rekam_medis_id', '=', 'rm.id')
        ->join('pemesanan as p', 'rm.id_pemesanan', '=', 'p.id')
        ->join('dokter as d', 'p.id_dokter', '=', 'd.id')
        ->join('users as u', 'd.user_id', '=', 'u.id')
        ->select('u.name as nama_dokter', DB::raw('COUNT(rmt.tindakan_id) as jumlah_tindakan'))
        ->groupBy('u.name')
        ->orderBy('jumlah_tindakan', 'desc')
        ->limit(5)
        ->get();
    $dokterLabels = $dokterPopuler->pluck('nama_dokter');
    $dokterData = $dokterPopuler->pluck('jumlah_tindakan');

        return view('admin.dashboard', compact(
            'jumlahPasien', 
            'jumlahDokter', 
            'pemesananHariIni', 
            'labels', 
            'data', 
            'tindakanLabels', 
            'tindakanData',
            'statusPasienLabels', 
            'statusPasienData',
            'kunjunganLabels',
            'kunjunganData',
            'dokterLabels',
            'dokterData'
        ));
    }
}

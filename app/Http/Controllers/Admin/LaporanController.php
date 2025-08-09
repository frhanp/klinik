<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Models\Pemesanan;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Tentukan rentang tanggal default (bulan ini)
        $tanggalMulai = $request->input('tanggal_mulai', Carbon::now()->startOfMonth()->toDateString());
        $tanggalSelesai = $request->input('tanggal_selesai', Carbon::now()->endOfMonth()->toDateString());

        // 1. Query untuk Laporan Pendapatan
        $laporanPembayaran = Pembayaran::where('status', 'Lunas')
            ->whereBetween('tanggal_bayar', [$tanggalMulai, $tanggalSelesai . ' 23:59:59'])
            ->with('pemesanan.pasien', 'pemesanan.dokter.user')
            ->latest('tanggal_bayar')
            ->get();

        // 2. Query untuk Laporan Kunjungan
        $laporanKunjungan = Pemesanan::whereIn('status', ['Selesai', 'Menunggu Pembayaran']) // Asumsikan yang belum bayar tetap dihitung kunjungan
            ->whereBetween('tanggal_pesan', [$tanggalMulai, $tanggalSelesai])
            ->get();

        // 3. Hitung Total
        $totalPendapatan = $laporanPembayaran->sum('total_biaya');
        $totalTransaksi = $laporanPembayaran->count();
        $totalKunjungan = $laporanKunjungan->count();

        return view('admin.laporan.index', compact(
            'laporanPembayaran',
            'totalPendapatan',
            'totalTransaksi',
            'totalKunjungan',
            'tanggalMulai',
            'tanggalSelesai'
        ));
    }
}

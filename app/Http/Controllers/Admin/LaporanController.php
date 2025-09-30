<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // [MODIFIKASI] Tambahkan kondisi untuk mengabaikan status 'Dibatalkan' di awal
        $query = Pemesanan::query()
            ->where('pemesanan.status', '!=', 'Dibatalkan') 
            ->leftJoin('pembayaran', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
            ->with(['pasien', 'dokter.user','pasien.biodata','rekamMedis.tindakan','rekamMedis.resep.obat']);

        // Filter berdasarkan status pemesanan
        if ($request->filled('status')) {
            $query->where('pemesanan.status', $request->status);
        }

        // Filter berdasarkan rentang tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereBetween('pembayaran.tanggal_bayar', [$request->start_date, $request->end_date])
                  ->orWhereBetween(DB::raw('DATE(pemesanan.created_at)'), [$request->start_date, $request->end_date]);
            });
        }

        // Filter Metode Pembayaran
        if ($request->filled('metode_pembayaran')) {
            $query->where('pembayaran.metode_pembayaran', $request->metode_pembayaran);
        }

        $laporan = $query->select('pemesanan.*')->latest('pemesanan.created_at')->get();
        
        // Kalkulasi pendapatan disesuaikan dengan relasi yang benar
        $totalPendapatan = $laporan->sum(function($item) {
            return $item->pembayaran->total_biaya ?? 0;
        });
        
        $totalTransaksi = $laporan->count();
        $pasienUnik = $laporan->pluck('pasien.id')->unique()->count();
        
        // Query untuk Chart
        $pendapatanHarian = Pemesanan::query()
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
            ->select(DB::raw('DATE(pembayaran.tanggal_bayar) as tanggal'), DB::raw('SUM(pembayaran.total_biaya) as total'))
            ->whereBetween('pembayaran.tanggal_bayar', [$request->input('start_date', now()->subMonth()), $request->input('end_date', now())])
            // [MODIFIKASI] Tambahkan filter 'Dibatalkan' juga di query chart agar konsisten
            ->where('pemesanan.status', '!=', 'Dibatalkan')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        $chartData = [
            'labels' => $pendapatanHarian->pluck('tanggal'),
            'data' => $pendapatanHarian->pluck('total'),
        ];
        
        // Opsi untuk dropdown filter
        $metodePembayaranOptions = Pembayaran::whereNotNull('metode_pembayaran')->distinct()->pluck('metode_pembayaran');
        
        // [MODIFIKASI] Sesuaikan dengan status yang ada dan hilangkan 'Dibatalkan'
        $statusOptions = ['Menunggu Pembayaran', 'Selesai', 'Dikonfirmasi'];

        return view('admin.laporan.index', compact(
            'laporan',
            'totalPendapatan',
            'metodePembayaranOptions',
            'statusOptions',
            'totalTransaksi',
            'pasienUnik',
            'chartData'
        ));
    }

    // Fungsi cetak juga disesuaikan
    public function cetak(Request $request)
    {
        $query = Pemesanan::query()
            // --- [FIX] Start: Menggunakan Nama Kolom yang Benar ---
            ->leftJoin('pembayaran', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
            // --- [FIX] End ---
            ->with(['pasien', 'dokter.user']);
            
        if ($request->filled('status')) {
            $query->where('pemesanan.status', $request->status);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->where(function ($q) use ($request) {
                $q->whereBetween('pembayaran.tanggal_bayar', [$request->start_date, $request->end_date])
                  ->orWhereBetween(DB::raw('DATE(pemesanan.created_at)'), [$request->start_date, $request->end_date]);
            });
        }

        if ($request->filled('metode_pembayaran')) {
            $query->where('pembayaran.metode_pembayaran', $request->metode_pembayaran);
        }

        $laporan = $query->select('pemesanan.*')->get();
        $totalPendapatan = $laporan->sum(fn($item) => $item->pembayaran->total_biaya ?? 0);

        return view('admin.laporan.cetak', compact('laporan', 'totalPendapatan'));
    }
}

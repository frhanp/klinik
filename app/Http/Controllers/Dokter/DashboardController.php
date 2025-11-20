<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $idDokter = Auth::user()->dokter->id;

        
        $query = Pemesanan::where('id_dokter', $idDokter)
            ->whereIn('status', ['Dikonfirmasi'])
            ->doesntHave('rekamMedis')
            ->with('pasien', 'tindakanAwal')
            ->orderBy('tanggal_pesan', 'desc')
            ->orderBy('waktu_pesan', 'asc');

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_pesan', $request->tanggal);
        } else {
            $query->whereDate('tanggal_pesan', today());
        }

        $pemesananHariIni = $query->get();
        $layananPopuler = DB::table('rekam_medis_tindakan as rmt')
            ->join('rekam_medis as rm', 'rmt.rekam_medis_id', '=', 'rm.id')
            ->join('pemesanan as p', 'rm.id_pemesanan', '=', 'p.id')
            ->join('tindakan as t', 'rmt.tindakan_id', '=', 't.id')
            ->join('daftar_tindakan as dt', 't.daftar_tindakan_id', '=', 'dt.id') // Join ke tabel kategori
            ->where('p.id_dokter', $idDokter)
            // Gabungkan Nama Kategori dan Keterangan (Contoh: "Cabut Gigi - Rahang Atas")
            ->select(
                DB::raw("CONCAT(dt.nama_kategori, ' - ', t.keterangan) as nama_lengkap"), 
                DB::raw('count(*) as total')
            )
            ->groupBy('dt.nama_kategori', 't.keterangan')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $layananLabels = $layananPopuler->pluck('nama_lengkap');
        $layananData = $layananPopuler->pluck('total');


       // Grafik Metode Pembayaran Pasien Dokter Ini
        $metodePembayaran = DB::table('pembayaran as pay')
            ->join('pemesanan as p', 'pay.pemesanan_id', '=', 'p.id')
            ->where('p.id_dokter', $idDokter) // Filter Dokter
            ->whereNotNull('pay.metode_pembayaran')
            ->select('pay.metode_pembayaran', DB::raw('count(*) as total'))
            ->groupBy('pay.metode_pembayaran')
            ->get();

        $metodeLabels = $metodePembayaran->pluck('metode_pembayaran');
        $metodeData = $metodePembayaran->pluck('total');
        

        return view('dokter.dashboard', compact(
            'pemesananHariIni',
            'layananLabels',
            'layananData',
            'metodeLabels',
            'metodeData'
        ));
    }

    public function cancel(Request $request, Pemesanan $pemesanan)
    {
        // Pastikan pemesanan ini memang milik dokter yang login
        if ($pemesanan->id_dokter !== Auth::user()->dokter->id) {
            abort(403, 'Tidak berhak.');
        }

        // Update status & kosongkan antrian
        $pemesanan->update([
            'status' => 'Dibatalkan Dokter',
            'nomor_antrian' => null,
            'catatan_admin' => $request->reason,
        ]);

        return back()->with('success', 'Pemesanan dibatalkan oleh dokter.');
    }
}

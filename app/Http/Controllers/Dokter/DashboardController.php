<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $idDokter = Auth::user()->dokter->id;

        // AWAL MODIFIKASI: Filter berdasarkan tanggal (default hari ini)
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
        // AKHIR MODIFIKASI

        return view('dokter.dashboard', compact('pemesananHariIni'));
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar pemesanan yang menunggu pembayaran atau sudah lunas.
     */
    public function index()
    {
        $pemesanans = Pemesanan::whereIn('status', ['Menunggu Pembayaran', 'Selesai'])
                                ->with(['pasien', 'pembayaran'])
                                ->latest()
                                ->get();
        return view('admin.pembayaran.index', compact('pemesanans'));
    }

    public function cetak(Pemesanan $pemesanan)
    {
        // Pastikan semua data yang dibutuhkan sudah ter-load
        $pemesanan->load(['pasien', 'dokter.user', 'rekamMedis.tindakan', 'pembayaran']);

        // Pastikan pemesanan ini memang memiliki tagihan
        if (!$pemesanan->pembayaran) {
            return redirect()->route('admin.pembayaran.index')->with('error', 'Struk tidak dapat dicetak karena tidak ada tagihan.');
        }

        return view('admin.pembayaran.cetak', compact('pemesanan'));
    }

    /**
     * Menampilkan halaman detail untuk memproses pembayaran.
     */
    public function show(Pemesanan $pemesanan)
    {
        // Memuat relasi yang dibutuhkan untuk menampilkan detail tagihan
        $pemesanan->load(['pasien', 'dokter.user', 'rekamMedis.tindakan', 'pembayaran']);

        // Pastikan pemesanan ini memang memiliki tagihan
        if (!$pemesanan->pembayaran) {
            return redirect()->route('admin.pembayaran.index')->with('error', 'Pemesanan ini tidak memiliki tagihan.');
        }

        return view('admin.pembayaran.show', compact('pemesanan'));
    }

    /**
     * Menyimpan data pembayaran dan menyelesaikan transaksi.
     */
    public function store(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|in:Tunai,Transfer,Kartu Debit/Kredit',
        ]);

        $pembayaran = $pemesanan->pembayaran;

        if ($pembayaran && $pembayaran->status == 'Belum Lunas') {
            // Update status pembayaran
            $pembayaran->update([
                'status' => 'Lunas',
                'metode_pembayaran' => $request->metode_pembayaran,
                'tanggal_bayar' => Carbon::now(),
            ]);

            // Update status pemesanan menjadi Selesai
            $pemesanan->update([
                'status' => 'Selesai',
            ]);

            return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran ini sudah lunas atau tidak valid.');
    }
}

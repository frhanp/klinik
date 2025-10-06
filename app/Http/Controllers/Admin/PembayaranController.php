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
        // [MODIFIKASI] Hapus filter 'whereIn' agar semua status yang relevan dengan pembayaran ditampilkan
        $pemesanans = Pemesanan::query()
            ->whereHas('pembayaran') // Hanya ambil pemesanan yang sudah punya tagihan
            ->with(['pasien', 'pembayaran'])
            ->latest()
            ->get();
            
        return view('admin.pembayaran.index', compact('pemesanans'));
    }

    public function cetak(Pemesanan $pemesanan)
    {
        // [MODIFIKASI] Muat semua relasi, termasuk resep dan obat untuk dicetak
        $pemesanan->load([
            'pasien',
            'dokter.user',
            'rekamMedis.tindakan',
            'rekamMedis.resep.obat', // <-- Relasi penting yang ditambahkan
            'pembayaran'
        ]);

        if (!$pemesanan->pembayaran) {
            return redirect()->route('admin.pembayaran.index')->with('error', 'Struk tidak dapat dicetak karena tidak ada tagihan.');
        }

        return view('admin.pembayaran.cetak', compact('pemesanan'));
    }

    /**
     * Menampilkan halaman detail untuk memproses pembayaran.
     */
    // app/Http/Controllers/Admin/PembayaranController.php

    // app/Http/Controllers/Admin/PembayaranController.php

    public function show(Pemesanan $pemesanan)
    {
        // [MODIFIKASI] Muat semua relasi, termasuk resep dan obat
        $pemesanan->load([
            'pasien',
            'dokter.user',
            'rekamMedis.tindakan',
            'rekamMedis.resep.obat', // <-- Relasi penting yang ditambahkan
            'pembayaran'
            
        ]);

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

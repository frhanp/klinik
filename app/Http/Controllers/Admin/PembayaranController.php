<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Carbon\Carbon;
use App\Models\Tindakan;

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
    $pemesanan->load([
        'pasien.biodata',
        'dokter.user',
        'pembayaran',
        'rekamMedis.tindakan',
        'rekamMedis.resep.obat',
        'rekamMedis.foto',
        'tindakan',
    ]);

    $rekamMedis = $pemesanan->rekamMedis;
    $tindakanAwalIds = $pemesanan->tindakan()->pluck('tindakan.id')->toArray();

    $subtotalTindakan   = 0;
    $subtotalObat       = 0;
    $potonganTindakan   = 0;
    $potonganObat       = 0;
    $potonganInhealth   = 0;

    if ($rekamMedis) {
        // subtotal tindakan dari harga tindakan yang tersimpan
        $subtotalTindakan = (int) $rekamMedis->tindakan->sum('harga');

        // subtotal obat dari harga_saat_resep agar konsisten dengan tampilan
        $subtotalObat = $rekamMedis->resep->sum(function ($r) {
            return ((int) $r->jumlah) * (int) ($r->harga_saat_resep ?? 0);
        });
    }

    $subtotal = $subtotalTindakan + $subtotalObat;

    if ($rekamMedis && $pemesanan->status_pasien === 'BPJS') {
        $potonganTindakan = $rekamMedis->tindakan->count() * 2500;
        $potonganObat     = $subtotalObat; // seluruh obat ditanggung BPJS (gratis)
    } elseif ($pemesanan->status_pasien === 'Inhealth' && $pemesanan->pembayaran) {
        $potonganInhealth = (int) ($pemesanan->pembayaran->potongan ?? 0);
    }

    return view('admin.pembayaran.show', compact(
        'pemesanan',
        'rekamMedis',
        'tindakanAwalIds',
        'subtotal',
        'potonganTindakan',
        'potonganObat',
        'potonganInhealth'
    ));
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

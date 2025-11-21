<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        // Ambil pemesanan milik pasien yang SUDAH memiliki data pembayaran (tagihan)
        $tagihans = Pemesanan::where('id_pasien', Auth::id())
            ->has('pembayaran')
            ->with(['dokter.user', 'pembayaran'])
            ->latest()
            ->paginate(10);

        return view('pasien.pembayaran.index', compact('tagihans'));
    }

    public function show(Pemesanan $pemesanan)
    {
        // Pastikan ini milik pasien yang login
        if ($pemesanan->id_pasien !== Auth::id()) {
            abort(403);
        }

        // Pastikan sudah ada pembayaran
        if (!$pemesanan->pembayaran) {
            return redirect()->route('pasien.pembayaran.index')->with('error', 'Tagihan belum diterbitkan.');
        }

        $pemesanan->load([
            'dokter.user',
            'pembayaran',
            'rekamMedis.tindakan',
            'rekamMedis.resep.obat',
            'tindakan'
        ]);

        $rekamMedis = $pemesanan->rekamMedis;
        $tindakanAwalIds = $pemesanan->tindakan()->pluck('tindakan.id')->toArray();

        // --- Kalkulasi Rincian Biaya (Sama seperti Admin) ---
        $subtotalTindakan = 0;
        $subtotalObat = 0;
        $potonganTindakan = 0;
        $potonganObat = 0;
        $potonganInhealth = 0;

        if ($rekamMedis) {
            // Subtotal Tindakan
            $subtotalTindakan = $rekamMedis->tindakan->sum('harga');

            // Subtotal Obat (Gunakan harga asli berdasarkan tipe_harga)
            foreach ($rekamMedis->resep as $item) {
                $hargaAsliObat = (trim($item->tipe_harga) == 'resep')
                    ? ($item->obat->harga_jual_resep ?? 0)
                    : ($item->obat->harga_jual_non_resep ?? 0);
                $subtotalObat += $hargaAsliObat * $item->jumlah;
            }
        }
        
        $subtotal = $subtotalTindakan + $subtotalObat;

        if ($rekamMedis && $pemesanan->status_pasien === 'BPJS') {
            $potonganTindakan = $rekamMedis->tindakan->count() * 2500;
            $potonganObat = $subtotalObat; 
        } elseif ($pemesanan->status_pasien === 'Inhealth' && $pemesanan->pembayaran) {
            $potonganInhealth = (int) $pemesanan->pembayaran->potongan;
        }

        return view('pasien.pembayaran.show', compact(
            'pemesanan', 
            'rekamMedis', 
            'tindakanAwalIds',
            'subtotal',
            'potonganTindakan',
            'potonganObat',
            'potonganInhealth'
        ));
    }
}

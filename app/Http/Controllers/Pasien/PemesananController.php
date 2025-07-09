<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Dokter;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::where('id_pasien', Auth::id())
            ->with('dokter.user', 'jadwal')
            ->latest()
            ->get();
        return view('pasien.pemesanan.index', compact('pemesanans'));
    }

    public function create()
    {
        $dokters = Dokter::with('user')->get();
        return view('pasien.pemesanan.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:dokter,id'],
            'id_jadwal' => ['required', 'exists:jadwal,id'],
            'tanggal_pesan' => ['required', 'date', 'after_or_equal:today'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'catatan' => ['nullable', 'string'],
        ]);

        // Di sini perlu ada validasi lebih lanjut untuk mengecek ketersediaan slot
        // Namun untuk saat ini kita sederhanakan dulu

        Pemesanan::create([
            'id_pasien' => Auth::id(),
            'id_dokter' => $request->id_dokter,
            'id_jadwal' => $request->id_jadwal,
            'tanggal_pesan' => $request->tanggal_pesan,
            'waktu_pesan' => $request->waktu_pesan,
            'catatan' => $request->catatan,
            'status' => 'Dipesan',
        ]);

        return redirect()->route('pasien.pemesanan.index')->with('success', 'Pemesanan berhasil dibuat.');
    }

    public function show(Pemesanan $pemesanan)
    {
        if ($pemesanan->id_pasien !== Auth::id()) abort(403);
        return view('pasien.pemesanan.show', compact('pemesanan'));
    }

    public function destroy(Pemesanan $pemesanan)
    {
        if ($pemesanan->id_pasien !== Auth::id()) abort(403);

        if (in_array($pemesanan->status, ['Dipesan', 'Dikonfirmasi'])) {
            $pemesanan->update(['status' => 'Dibatalkan']);
            return redirect()->route('pasien.pemesanan.index')->with('success', 'Pemesanan berhasil dibatalkan.');
        }

        return redirect()->route('pasien.pemesanan.index')->with('error', 'Pemesanan yang sudah selesai tidak dapat dibatalkan.');
    }
}

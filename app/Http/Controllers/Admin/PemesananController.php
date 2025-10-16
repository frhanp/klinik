<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Dokter;

class PemesananController extends Controller
{
    /**
     * Menampilkan semua data pemesanan.
     */
    public function index()
    {
        $pemesanans = Pemesanan::with(['pasien.biodata', 'dokter.user'])->latest()->get();
        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    /**
     * Menampilkan form untuk membuat pemesanan manual (walk-in).
     */
    public function create()
    {
        $pasiens = User::where('peran', 'pasien')->get();
        $dokters = Dokter::with('user')->get();
        // Logika untuk mengambil jadwal akan lebih kompleks, bisa ditambahkan dengan AJAX nanti
        return view('admin.pemesanan.create', compact('pasiens', 'dokters'));
    }

    /**
     * Menyimpan pemesanan manual dari admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => ['required', 'exists:users,id'],
            'id_dokter' => ['required', 'exists:dokter,id'],
            'id_jadwal' => ['required', 'exists:jadwal,id'],
            'tanggal_pesan' => ['required', 'date'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:Dikonfirmasi,Selesai'], // Admin bisa langsung konfirmasi
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan manual berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail spesifik pemesanan.
     */
    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load(['pasien', 'dokter.user', 'jadwal']);
        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    /**
     * Menampilkan form untuk mengedit status pemesanan.
     */
    public function edit(Pemesanan $pemesanan)
    {
        // Memuat relasi yang dibutuhkan untuk ditampilkan di view
        $pemesanan->load(['pasien.biodata', 'dokter.user', 'jadwal']);
        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Memperbarui status pemesanan.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'status' => 'required|string|in:Dikonfirmasi,Selesai,Dibatalkan,Dijadwalkan Ulang',
            // Catatan wajib diisi jika statusnya Dibatalkan atau Dijadwalkan Ulang
            'catatan_admin' => 'required_if:status,Dibatalkan,Dijadwalkan Ulang|nullable|string|max:1000',
        ]);

        $pemesanan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return redirect()->route('admin.pemesanan.index')->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    /**
     * Menghapus data pemesanan.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        // Sebaiknya pemesanan tidak dihapus permanen jika sudah ada rekam medis.
        // Opsi yang lebih aman adalah membatalkannya.
        if ($pemesanan->rekamMedis) {
            return back()->with('error', 'Pemesanan tidak dapat dihapus karena sudah memiliki rekam medis.');
        }
        $pemesanan->delete();
        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}

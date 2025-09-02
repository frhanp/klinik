<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use App\Models\DaftarTindakan;

class TindakanController extends Controller
{
    /**
     * Menampilkan daftar kategori tindakan.
     */
    public function index()
    {
        $daftarTindakans = DaftarTindakan::with('tindakanItems')->latest()->get();
        return view('admin.tindakan.index', compact('daftarTindakans'));
    }

    /**
     * Menampilkan form untuk membuat kategori atau sub-tindakan baru.
     */
    public function create()
    {
        $kategoris = DaftarTindakan::orderBy('nama_kategori')->get();
        return view('admin.tindakan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Cek apakah ini membuat kategori baru atau sub-tindakan baru
        if ($request->has('nama_kategori')) {
            // Buat kategori baru
            $request->validate(['nama_kategori' => 'required|string|max:255|unique:daftar_tindakan,nama_kategori']);
            DaftarTindakan::create($request->only('nama_kategori'));
            $message = 'Kategori tindakan baru berhasil ditambahkan.';
        } else {
            // Buat sub-tindakan baru
            $request->validate([
                'daftar_tindakan_id' => 'required|exists:daftar_tindakan,id',
                'keterangan' => 'required|string|max:255',
                'harga' => 'required|integer|min:0',
            ]);
            Tindakan::create($request->all());
            $message = 'Detail tindakan baru berhasil ditambahkan.';
        }

        return redirect()->route('admin.tindakan.index')->with('success', $message);
    }

    public function edit(Tindakan $tindakan)
    {
        $kategoris = DaftarTindakan::orderBy('nama_kategori')->get();
        return view('admin.tindakan.edit', compact('tindakan', 'kategoris'));
    }
    public function update(Request $request, Tindakan $tindakan)
    {
        $request->validate([
            'daftar_tindakan_id' => 'required|exists:daftar_tindakan,id',
            'keterangan' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        $tindakan->update($request->all());

        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan berhasil diperbarui.');
    }

    /**
     * Menghapus data (bisa kategori atau sub-tindakan).
     */
    public function destroy($id)
    {
        // Coba hapus sebagai sub-tindakan dulu
        $tindakan = Tindakan::find($id);
        if ($tindakan) {
            $tindakan->delete();
            return back()->with('success', 'Detail tindakan berhasil dihapus.');
        }

        // Jika tidak ditemukan, coba hapus sebagai kategori
        $kategori = DaftarTindakan::find($id);
        if ($kategori) {
            $kategori->delete(); // Sub-tindakan akan ikut terhapus karena onDelete('cascade')
            return back()->with('success', 'Kategori dan semua detailnya berhasil dihapus.');
        }

        return back()->with('error', 'Data tidak ditemukan.');
    }
}

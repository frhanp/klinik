<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index()
    {
        $tindakans = Tindakan::latest()->get();
        return view('admin.tindakan.index', compact('tindakans'));
    }

    public function create()
    {
        return view('admin.tindakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Tindakan::create($request->all());

        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan baru berhasil ditambahkan.');
    }

    public function edit(Tindakan $tindakan)
    {
        return view('admin.tindakan.edit', compact('tindakan'));
    }

    public function update(Request $request, Tindakan $tindakan)
    {
        $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $tindakan->update($request->all());

        return redirect()->route('admin.tindakan.index')->with('success', 'Data tindakan berhasil diperbarui.');
    }

    public function destroy(Tindakan $tindakan)
    {
        $tindakan->delete();
        return redirect()->route('admin.tindakan.index')->with('success', 'Tindakan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('user')->latest()->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'spesialisasi' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'peran' => 'dokter',
        ]);

        $pathFoto = $request->hasFile('foto') ? $request->file('foto')->store('foto-dokter', 'public') : null;

        Dokter::create([
            'user_id' => $user->id,
            'spesialisasi' => $request->spesialisasi,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function show(Dokter $dokter)
    {
        return view('admin.dokter.show', compact('dokter'));
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$dokter->user_id],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'spesialisasi' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $dokter->user->update($request->only('name', 'email', 'nomor_telepon'));

        $pathFoto = $dokter->foto;
        if ($request->hasFile('foto')) {
            if ($pathFoto) Storage::disk('public')->delete($pathFoto);
            $pathFoto = $request->file('foto')->store('foto-dokter', 'public');
        }

        $dokter->update([
            'spesialisasi' => $request->spesialisasi,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        if ($dokter->foto) Storage::disk('public')->delete($dokter->foto);
        $dokter->user->delete(); // Ini akan otomatis menghapus profil dokter karena relasi cascade
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}

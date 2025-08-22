<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class PasienController extends Controller
{
    /**
     * Menampilkan daftar semua pasien.
     */
    public function index(Request $request)
    {
        $query = User::where('peran', 'pasien');

        // Fitur Pencarian yang disederhanakan
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $pasiens = $query->latest()->paginate(15);

        return view('admin.pasien.index', compact('pasiens'));
    }

    /**
     * Menampilkan form untuk membuat pasien baru secara offline.
     */
    public function create()
    {
        return view('admin.pasien.create');
    }

    /**
     * Menyimpan data pasien baru (hanya akun).
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'nomor_telepon' => ['nullable', 'string', 'max:20'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'peran' => 'pasien',
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Akun pasien baru berhasil didaftarkan.');
    }

    /**
     * Menampilkan form untuk mengedit data dasar pasien.
     */
     /**
     * Menampilkan form untuk mengedit data dasar pasien.
     */
    public function edit(User $pasien) // <-- Ubah $user menjadi $pasien
    {
        if ($pasien->peran !== 'pasien') {
            abort(404);
        }
        return view('admin.pasien.edit', ['user' => $pasien]); // Kirim dengan nama 'user' agar view tidak error
    }

    /**
     * Memperbarui data dasar pasien.
     */
    public function update(Request $request, User $pasien) // <-- Ubah $user menjadi $pasien
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        $pasien->update($request->only('name', 'nomor_telepon'));

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BiodataPasien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Menampilkan daftar semua pasien.
     */
    public function index(Request $request)
    {
        $query = User::where('peran', 'pasien')->with('biodata');

        // Fitur Pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhereHas('biodata', function ($subq) use ($request) {
                      $subq->where('nomor_rekam_medis', 'like', '%' . $request->search . '%');
                  });
            });
        }

        $pasiens = $query->latest()->paginate(15);

        return view('admin.pasien.index', compact('pasiens'));
    }

    /**
     * Menampilkan form untuk mengedit biodata pasien.
     */
    public function edit(User $user)
    {
        // Pastikan user yang diedit adalah pasien
        if ($user->peran !== 'pasien') {
            abort(404);
        }
        return view('admin.pasien.edit', compact('user'));
    }

    /**
     * Menyimpan atau memperbarui biodata pasien.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nik' => 'nullable|string|digits:16|unique:biodata_pasien,nik,' . ($user->biodata->id ?? 'NULL') . ',id',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'golongan_darah' => 'nullable|string|max:2',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
            // Validasi untuk data user
            'name' => 'required|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        DB::transaction(function () use ($request, $user) {
            // Update data di tabel users
            $user->update([
                'name' => $request->name,
                'nomor_telepon' => $request->nomor_telepon,
            ]);

            // Siapkan data untuk tabel biodata
            $biodataData = $request->except(['_token', '_method', 'name', 'nomor_telepon']);
            $biodataData['user_id'] = $user->id;

            // Cek apakah biodata sudah ada
            $biodata = $user->biodata;

            // Jika biodata belum ada dan belum punya No. RM, generate baru
            if (!$biodata || !$biodata->nomor_rekam_medis) {
                $today = Carbon::now()->format('Ymd');
                $lastPatient = BiodataPasien::where('nomor_rekam_medis', 'like', "RM-{$today}-%")->count();
                $newNumber = str_pad($lastPatient + 1, 3, '0', STR_PAD_LEFT);
                $biodataData['nomor_rekam_medis'] = "RM-{$today}-{$newNumber}";
            }
            
            // Gunakan updateOrCreate untuk membuat atau memperbarui biodata
            BiodataPasien::updateOrCreate(
                ['user_id' => $user->id],
                $biodataData
            );
        });

        return redirect()->route('admin.pasien.index')->with('success', 'Biodata pasien berhasil diperbarui.');
    }
}

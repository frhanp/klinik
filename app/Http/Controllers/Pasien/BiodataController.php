<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BiodataPasien;

class BiodataController extends Controller
{
    /**
     * Menampilkan form untuk pasien mengedit biodata mereka.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('pasien.biodata.edit', compact('user'));
    }

    /**
     * Menyimpan atau memperbarui biodata pasien.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

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
        ]);

        // --- PERBAIKAN DI SINI ---
        // Ambil semua data KECUALI nomor_rekam_medis
        $dataToUpdate = $request->except('nomor_rekam_medis');
        
        // Gunakan data yang sudah difilter untuk membuat atau memperbarui biodata
        BiodataPasien::updateOrCreate(
            ['user_id' => $user->id],
            $dataToUpdate
        );
        // --- AKHIR PERBAIKAN ---

        return redirect()->route('pasien.biodata.edit')->with('success', 'Biodata Anda berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\BiodataPasien;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('peran', 'pasien')->with(['biodata', 'pemesanan' => function ($query) {
            $query->latest()->limit(1); // Ambil 1 pemesanan terbaru
        }]);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('biodata', function ($subQ) use ($search) {
                        $subQ->where('nik', 'like', '%' . $search . '%');
                    });
            });
        }

        $pasiens = $query->latest()->paginate(15)->withQueryString();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nomor_telepon' => 'nullable|string|max:20',
            'nik' => 'nullable|string|numeric|digits:16|unique:biodata_pasien,nik',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'umur' => 'nullable|integer|min:0|max:150', // Tambah validasi umur
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:100',
            'nama_orang_tua' => 'nullable|string|max:255',
            'status_pasien' => 'nullable|string|max:50',
            'golongan_darah' => 'nullable|string|max:3',
            'riwayat_penyakit' => 'nullable|string',
            'riwayat_alergi_obat' => 'nullable|string',
            'riwayat_alergi_makanan' => 'nullable|string',
            'penyakit_penting' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'peran' => 'pasien',
        ]);

        $biodataFields = $request->only([
            'nik', 'tempat_lahir', 'tanggal_lahir', 'umur', 'jenis_kelamin', 'alamat', // Tambahkan umur
            'pekerjaan', 'nama_orang_tua', 'status_pasien', 'golongan_darah',
            'riwayat_penyakit', 'riwayat_alergi_obat', 'riwayat_alergi_makanan',
            'penyakit_penting',
        ]);

        if (count(array_filter($biodataFields)) > 0) {
            $user->biodata()->create($biodataFields);
        }

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function edit(User $pasien)
    {
        if ($pasien->peran !== 'pasien') {
            abort(404);
        }
        $pasien->load('biodata');
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, User $pasien)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $pasien->id,
            'nomor_telepon' => 'nullable|string|max:20',
            'nik' => 'nullable|string|numeric|digits:16|unique:biodata_pasien,nik,' . optional($pasien->biodata)->id,
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'umur' => 'nullable|integer|min:0|max:150', // Tambah validasi umur
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:100',
            'nama_orang_tua' => 'nullable|string|max:255',
            'status_pasien' => 'nullable|string|max:50',
            'golongan_darah' => 'nullable|string|max:3',
            'riwayat_penyakit' => 'nullable|string',
            'riwayat_alergi_obat' => 'nullable|string',
            'riwayat_alergi_makanan' => 'nullable|string',
            'penyakit_penting' => 'nullable|string',
        ]);

        $pasien->update($request->only('name', 'email', 'nomor_telepon'));
        $biodataFields = $request->only([
            'nik', 'tempat_lahir', 'tanggal_lahir', 'umur', 'jenis_kelamin', 'alamat', // Tambahkan umur
            'pekerjaan', 'nama_orang_tua', 'status_pasien', 'golongan_darah',
            'riwayat_penyakit', 'riwayat_alergi_obat', 'riwayat_alergi_makanan',
            'penyakit_penting',
        ]);

        $pasien->biodata()->updateOrCreate(['user_id' => $pasien->id], $biodataFields);

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function show(User $pasien)
    {
        // Pastikan user yang diakses adalah pasien
        if ($pasien->peran !== 'pasien') {
            abort(404);
        }
        $pasien->load('biodata'); // Load biodata
        return view('admin.pasien.show', compact('pasien'));
    }

    public function destroy(User $pasien)
    {
        $pasien->delete();
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}

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
        $query = User::where('peran', 'pasien')->with('biodata');

        // [MODIFIKASI] Logika pencarian diperbarui
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                // Kondisi 1: Cari berdasarkan nama pasien
                $q->where('name', 'like', '%' . $search . '%')
                    // Kondisi 2: ATAU cari berdasarkan NIK di tabel biodata
                    ->orWhereHas('biodata', function ($subQ) use ($search) {
                        $subQ->where('nik', 'like', '%' . $search . '%');
                    });
            });
        }

        $pasiens = $query->latest()->paginate(15)->withQueryString(); // withQueryString() agar pencarian tidak hilang saat pindah halaman
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
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'peran' => 'pasien',
        ]);

        if ($request->filled('nik')) {
            $user->biodata()->create(['nik' => $request->nik]);
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
        ]);

        $pasien->update($request->only('name', 'email', 'nomor_telepon'));

        $pasien->biodata()->updateOrCreate(
            ['user_id' => $pasien->id],
            ['nik' => $request->nik]
        );

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(User $pasien)
    {
        $pasien->delete();
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}

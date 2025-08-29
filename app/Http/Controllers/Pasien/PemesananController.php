<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\BiodataPasien;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::where('id_pasien', Auth::id())
        ->with(['dokter.user', 'jadwal']) // Eager load relasi
        ->latest()
        ->paginate(10);
        return view('pasien.pemesanan.index', compact('pemesanans'));
    }

    //----------------------------------
    /**
     * Mengambil hari-hari praktek seorang dokter.
     * Akan mengembalikan response JSON.
     */
    public function getJadwalDokter(Dokter $dokter)
    {
        // Mengambil semua jadwal untuk dokter yang dipilih
        // dan hanya mengambil kolom 'hari' yang unik.
        $jadwal = $dokter->jadwal()->select('hari')->distinct()->pluck('hari');

        // Mengubah nama hari dari Bahasa Indonesia ke Bahasa Inggris untuk dicocokkan dengan Carbon
        $dayMap = [
            'Senin' => 'Monday',
            'Selasa' => 'Tuesday',
            'Rabu' => 'Wednesday',
            'Kamis' => 'Thursday',
            'Jumat' => 'Friday',
            'Sabtu' => 'Saturday',
            'Minggu' => 'Sunday',
        ];

        $englishDays = $jadwal->map(function ($hari) use ($dayMap) {
            return $dayMap[$hari] ?? null;
        })->filter();

        return response()->json($englishDays);
    }

    public function showRekamMedis(RekamMedis $rekamMedis)
    {
        // --- OTORISASI PENTING ---
        // Memastikan rekam medis ini benar-benar milik pasien yang sedang login.
        if ($rekamMedis->pemesanan->id_pasien !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Memuat semua relasi yang dibutuhkan untuk ditampilkan di view
        $rekamMedis->load(['pemesanan.dokter.user', 'tindakan', 'resep', 'foto', 'pemesanan.pembayaran']);

        return view('pasien.rekam-medis.show', compact('rekamMedis'));
    }

    /**
     * Mengambil slot waktu yang tersedia untuk dokter pada tanggal tertentu.
     * Akan mengembalikan response JSON.
     */
    public function getSlotWaktu(Dokter $dokter, $tanggal)
    {
        try {
            $date = Carbon::parse($tanggal);

            // --- PERUBAHAN LOGIKA DI SINI ---
            // 1. Dapatkan nomor hari (Minggu=0, Senin=1, ..., Sabtu=6)
            $dayOfWeekNumber = $date->dayOfWeek;

            // 2. Buat pemetaan dari nomor ke nama hari dalam Bahasa Indonesia
            $dayMap = [
                1 => 'Senin',
                2 => 'Selasa',
                3 => 'Rabu',
                4 => 'Kamis',
                5 => 'Jumat',
                6 => 'Sabtu',
                0 => 'Minggu',
            ];

            // 3. Dapatkan nama hari yang benar
            $dayName = $dayMap[$dayOfWeekNumber] ?? null;
            // --- AKHIR PERUBAHAN ---

            $jadwal = $dokter->jadwal()->where('hari', $dayName)->first();

            if (!$jadwal) {
                return response()->json([]);
            }

            // Generate semua slot waktu yang mungkin
            $startTime = Carbon::parse($jadwal->jam_mulai);
            $endTime = Carbon::parse($jadwal->jam_selesai);
            $slotDuration = $jadwal->durasi_slot_menit;
            $allSlots = [];

            while ($startTime < $endTime) {
                $allSlots[] = $startTime->format('H:i');
                $startTime->addMinutes($slotDuration);
            }

            // Cek slot yang sudah dipesan pada tanggal tersebut
            $bookedSlots = Pemesanan::where('id_dokter', $dokter->id)
                ->where('tanggal_pesan', $date->format('Y-m-d'))
                ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
                ->pluck('waktu_pesan')
                ->map(function ($time) {
                    try {
                        return Carbon::parse($time)->format('H:i');
                    } catch (\Exception $e) {
                        return null;
                    }
                })
                ->filter()
                ->toArray();

            $availableSlots = array_diff($allSlots, $bookedSlots);

            return response()->json(array_values($availableSlots));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan di server.', 'message' => $e->getMessage()], 500);
        }
    }

    //----------------------------------

    public function create()
    {
        $dokters = Dokter::with('user')->get();
        $tindakans = Tindakan::all();
        return view('pasien.pemesanan.create', compact('dokters', 'tindakans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validasi untuk data diri (Langkah 1)
            'nama_pasien_booking' => ['required', 'string', 'max:255'],
            'nik' => ['nullable', 'string', 'digits:16'],
            'status_pasien' => ['required', 'in:BPJS,Umum,Inhealth'],

            // Validasi untuk jadwal (Langkah 2)
            'id_dokter' => ['required', 'exists:dokter,id'],
            'tanggal_pesan' => ['required', 'date', 'after_or_equal:today'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'tindakan_awal' => ['nullable', 'array'],
            'tindakan_awal.*' => ['exists:tindakan,id'],
            'catatan' => ['nullable', 'string'],
        ]);

        $user = Auth::user();
        $tanggal = Carbon::parse($request->tanggal_pesan);
        $hariPraktek = $tanggal->translatedFormat('l');

        $jadwal = Jadwal::where('id_dokter', $request->id_dokter)
            ->where('hari', $hariPraktek)
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Dokter tidak memiliki jadwal pada hari yang dipilih.')->withInput();
        }

        DB::transaction(function () use ($request, $user, $jadwal) {
            // 1. Update atau buat NIK di biodata
            if ($request->filled('nik')) {
                BiodataPasien::updateOrCreate(
                    ['user_id' => $user->id],
                    ['nik' => $request->nik]
                );
            }

            // 2. Buat data pemesanan
            $pemesanan = Pemesanan::create([
                'id_pasien' => $user->id,
                'nama_pasien_booking' => $request->nama_pasien_booking,
                'id_dokter' => $request->id_dokter,
                'id_jadwal' => $jadwal->id,
                'tanggal_pesan' => $request->tanggal_pesan,
                'waktu_pesan' => $request->waktu_pesan,
                'status_pasien' => $request->status_pasien,
                'catatan' => $request->catatan,
                'status' => 'Dipesan',
            ]);

            // 3. Simpan data tindakan awal ke tabel pivot
            if ($request->has('tindakan_awal')) {
                $pemesanan->tindakanAwal()->attach($request->tindakan_awal);
            }
        });

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

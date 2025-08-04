<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Dokter;
use App\Models\Jadwal;
use Carbon\Carbon;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::where('id_pasien', Auth::id())
            ->with('dokter.user', 'jadwal')
            ->latest()
            ->get();
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

    /**
     * Mengambil slot waktu yang tersedia untuk dokter pada tanggal tertentu.
     * Akan mengembalikan response JSON.
     */
    public function getSlotWaktu(Dokter $dokter, $tanggal)
    {
        try {
            $date = Carbon::parse($tanggal);
            $dayName = $date->translatedFormat('l');

            $jadwal = $dokter->jadwal()->where('hari', $dayName)->first();

            // Jika tidak ada jadwal sama sekali, langsung kembalikan array kosong.
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
                    // VERSI AMAN: Pastikan format waktu valid sebelum di-parse
                    try {
                        return Carbon::parse($time)->format('H:i');
                    } catch (\Exception $e) {
                        return null; // Abaikan jika format waktu tidak valid
                    }
                })
                ->filter() // Hapus nilai null dari koleksi
                ->toArray();
            
            // Filter untuk mendapatkan slot yang tersedia
            $availableSlots = array_diff($allSlots, $bookedSlots);

            // Mengembalikan response JSON yang valid
            return response()->json(array_values($availableSlots));

        } catch (\Exception $e) {
            // Jika terjadi error lain, kembalikan response error yang jelas
            // Anda bisa cek file storage/logs/laravel.log untuk detail errornya
            return response()->json(['error' => 'Terjadi kesalahan di server.', 'message' => $e->getMessage()], 500);
        }
    }

    //----------------------------------

    public function create()
    {
        $dokters = Dokter::with('user')->get();
        return view('pasien.pemesanan.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:dokter,id'],
            'tanggal_pesan' => ['required', 'date', 'after_or_equal:today'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'catatan' => ['nullable', 'string'],
        ]);

        // --- LOGIKA BARU UNTUK MENCARI ID JADWAL ---
        $tanggal = Carbon::parse($request->tanggal_pesan);
        $hariPraktek = $tanggal->translatedFormat('l'); // e.g., "Senin"

        $jadwal = Jadwal::where('id_dokter', $request->id_dokter)
                        ->where('hari', $hariPraktek)
                        ->first();

        if (!$jadwal) {
            return back()->with('error', 'Dokter tidak memiliki jadwal pada hari yang dipilih.');
        }
        // -----------------------------------------

        Pemesanan::create([
            'id_pasien' => Auth::id(),
            'id_dokter' => $request->id_dokter,
            'id_jadwal' => $jadwal->id, // <-- Gunakan id_jadwal yang ditemukan
            'tanggal_pesan' => $request->tanggal_pesan,
            'waktu_pesan' => $request->waktu_pesan,
            'catatan' => $request->catatan,
            'status' => 'Dipesan',
        ]);

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

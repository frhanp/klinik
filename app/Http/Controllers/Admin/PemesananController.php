<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Dokter;
use App\Models\DaftarTindakan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Jadwal;

class PemesananController extends Controller
{
    /**
     * Menampilkan semua data pemesanan.
     */
    public function index()
    {
        $pemesanans = Pemesanan::with(['pasien.biodata', 'dokter.user'])->latest()->get();
        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    /**
     * Menampilkan form untuk membuat pemesanan manual (walk-in).
     */
    public function create()
    {
        $pasiens = User::where('peran', 'pasien')->orderBy('name')->get();
        $dokters = Dokter::with('user')->orderBy('id')->get();
        // Ambil data tindakan seperti di PasienController
        $daftarTindakans = DaftarTindakan::with('tindakanItems')->orderBy('nama_kategori')->get();

        return view('admin.pemesanan.create', compact('pasiens', 'dokters', 'daftarTindakans'));
    }

    public function getSlotWaktuAdmin(Dokter $dokter, $tanggal)
    {
        try {
            $date = Carbon::parse($tanggal);
            $dayOfWeekNumber = $date->dayOfWeek;
            $dayMap = [1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 0 => 'Minggu'];
            $dayName = $dayMap[$dayOfWeekNumber] ?? null;

            $jadwal = $dokter->jadwal()->where('hari', $dayName)->first();

            if (!$jadwal) {
                return response()->json([]); // Kembalikan array kosong jika tidak ada jadwal
            }

            $startTime = Carbon::parse($jadwal->jam_mulai);
            $endTime = Carbon::parse($jadwal->jam_selesai);
            $slotDuration = $jadwal->durasi_slot_menit ?? 30; // Default 30 menit jika null
            $allSlots = [];

            while ($startTime < $endTime) {
                $allSlots[] = $startTime->format('H:i');
                $startTime->addMinutes($slotDuration);
            }

            $bookedSlots = Pemesanan::where('id_dokter', $dokter->id)
                ->where('tanggal_pesan', $date->format('Y-m-d'))
                ->whereIn('status', ['Dipesan', 'Dikonfirmasi']) // Hanya cek status aktif
                ->pluck('waktu_pesan')
                ->map(fn ($time) => Carbon::parse($time)->format('H:i'))
                ->toArray();

            $availableSlots = array_values(array_diff($allSlots, $bookedSlots));

            return response()->json($availableSlots);

        } catch (\Exception $e) {
            // Log error jika perlu: Log::error($e);
            return response()->json(['error' => 'Gagal memuat slot waktu.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Menyimpan pemesanan manual dari admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => ['required', 'exists:users,id,peran,pasien'], // Pastikan user adalah pasien
            'id_dokter' => ['required', 'exists:dokter,id'],
            'tanggal_pesan' => ['required', 'date', 'after_or_equal:today'],
            'waktu_pesan' => ['required', 'date_format:H:i'],
            'status_pasien' => ['required', 'in:BPJS,Umum,Inhealth'],
            'nomor_bpjs' => ['nullable', 'required_if:status_pasien,BPJS', 'string', 'max:20'],
            'tindakan_awal' => ['nullable', 'array'],
            'tindakan_awal.*' => ['exists:tindakan,id'],
            'catatan' => ['nullable', 'string'],
            'status' => ['required', 'in:Dikonfirmasi,Selesai'], // Status awal dari Admin
        ]);

        $pasien = User::findOrFail($request->id_pasien);
        $tanggal = Carbon::parse($request->tanggal_pesan);
        $hariPraktek = $tanggal->translatedFormat('l'); // e.g., Senin, Selasa

        // Cari jadwal yang cocok
        $jadwal = Jadwal::where('id_dokter', $request->id_dokter)
            ->where('hari', $hariPraktek)
            // ->where('jam_mulai', '<=', $request->waktu_pesan) // Uncomment jika perlu validasi jam
            // ->where('jam_selesai', '>', $request->waktu_pesan)
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Dokter tidak memiliki jadwal pada hari/jam yang dipilih.')->withInput();
        }

        // Cek ketersediaan slot (opsional tapi disarankan)
        $slotExists = Pemesanan::where('id_dokter', $request->id_dokter)
                        ->where('tanggal_pesan', $request->tanggal_pesan)
                        ->where('waktu_pesan', $request->waktu_pesan)
                        ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
                        ->exists();

        if ($slotExists) {
             return back()->with('error', 'Slot waktu yang dipilih sudah dipesan.')->withInput();
        }


        DB::transaction(function () use ($request, $pasien, $jadwal) {

            // Buat data pemesanan
            $nomorAntrianBaru = null;
            if ($request->status == 'Dikonfirmasi') {
                $maxAntrian = Pemesanan::where('id_dokter', $request->id_dokter)
                                    ->where('tanggal_pesan', $request->tanggal_pesan)
                                    ->where('status', 'Dikonfirmasi')
                                    ->max('nomor_antrian');
                $nomorAntrianBaru = $maxAntrian + 1;
            }
            $pemesanan = Pemesanan::create([
                'id_pasien' => $pasien->id,
                'nama_pasien_booking' => $pasien->name, // Ambil nama dari user pasien
                'id_dokter' => $request->id_dokter,
                'id_jadwal' => $jadwal->id,
                'tanggal_pesan' => $request->tanggal_pesan,
                'waktu_pesan' => $request->waktu_pesan,
                'status_pasien' => $request->status_pasien,
                'catatan' => $request->catatan,
                'status' => $request->status, // Status awal (misal: Dikonfirmasi)
                'nomor_bpjs' => $request->nomor_bpjs,
                'nomor_antrian' => $nomorAntrianBaru,
            ]);

            // Simpan data tindakan awal ke tabel pivot
            if ($request->has('tindakan_awal')) {
                $pemesanan->tindakanAwal()->attach($request->tindakan_awal);
            }
        });

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan untuk pasien berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail spesifik pemesanan.
     */
    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load(['pasien', 'dokter.user', 'jadwal']);
        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    /**
     * Menampilkan form untuk mengedit status pemesanan.
     */
    public function edit(Pemesanan $pemesanan)
    {
        // Memuat relasi yang dibutuhkan untuk ditampilkan di view
        $pemesanan->load(['pasien.biodata', 'dokter.user', 'jadwal']);
        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Memperbarui status pemesanan.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        
        $rules = [
            'status' => 'required|string|in:Dikonfirmasi,Selesai,Dibatalkan,Dijadwalkan Ulang',
            'catatan_admin' => 'required_if:status,Dibatalkan|nullable|string|max:1000',
        ];

        // Jika statusnya "Dijadwalkan Ulang", wajibkan tanggal & waktu baru
        if ($request->status == 'Dijadwalkan Ulang') {
            $rules['tanggal_pesan_baru'] = 'required|date|after_or_equal:today';
            $rules['waktu_pesan_baru'] = 'required|date_format:H:i';
        }
        $request->validate($rules);
        

        $dataToUpdate = $request->only('status', 'catatan_admin');
        $statusAsal = $pemesanan->status;
        $tanggalPesan = $pemesanan->tanggal_pesan;

        
        if ($request->status == 'Dijadwalkan Ulang') {
            
            // 1. Validasi Jadwal & Slot Baru
            $tanggal = Carbon::parse($request->tanggal_pesan_baru);
            $hariPraktek = $tanggal->translatedFormat('l');
            $jadwal = Jadwal::where('id_dokter', $pemesanan->id_dokter)
                            ->where('hari', $hariPraktek)
                            ->first();

            if (!$jadwal) {
                return back()->with('error', 'Dokter tidak memiliki jadwal pada hari baru yang dipilih.')->withInput();
            }

            $slotExists = Pemesanan::where('id_dokter', $pemesanan->id_dokter)
                            ->where('tanggal_pesan', $request->tanggal_pesan_baru)
                            ->where('waktu_pesan', $request->waktu_pesan_baru)
                            ->where('id', '!=', $pemesanan->id) // Abaikan pemesanan ini sendiri
                            ->whereIn('status', ['Dipesan', 'Dikonfirmasi'])
                            ->exists();

            if ($slotExists) {
                 return back()->with('error', 'Slot waktu baru sudah dipesan. Silakan pilih jam lain.')->withInput();
            }

            // 2. Jika valid, siapkan data untuk update
            $dataToUpdate['tanggal_pesan'] = $request->tanggal_pesan_baru;
            $dataToUpdate['waktu_pesan'] = $request->waktu_pesan_baru;
            $dataToUpdate['id_jadwal'] = $jadwal->id;
            $dataToUpdate['status'] = 'Menunggu Konfirmasi Pasien';
            $tanggalPesan = $request->tanggal_pesan_baru; // Gunakan tanggal baru untuk generate antrian
        }

        
        // Jika status (baru) adalah Dikonfirmasi DAN status (lama) BUKAN Dikonfirmasi
        if ($dataToUpdate['status'] == 'Dikonfirmasi' && $statusAsal != 'Dikonfirmasi') {
            $maxAntrian = Pemesanan::where('id_dokter', $pemesanan->id_dokter)
                                ->where('tanggal_pesan', $tanggalPesan) // Gunakan tanggal yang relevan
                                ->whereIn('status', ['Dikonfirmasi', 'Selesai'])
                                ->max('nomor_antrian');
            
            $dataToUpdate['nomor_antrian'] = $maxAntrian + 1;
        } 
        // Reset nomor antrian jika Dibatalkan atau Selesai
        elseif (in_array($dataToUpdate['status'], ['Dibatalkan', 'Selesai'])) {
            $dataToUpdate['nomor_antrian'] = null;
        }

        $pemesanan->update($dataToUpdate);

        return redirect()->route('admin.pemesanan.index')->with('success', 'Status pemesanan berhasil diperbarui.');
    }

    /**
     * Menghapus data pemesanan.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        // Sebaiknya pemesanan tidak dihapus permanen jika sudah ada rekam medis.
        // Opsi yang lebih aman adalah membatalkannya.
        if ($pemesanan->rekamMedis) {
            return back()->with('error', 'Pemesanan tidak dapat dihapus karena sudah memiliki rekam medis.');
        }
        $pemesanan->delete();
        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}

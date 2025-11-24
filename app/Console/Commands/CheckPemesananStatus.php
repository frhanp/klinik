<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pemesanan;
use Carbon\Carbon;
use App\Notifications\PemesananReminder;
use App\Notifications\PemesananAutoCancelWarning;
use App\Notifications\PemesananAutoCancelled;
class CheckPemesananStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pemesanan:check';

    protected $description = 'Cek status pemesanan untuk reminder dan auto-cancel';

    /**
     * The console command description.
     *
     * @var string
     */
  

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        // Ambil semua pemesanan HARI INI yang statusnya DIKONFIRMASI
        // dan BELUM ada rekam medis (artinya belum diperiksa)
        $pemesanans = Pemesanan::whereDate('tanggal_pesan', $today)
            ->where('status', 'Dikonfirmasi')
            ->doesntHave('rekamMedis')
            ->with('pasien') // Eager load pasien
            ->get();

        foreach ($pemesanans as $pemesanan) {
            // Gabungkan tanggal dan waktu pesan menjadi objek Carbon
            $waktuJadwal = Carbon::parse($pemesanan->tanggal_pesan . ' ' . $pemesanan->waktu_pesan);
            
            // Hitung selisih menit (Positif = Lewat jadwal, Negatif = Sebelum jadwal)
            $diffInMinutes = $waktuJadwal->diffInMinutes($now, false); 

            // 1. REMINDER (H-10 menit)
            // Cek jika waktu sekarang adalah 10 menit sebelum jadwal (range -10 sampai -9)
            if ($diffInMinutes >= -10 && $diffInMinutes < -5 && !$pemesanan->notif_reminder_sent) {
                if ($pemesanan->pasien) {
                    $pemesanan->pasien->notify(new PemesananReminder($pemesanan));
                    $pemesanan->update(['notif_reminder_sent' => true]);
                    $this->info("Reminder sent to {$pemesanan->pasien->name}");
                }
            }

            // 2. WARNING PEMBATALAN (H+50 menit / 10 menit sebelum batal)
            if ($diffInMinutes >= 50 && $diffInMinutes < 60 && !$pemesanan->notif_warning_sent) {
                if ($pemesanan->pasien) {
                    $pemesanan->pasien->notify(new PemesananAutoCancelWarning($pemesanan));
                    $pemesanan->update(['notif_warning_sent' => true]);
                    $this->info("Warning sent to {$pemesanan->pasien->name}");
                }
            }

            // 3. AUTO CANCEL (H+60 menit)
            if ($diffInMinutes >= 60) {
                $pemesanan->update([
                    'status' => 'Dibatalkan', // Atau buat status baru 'Expired'
                    'catatan_admin' => 'Dibatalkan otomatis oleh sistem (No Show > 1 Jam)'
                ]);

                if ($pemesanan->pasien) {
                    $pemesanan->pasien->notify(new PemesananAutoCancelled($pemesanan));
                }
                $this->info("Auto-cancelled booking ID {$pemesanan->id}");
            }
        }
    }
}

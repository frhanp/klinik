<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Pemesanan;

class PemesananStatusUpdated extends Notification
{
    use Queueable;
    protected $pemesanan;
    /**
     * Create a new notification instance.
     */
    public function __construct(Pemesanan $pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database']; // [MODIFIKASI] Kirim ke database
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $status = $this->pemesanan->status;
        $namaPasien = $this->pemesanan->nama_pasien_booking;
        $namaDokter = $this->pemesanan->dokter->user->name;
        $tanggal = \Carbon\Carbon::parse($this->pemesanan->tanggal_pesan)->format('d/m/Y');
        $pesan = '';
        $url = '#';

        // --- LOGIKA PESAN BERDASARKAN PERAN PENERIMA ---

        if ($notifiable->peran == 'pasien') {
            // NOTIF UNTUK PASIEN
            $url = route('pasien.pemesanan.index');
            if ($status == 'Dibatalkan Dokter') {
                $pesan = "Pemesanan Anda tanggal $tanggal DIBATALKAN oleh dr. $namaDokter. Alasan: " . ($this->pemesanan->catatan_admin ?? '-');
            } elseif ($status == 'Dikonfirmasi') {
                $pesan = "Pemesanan Anda tanggal $tanggal telah DIKONFIRMASI. Nomor Antrian: {$this->pemesanan->nomor_antrian}.";
            } elseif ($status == 'Menunggu Konfirmasi Pasien') { // Status khusus reschedule
                $pesan = "Jadwal Anda diubah oleh klinik. Mohon konfirmasi jadwal baru di dashboard.";
                $url = route('pasien.dashboard');
            } else {
                $pesan = "Status pemesanan Anda berubah menjadi '$status'.";
            }

        } elseif ($notifiable->peran == 'dokter') {
            // NOTIF UNTUK DOKTER
            $url = route('dokter.dashboard'); // Atau jadwal
            if ($status == 'Dikonfirmasi') {
                $pesan = "Jadwal Baru: Pasien $namaPasien dikonfirmasi untuk tanggal $tanggal.";
            } elseif ($status == 'Dibatalkan') {
                $pesan = "Pembatalan: Pasien $namaPasien membatalkan janji temu tanggal $tanggal.";
            } elseif ($status == 'Dibatalkan Dokter') {
                 // Dokter membatalkan sendiri, mungkin tidak butuh notif, tapi kalau mau:
                 $pesan = "Anda membatalkan janji temu dengan $namaPasien tanggal $tanggal.";
            }

        } elseif ($notifiable->peran == 'admin') {
            // NOTIF UNTUK ADMIN
            $url = route('admin.pemesanan.edit', $this->pemesanan->id);
            if ($status == 'Dikonfirmasi' && $this->pemesanan->nomor_antrian) { // Kasus Reschedule disetujui
                $pesan = "Pasien $namaPasien MENYETUJUI jadwal baru tanggal $tanggal.";
            } elseif ($status == 'Ditolak Pasien') {
                $pesan = "Pasien $namaPasien MENOLAK jadwal baru. Harap hubungi pasien.";
            } elseif ($status == 'Dibatalkan') {
                $pesan = "Pasien $namaPasien membatalkan janji temu tanggal $tanggal.";
            } elseif ($status == 'Dibatalkan Dokter') {
                $pesan = "dr. $namaDokter membatalkan janji dengan $namaPasien. Alasan: " . ($this->pemesanan->catatan_admin ?? '-');
            }
        }

        return [
            'pemesanan_id' => $this->pemesanan->id,
            'status' => $status,
            'pesan' => $pesan,
            'url' => $url,
        ];
    }
}

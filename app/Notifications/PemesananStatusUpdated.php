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
        // [MODIFIKASI] Data yang akan disimpan di kolom 'data' JSON
        $status = $this->pemesanan->status;
        $pesan = "Status pemesanan Anda telah diperbarui menjadi '{$status}'.";

        if ($status === 'Dijadwalkan Ulang') {
            $pesan = "Pemesanan Anda Dijadwalkan Ulang. Mohon konfirmasi jadwal baru di dashboard Anda.";
        } elseif ($status === 'Dibatalkan') {
            $pesan = "Pemesanan Anda tanggal {$this->pemesanan->tanggal_pesan} telah dibatalkan.";
        }

        return [
            'pemesanan_id' => $this->pemesanan->id,
            'status' => $status,
            'pesan' => $pesan,
        ];
    } 
}

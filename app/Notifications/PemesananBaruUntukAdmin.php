<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Pemesanan;

class PemesananBaruUntukAdmin extends Notification
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
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'pemesanan_id' => $this->pemesanan->id,
            'pesan' => "Pasien '{$this->pemesanan->nama_pasien_booking}' telah membuat janji temu baru (Status: Dipesan).",
            'url' => route('admin.pemesanan.edit', $this->pemesanan->id)
        ];
    }
}

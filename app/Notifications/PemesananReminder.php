<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PemesananReminder extends Notification
{
    use Queueable;
    protected $pemesanan;

    /**
     * Create a new notification instance.
     */
    public function __construct($pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        $jam = \Carbon\Carbon::parse($this->pemesanan->waktu_pesan)->format('H:i');
        return [
            'pesan' => "Pengingat: Jadwal konsultasi Anda pukul $jam akan segera dimulai dalam 10 menit.",
            'url' => route('pasien.dashboard')
        ];
    }
}

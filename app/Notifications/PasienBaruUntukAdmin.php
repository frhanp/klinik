<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class PasienBaruUntukAdmin extends Notification
{
    use Queueable;
    protected $pasien;
    /**
     * Create a new notification instance.
     */
    public function __construct(User $pasien)
    {
        $this->pasien = $pasien;
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
            'pasien_id' => $this->pasien->id,
            'pesan' => "Pasien baru '{$this->pasien->name}' telah mendaftar.",
            'url' => route('admin.pasien.show', $this->pasien->id)
        ];
    }
}

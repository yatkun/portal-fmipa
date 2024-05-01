<?php

namespace App\Notifications;

use App\Models\Tugas;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TugasNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $tugas;
    public function __construct(Tugas $tugas)
    {
        $this->tugas = $tugas;
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
    public function toArray(object $notifiable): array
    {
        return [
            'tugas_id' => $this->tugas->id,
            'kelas' => $this->tugas->kelas->nama_kelas,
            'kelas_id' => $this->tugas->kelas->id,
            'kode_kelas' => $this->tugas->kelas->kode_kelas,
            'judul' => $this->tugas->judul,
            'deadline' => $this->tugas->tglakhir,
            'user_id' => $this->tugas->user_id,
            'url' => URL::to('e-learning/mahasiswa/kelas/' . $this->tugas->kelas->kode_kelas . '/tugas/' . $this->tugas->id),
        ];
    }
}

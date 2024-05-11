<?php

namespace App\Notifications;


use App\Models\Tugas;
use App\Models\Tugasuser;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NilaiNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $nilai;
    public function __construct(Tugasuser $nilai)
    {
        $this->nilai = $nilai;
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
            'nilai' => $this->nilai->nilai,
            'tanggapan' => $this->nilai->tanggapan,
            'kelas'=> $this->nilai->tugas->kelas->nama_kelas,
            'tugas'=> $this->nilai->tugas->judul,
            'url_nilai' => URL::to('e-learning/mahasiswa/kelas/' . $this->nilai->tugas->kelas->kode_kelas . '/tugas/' . $this->nilai->tugas->id),
        ];
    }
}

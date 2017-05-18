<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class felicitacionesRegistro extends Notification
{
    use Queueable;
    /**
     * @var userProfile
     */
    private $profile;

    /**
     * Create a new notification instance.
     *
     * @param userProfile $profile
     */
    public function __construct(felicitacionesRegistro $profile)
    {
        //
        $this->profile = $profile;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Bienvenido al Taller Basico de Robotica')
                    ->line('Gracias por inscribirte!')
                    ->line('Te esperamos');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

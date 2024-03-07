<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAppointmentNotification extends Notification
{
    use Queueable;

    private $appointment_details;

    /**
     * Create a new notification instance.
     */
    public function __construct($appointment_details)
    {
        $this->appointment_details = $appointment_details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Appointment Booked Successfully')
            ->greeting($this->appointment_details['greeting'])
            ->line($this->appointment_details['body'])
            ->action($this->appointment_details['actiontext'], $this->appointment_details['actionurl'])
            ->line($this->appointment_details['lastline']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

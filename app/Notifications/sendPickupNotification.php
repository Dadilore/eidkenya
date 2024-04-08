<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendPickupNotification extends Notification
{
    use Queueable;
    private $pickup_details;

    /**
     * Create a new notification instance.
     */
    public function __construct($pickup_details)
    {
        $this->pickup_details=$pickup_details;
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
                    ->subject('Pick Up Your ID')
                    ->greeting($this->pickup_details['greeting'])
                    ->line($this->pickup_details['body'])
                    ->action($this->pickup_details['actiontext'], $this->pickup_details['actionurl'])
                    ->line($this->pickup_details['lastline']);
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

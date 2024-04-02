<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\AfricasTalking\AfricasTalkingChannel;
use NotificationChannels\AfricasTalking\AfricasTalkingMessage;

class NewsWasPublished extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<string>
     */
    public function via($notifiable): array
    {
        return [AfricasTalkingChannel::class];
    }

    /**
     * Get the SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \NotificationChannels\AfricasTalking\AfricasTalkingMessage
     */
    public function toAfricasTalking($notifiable): AfricasTalkingMessage
    {
        return (new AfricasTalkingMessage())
            ->content("Your ID is ready for pickup")
            ->to("0743316661");
    }
}

<?php

namespace App\Notifications;

use App\Models\TmrEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TmrApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public TmrEntry $tmr)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('TMR Approved: '.$this->tmr->number)
            ->line('The TMR has been approved.')
            ->line('Number: '.$this->tmr->number)
            ->action('Open Admin', url('/admin'));
    }
}


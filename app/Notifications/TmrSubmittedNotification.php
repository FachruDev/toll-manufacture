<?php

namespace App\Notifications;

use App\Models\TmrEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TmrSubmittedNotification extends Notification implements ShouldQueue
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
            ->subject('TMR Submitted: '.$this->tmr->number)
            ->line('A new TMR has been submitted.')
            ->line('Number: '.$this->tmr->number)
            ->line('Submitted by: '.$this->tmr->submitted_email)
            ->action('Open Admin', url('/admin'));
    }
}


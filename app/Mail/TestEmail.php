<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function build(): self
    {
        return $this->subject('SMTP Test - Toll Manufacture')
            ->view('emails.test');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'mailer','host','port','encryption','username','password','from_address','from_name','timeout','active'
    ];

    protected $casts = [
        'active' => 'boolean',
        'password' => 'encrypted',
    ];

    public function apply(): void
    {
        if (! $this->active) {
            return;
        }

        $this->forceApply();
    }

    public function forceApply(): void
    {
        config([
            'mail.default' => $this->mailer ?: 'smtp',
            'mail.from.address' => $this->from_address,
            'mail.from.name' => $this->from_name,
            'mail.mailers.smtp' => array_filter([
                'transport' => 'smtp',
                'host' => $this->host,
                'port' => $this->port,
                'encryption' => $this->encryption ?: null,
                'username' => $this->username,
                'password' => $this->password,
                'timeout' => $this->timeout ?: 60,
                'auth_mode' => null,
            ]),
        ]);
    }
}


<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notification as BaseNotification;

class NotificationTargetResolver
{
    public static function notify(string $eventKey, BaseNotification $notification): void
    {
        $cfg = DB::table('email_configs')->where('event_key', $eventKey)->where('active', true)->first();
        if (! $cfg) return;

        $roles = collect(json_decode($cfg->send_to_roles ?: '[]', true));
        $userIds = collect(json_decode($cfg->send_to_users ?: '[]', true));
        $emails = collect(json_decode($cfg->send_to_emails ?: '[]', true));

        $usersByRole = $roles->isNotEmpty()
            ? User::role($roles->all())->get()
            : collect();
        $usersById = $userIds->isNotEmpty()
            ? User::whereIn('id', $userIds->all())->get()
            : collect();

        $recipients = $usersByRole->merge($usersById)->unique('id');
        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, $notification);
        }

        foreach ($emails as $email) {
            Notification::route('mail', $email)->notify($notification);
        }
    }
}


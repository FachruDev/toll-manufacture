<?php

namespace App\Http\Controllers;

use App\Models\TmrEntry;
use App\Models\TmrInvite;
use App\Models\InformationContactTmrEntry;
use App\Notifications\TmrSubmittedNotification;
use App\Services\NotificationTargetResolver;
use App\Services\TmrNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicTmrController extends Controller
{
    public function show(string $token)
    {
        $invite = TmrInvite::where('token', $token)->firstOrFail();
        abort_if($invite->used_at, 410, 'Invitation already used');
        abort_if(now()->greaterThan($invite->expires_at), 410, 'Invitation expired');

        return response()->json([
            'token' => $invite->token,
            'email' => $invite->email,
            'expires_at' => $invite->expires_at,
        ]);
    }

    public function submit(Request $request, string $token)
    {
        $invite = TmrInvite::where('token', $token)->lockForUpdate()->firstOrFail();
        if ($invite->used_at || now()->greaterThan($invite->expires_at)) {
            return response()->json(['message' => 'Invitation invalid or expired'], 410);
        }

        $data = $request->validate([
            'contact.company' => 'required|string|max:255',
            'contact.address' => 'nullable|string|max:500',
            'contact.phone_number' => 'nullable|string|max:50',
            'contact.contact_person' => 'nullable|string|max:255',
            'contact.email' => 'nullable|email|max:255',
        ]);

        $tmr = DB::transaction(function () use ($invite, $data) {
            $tmr = TmrEntry::create([
                'public_uuid' => (string) Str::uuid(),
                'number' => TmrNumberService::nextFormatted(),
                'status' => 'submitted',
                'submitted_email' => $invite->email,
                'submitted_at' => now(),
            ]);

            InformationContactTmrEntry::create(array_merge(
                ['tmr_entry_id' => $tmr->id],
                $data['contact']
            ));

            $invite->tmr_entry_id = $tmr->id;
            $invite->used_at = now();
            $invite->save();

            return $tmr;
        });

        NotificationTargetResolver::notify('tmr.submitted', new TmrSubmittedNotification($tmr));

        return response()->json([
            'message' => 'TMR submitted',
            'public_uuid' => $tmr->public_uuid,
            'number' => $tmr->number,
        ]);
    }
}


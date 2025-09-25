<?php

namespace App\Http\Controllers;

use App\Models\TmrDraft;
use App\Models\TmrEntry;
use App\Models\TmrInvite;
use App\Models\InformationContactTmrEntry;
use App\Notifications\TmrSubmittedNotification;
use App\Services\NotificationTargetResolver;
use App\Services\TmrNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicTmrDraftController extends Controller
{
    protected function validInvite(string $token): TmrInvite
    {
        $invite = TmrInvite::where('token', $token)->lockForUpdate()->firstOrFail();
        abort_if($invite->used_at, 410, 'Invitation already used');
        abort_if(now()->greaterThan($invite->expires_at), 410, 'Invitation expired');
        return $invite;
    }

    public function show(string $token)
    {
        $invite = TmrInvite::where('token', $token)->firstOrFail();
        abort_if($invite->used_at, 410, 'Invitation already used');
        abort_if(now()->greaterThan($invite->expires_at), 410, 'Invitation expired');

        $draft = TmrDraft::firstOrCreate(['tmr_invite_id' => $invite->id]);

        return response()->json([
            'token' => $invite->token,
            'email' => $invite->email,
            'expires_at' => $invite->expires_at,
            'payload' => $draft->payload ?? new \stdClass(),
            'status' => $draft->status,
        ]);
    }

    public function save(Request $request, string $token)
    {
        $invite = $this->validInvite($token);
        $data = $request->validate([
            'section' => 'required|string|max:100',
            'data' => 'required|array',
        ]);

        $draft = TmrDraft::firstOrCreate(['tmr_invite_id' => $invite->id]);
        $payload = $draft->payload ?? [];
        $payload[$data['section']] = $data['data'];
        $draft->payload = $payload;
        $draft->save();

        return response()->json(['message' => 'Saved', 'payload' => $draft->payload]);
    }

    public function finalize(Request $request, string $token)
    {
        $invite = $this->validInvite($token);
        $draft = TmrDraft::firstOrCreate(['tmr_invite_id' => $invite->id]);
        $payload = $draft->payload ?? [];

        // Required sections: contact, product_names, formulation.actives_formulation
        if (empty($payload['contact']) || empty($payload['contact']['company'])) {
            return response()->json(['message' => 'Contact section incomplete', 'field' => 'contact.company'], 422);
        }
        $productName = trim((string)($payload['product_name'] ?? ''));
        if ($productName === '') {
            return response()->json(['message' => 'Product name is required', 'field' => 'product_name'], 422);
        }
        $formActives = trim((string)($payload['formulation']['actives_formulation'] ?? ''));
        if ($formActives === '') {
            return response()->json(['message' => 'Actives/Formulation is required', 'field' => 'formulation.actives_formulation'], 422);
        }

        $technicalMadeId = (int)($payload['technical_made_id'] ?? 0);
        if ($technicalMadeId === 0) {
            return response()->json(['message' => 'Technical made is required', 'field' => 'technical_made_id'], 422);
        }
        $indication = trim((string)($payload['indication'] ?? ''));
        if ($indication === '') {
            return response()->json(['message' => 'Indication is required', 'field' => 'indication'], 422);
        }
        $productCategory = trim((string)($payload['product_category'] ?? ''));
        if ($productCategory === '') {
            return response()->json(['message' => 'Product category is required', 'field' => 'product_category'], 422);
        }

        $tmr = DB::transaction(function () use ($invite, $draft, $payload, $productName, $formActives, $technicalMadeId, $indication, $productCategory) {
            $tmr = TmrEntry::create([
                'public_uuid' => (string) Str::uuid(),
                'number' => TmrNumberService::nextFormatted(),
                'status' => 'submitted',
                'submitted_email' => $invite->email,
                'submitted_at' => now(),
                'request_date' => !empty($payload['contact']['request_date']) ? $payload['contact']['request_date'] : now()->toDateString(),
            ]);

            // Persist contact info from draft
            $contact = $payload['contact'];
            InformationContactTmrEntry::create([
                'tmr_entry_id' => $tmr->id,
                'company' => $contact['company'] ?? '',
                'address' => $contact['address'] ?? null,
                'phone_number' => $contact['phone_number'] ?? null,
                'contact_person' => $contact['contact_person'] ?? null,
                'email' => $contact['email'] ?? null,
            ]);

            // Required: product name (single)
            \App\Models\ProductNameEntry::create([
                'tmr_entry_id' => $tmr->id,
                'product_name' => $productName,
            ]);

            // Required: formulation
            \App\Models\FormulationEntry::create([
                'tmr_entry_id' => $tmr->id,
                'actives_formulation' => $formActives,
            ]);

            // Required: technical made (one choice)
            \App\Models\FormulationTechnicalInformationEntry::create([
                'tmr_entry_id' => $tmr->id,
                'technical_made_id' => $technicalMadeId,
            ]);

            // Required: indication
            \App\Models\IndicationEntry::create([
                'tmr_entry_id' => $tmr->id,
                'indication' => $indication,
            ]);

            // Required: product category
            \App\Models\ProductCategoryEntry::create([
                'tmr_entry_id' => $tmr->id,
                'product_category' => $productCategory,
            ]);

            // Mark invite used and draft finalized
            $invite->tmr_entry_id = $tmr->id;
            $invite->used_at = now();
            $invite->save();

            $draft->status = 'finalized';
            $draft->save();

            return $tmr;
        });

        NotificationTargetResolver::notify('tmr.submitted', new TmrSubmittedNotification($tmr));

        return response()->json([
            'message' => 'Finalized',
            'public_uuid' => $tmr->public_uuid,
            'number' => $tmr->number,
        ]);
    }
}

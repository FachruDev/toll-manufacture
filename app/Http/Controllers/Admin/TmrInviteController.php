<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TmrInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TmrInviteController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $perPage = min((int)$perPage, 100);

        $invites = TmrInvite::with('creator')->latest('id')->paginate($perPage);
        return response()->view('admin.tmr-invites.index', compact('invites'));
    }

    public function create()
    {
        return response()->view('admin.tmr-invites.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email','max:255'],
            'expires_in_days' => ['nullable','integer','min:1','max:365'],
            'meta' => ['nullable','array'],
        ]);

        $expires = now()->addDays((int)($data['expires_in_days'] ?? 7));

        $invite = TmrInvite::create([
            'token' => (string) Str::uuid(),
            'email' => $data['email'],
            'expires_at' => $expires,
            'created_by' => Auth::id(),
            'meta' => $data['meta'] ?? [],
        ]);

        // Return plain token and public link to be copied manually
        return redirect()->route('tmr-invites.index')
            ->with('success', 'Invite created: '.url('/tmr/invite/'.$invite->token));
    }

    public function show(TmrInvite $tmr_invite)
    {
        return response()->view('admin.tmr-invites.show', ['invite' => $tmr_invite]);
    }

    public function destroy(TmrInvite $tmr_invite)
    {
        $tmr_invite->delete();
        return back()->with('success', 'Invite deleted');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('invite_ids', []);
        TmrInvite::whereIn('id', $ids)->delete();
        return redirect()->route('tmr-invites.index')->with('success', 'Selected invites deleted successfully.');
    }
}


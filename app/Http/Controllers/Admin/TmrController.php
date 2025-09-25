<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\TmrEntry;
use App\Models\User;
use App\Notifications\TmrApprovedNotification;
use App\Services\NotificationTargetResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TmrController extends Controller
{
    public function index()
    {
        $tmrs = TmrEntry::with('customer')->latest('id')->paginate(20);
        return response()->view('admin.tmrs.index', compact('tmrs'));
    }

    public function show(TmrEntry $tmr)
    {
        $tmr->load(['customer','contactInformation','histories','approvals']);
        return response()->view('admin.tmrs.show', compact('tmr'));
    }

    public function print(TmrEntry $tmr)
    {
        $tmr->load(['contactInformation','productNames','formulation','technicalInfo.technicalMade','indication','productCategory','approvals','customer']);
        return view('admin.tmrs.print', compact('tmr'));
    }

    public function approve(Request $request, TmrEntry $tmr)
    {
        abort_unless($tmr->status !== 'approved', 400, 'Already approved');

        DB::transaction(function () use ($tmr) {
            // Ensure Customer exists from contact/submitted email
            $email = optional($tmr->contactInformation)->email ?: $tmr->submitted_email;
            $name = optional($tmr->contactInformation)->contact_person ?: 'Customer';
            $company = optional($tmr->contactInformation)->company;
            $phone = optional($tmr->contactInformation)->phone_number;

            if ($email) {
                $customer = Customer::firstOrCreate(
                    ['email' => $email],
                    ['name' => $name, 'company' => $company, 'phone' => $phone]
                );
                $tmr->customer_id = $customer->id;

                // Create User account if not exists
                $user = User::where('email', $email)->first();
                if (! $user) {
                    $user = User::create([
                        'name' => $name ?: ($company ?: 'Customer'),
                        'email' => $email,
                        'username' => Str::slug($name ?: $company ?: 'customer').'-'.Str::random(4),
                        'password' => Hash::make(Str::random(16)),
                    ]);
                    $user->assignRole('customer');
                }
            }

            $tmr->status = 'approved';
            $tmr->save();
        });

        NotificationTargetResolver::notify('tmr.approved', new TmrApprovedNotification($tmr));

        return back()->with('success', 'TMR approved and customer linked/created');
    }

    public function reject(Request $request, TmrEntry $tmr)
    {
        $request->validate(['reason' => 'nullable|string|max:1000']);
        $tmr->update(['status' => 'rejected']);
        return back()->with('success', 'TMR rejected');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class MailSettingController extends Controller
{
    public function edit()
    {
        $setting = MailSetting::first() ?? new MailSetting([
            'mailer' => 'smtp',
            'port' => 587,
            'encryption' => 'tls',
        ]);

        return view('admin.settings.mail', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'mailer' => 'required|string|in:smtp',
            'host' => 'required|string',
            'port' => 'required|integer',
            'encryption' => 'nullable|string|in:tls,ssl',
            'username' => 'nullable|string',
            'password' => 'nullable|string',
            'from_address' => 'required|email',
            'from_name' => 'required|string',
            'timeout' => 'nullable|integer',
            'active' => 'sometimes|boolean',
        ]);

        $setting = MailSetting::first();
        if (! $setting) {
            $setting = new MailSetting();
        }

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $setting->fill($data);
        $setting->active = $request->boolean('active');
        $setting->save();

        Cache::forget('mail_settings.active');
        $setting->apply();

        return back()->with('success', 'Email SMTP configuration updated.');
    }

    public function sendTest(Request $request)
    {
        $validated = $request->validate([
            'to' => ['required','email']
        ]);

        $setting = MailSetting::latest('id')->first();
        if (!$setting) {
            return back()->withErrors(['to' => 'No mail configuration found. Please save the settings first.']);
        }

        Cache::forget('mail_settings.active');
        $setting->forceApply();

        try {
            Mail::to($validated['to'])->send(new TestEmail());
            return back()->with('success', 'Test email sent to '.$validated['to']);
        } catch (\Throwable $e) {
            return back()->withErrors(['to' => 'Failed to send: '.$e->getMessage()]);
        }
    }
}

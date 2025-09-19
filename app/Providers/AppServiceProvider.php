<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\MailSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $setting = Cache::remember('mail_settings.active', 60, function () {
                return MailSetting::query()->where('active', true)->latest('id')->first();
            });

            if ($setting) {
                $setting->apply();
            }
        } catch (\Throwable $e) {
            // Silent fail if database not ready or no settings
        }
    }
}

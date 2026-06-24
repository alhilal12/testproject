<?php

namespace App\Providers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        \Log::info('APP_ENV value from config: ' . config('app.env'));
        // Force HTTPS in production (Clever-Cloud detection)
        if (config('app.env') === 'production' || env('CC_WEBROOT')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Set application locale from session if available so views use translations
        try {
            $sessionLocale = session()->get('locale');
            if ($sessionLocale) {
                app()->setLocale($sessionLocale);
            }
            // Share current locale with all views for dynamic dir/lang adjustments
            \View::share('currentLocale', app()->getLocale());
        } catch (\Exception $e) {
            // session() may not be available in some contexts (console), ignore silently
        }
}
}

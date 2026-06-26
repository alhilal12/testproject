<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['ar', 'en', 'tr'];
        $locale = $request->session()->get('locale', config('app.locale', 'ar'));

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = 'ar';
        }

        app()->setLocale($locale);
        config(['app.locale' => $locale]);

        View::share('currentLocale', $locale);
        View::share('currentDirection', $locale === 'ar' ? 'rtl' : 'ltr');

        return $next($request);
    }
}

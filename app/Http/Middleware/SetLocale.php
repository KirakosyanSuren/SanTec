<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        $supportedLocales = ['en', 'ru', 'hy'];

        if (!in_array($locale, $supportedLocales)) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        // Чтобы route() автоматически подставлял locale
        URL::defaults([
            'locale' => $locale,
        ]);

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('X-LOCALE')) {
            // Language set in the header of the request should always be primary choice
            App::setLocale($request->header('X-LOCALE'));
        } else {
            // Getting the preferred language from the browser if it matches any of the supported languages
            App::setLocale('en');
        }
        return $next($request);
    }
}

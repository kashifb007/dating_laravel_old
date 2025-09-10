<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale')
            ?? optional($request->user())->locale
            ?? config('app.locale');

        app()->setLocale($locale);

        // Keep session and user preference in sync
        if (auth()->check() && session('locale') !== $locale) {
            session(['locale' => $locale]);
        }

        return $next($request);
    }
}

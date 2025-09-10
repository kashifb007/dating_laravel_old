<?php

namespace App\Http\Middleware;

use App\Models\Guest;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class EnsurePublicVisitor
{
    /**
     * Usage:
     *   ->middleware('public_only')                             // defaults
     *   ->middleware('public_only:dashboard,guest.dashboard')   // custom route names
     *   ->middleware('public_only:/account,/guest/dashboard')   // or URIs
     */
    public function handle(Request $request, Closure $next, ?string $userRedirect = 'dashboard', ?string $guestRedirect = 'dashboard'): Response
    {
        // If a real user is authenticated, send them to their dashboard.
        if ($request->user()) {
            return $this->redirectTo($userRedirect);
        }

        // If a guest is "logged in" via session/cookie, send them to the guest dashboard.
        $guestId = $request->session()->get('guest_id') ?: $request->cookie('guest_id');

        if ($guestId && Str::isUuid($guestId) && Guest::whereId($guestId)->exists()) {
            // Optionally refresh session/cookie so the guest stays active.
            $request->session()->put('guest_id', $guestId);

            Cookie::queue(
                Cookie::make(
                    name: 'guest_id',
                    value: $guestId,
                    minutes: 60 * 24 * 30, // 30 days
                    path: '/',
                    domain: null,
                    secure: $request->isSecure(),
                    httpOnly: true,
                    sameSite: 'lax'
                )
            );

            return $this->redirectTo($guestRedirect);
        }

        // No auth user and no valid guest context -> allow access (public).
        return $next($request);
    }

    protected function redirectTo(?string $target): Response
    {
        if (! $target) {
            $target = '/';
        }

        return RouteFacade::has($target)
            ? redirect()->route($target)
            : redirect()->to($target);
    }
}

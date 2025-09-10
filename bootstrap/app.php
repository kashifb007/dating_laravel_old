<?php

use App\Http\Middleware\ApplyLocale;
use App\Http\Middleware\Customer;
use App\Http\Middleware\EnsureGuest;
use App\Http\Middleware\EnsurePublicVisitor;
use App\Http\Middleware\NominatimBearerToken;
use App\Http\Middleware\ResolveGuest;
use App\Http\Middleware\TrustProxies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        if (method_exists($middleware, 'trustProxies')) {
            $middleware->trustProxies(at: TrustProxies::class);
        } else {
            // Otherwise just append it
            $middleware->append(TrustProxies::class);
        }
        $middleware->appendToGroup('web', [
            ApplyLocale::class,
        ]);
        $middleware->alias([
            'static.api' => NominatimBearerToken::class,
            'as_guest'    => EnsureGuest::class,  // enforce cookie guest-only
            'maybe_guest' => ResolveGuest::class, // resolve if cookie guest or auth user
            'public_only' => EnsurePublicVisitor::class,
            'customer' => Customer::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

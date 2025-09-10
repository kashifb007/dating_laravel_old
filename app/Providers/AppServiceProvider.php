<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\MemberPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use WireElements\LivewireStrict\LivewireStrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        LivewireStrict::lockProperties(shouldLockProperties: app()->isProduction());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        //usage policy https://operations.osmfoundation.org/policies/nominatim/
        //https://osmfoundation.org/wiki/Licence/Attribution_Guidelines#Attribution_text

        Http::macro('nominatim', function () {
            return Http::baseUrl(config('services.openstreetmap.url'))
                ->withUserAgent(config('services.openstreetmap.user_agent'))
                ->withHeaders([
                    'Referer' => 'https://dreamsites.co.uk',
                    'Accept'  => 'application/json',
                ])
                ->acceptJson()
                ->timeout(10)
                ->retry(2, 500)
                ->throw();
        });

        RateLimiter::for('citysearch', function (Request $request) {
            $key = $request->bearerToken() ?: $request->ip();
            return [
                Limit::perMinute(40)->by($key),
                Limit::perSecond(1)->by($key),
            ];
        });

        Gate::policy(User::class, MemberPolicy::class);

        Blade::if('cookieguest', fn () => (bool) (session('guest_id') ?? request()->cookie('guest_id')));
        Blade::if('publicvisitor', fn () => ! auth()->check() && ! (session('guest_id') ?? request()->cookie('guest_id')));
        Blade::if('cookieOrAuth', fn () => (session('guest_id') ?? request()->cookie('guest_id')) || auth()->check());
    }
}

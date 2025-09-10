<?php

namespace App\Listeners;

use App\Models\Language;

class SetLocaleFromUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $locale = $event->user->locale ?? config('app.locale');

        $allowed = Language::where('is_active', true)
            ->pluck('locale')
            ->toArray();

        if (!in_array($locale, $allowed, true)) {
            $locale = config('app.locale');
        }

        app()->setLocale($locale);
        session(['locale' => $locale]);
    }
}

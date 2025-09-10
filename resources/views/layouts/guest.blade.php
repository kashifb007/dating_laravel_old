<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Dating App') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{--        Icons--}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon" />
        <link href="{{ asset('apple-touch-icon-180x180.png') }}" rel="apple-touch-icon" sizes="180x180" />
        <link href="{{ asset('android-chrome-512x512.png') }}" rel="icon" sizes="512x512" />
        <link href="{{ asset('android-chrome-192x192.png') }}" rel="icon" sizes="192x192" />
        <link href="{{ asset('favicon-32x32.png') }}" rel="icon" sizes="32x32" />
        <link href="{{ asset('favicon-16x16.png') }}" rel="icon" sizes="16x16" />

        @fluxAppearance
        @vite(['resources/sass/front/app.scss', 'resources/js/front/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <livewire:layout.navigation />
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-center">
                    <a href="/" wire:navigate>
                        <img src="{{ asset('images/logo-dark.png') }}" alt="{{ __('Dating App Logo') }}" class="hidden dark:block">
                        <img src="{{ asset('images/logo-light.png') }}" alt="{{ __('Dating App Logo') }}" class="dark:hidden">
                    </a>
                </div>
                {{ $slot }}
            </div>
        </div>
    @fluxScripts
    </body>

</html>

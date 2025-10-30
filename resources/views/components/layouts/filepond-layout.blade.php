<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        {{--        Icons--}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon" />
        <link href="{{ asset('apple-touch-icon-180x180.png') }}" rel="apple-touch-icon" sizes="180x180" />
        <link href="{{ asset('android-chrome-512x512.png') }}" rel="icon" sizes="512x512" />
        <link href="{{ asset('android-chrome-192x192.png') }}" rel="icon" sizes="192x192" />
        <link href="{{ asset('favicon-32x32.png') }}" rel="icon" sizes="32x32" />
        <link href="{{ asset('favicon-16x16.png') }}" rel="icon" sizes="16x16" />
        <!-- Scripts -->
        @fluxAppearance
        @vite(['resources/sass/front/app.scss', 'resources/js/front/app.js', 'resources/js/filepond-boot.js'])
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
    <livewire:layout.navigation />
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white/90 dark:bg-gray-800/90 backdrop-blur shadow
                {{ $headerClasses ?? '' }}">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @fluxScripts
    @persist('toast')
    <flux:toast />
    @endpersist
    @stack('scripts')
    </body>
</html>

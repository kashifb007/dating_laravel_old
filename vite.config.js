import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: ['resources/css/app.css', 'resources/css/filament/admin/theme.css', 'resources/sass/app.scss', 'resources/js/app.js'],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**/*.php',
                'app/Filament/**/*.php',
                'resources/views/**/*.php',
                'resources/views/filament/**/*.php',
            ],
        }),
    ],
    server: {
        host: 'localhost',
        hmr: {
            host: 'localhost'
        }
    },
});

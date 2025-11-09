import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/home.css',
                'resources/css/layout.css',
                'resources/css/product.css',
                'resources/css/all.css',
                'resources/css/register.css',
                'resources/css/dashboard.css'
            ],
            refresh: true,
        }),
    ],
});

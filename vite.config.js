import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.min.css',
            'resources/css/bootstrap.min.css',
            'resources/css/icons.min.css',
            'resources/js/app.js',],
            refresh: true,
        }),
    ],
});

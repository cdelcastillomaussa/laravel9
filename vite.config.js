import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: 
            [
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/sass/app.scss'
            ],
            //for bootstrap [
            //     'resources/sass/app.scss',
            //     'resources/js/app.js'
            // ],
            refresh: true,
        }),
    ],
});
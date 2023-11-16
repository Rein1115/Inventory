import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/home/home.js',
                'resources/js/product/product-list.js',
                'resources/js/product/product-details.js',
                'resources/js/order/order-list.js',
                'resources/css/order/printSummary.css'
            ],
            refresh: true,
        }),
    ],
});

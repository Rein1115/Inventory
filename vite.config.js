import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                // DASHBOARD
                'resources/js/apps/dashboard/dashboard.js',


                // SUPPLIER
                 'resources/js/apps/supplier/supplier-list.js',

                //  BRAND
                'resources/js/apps/brand/brand-list.js',

                // PRODUCT 
                'resources/js/apps/product/product-list.js',
                'resources/js/apps/product/product-history.js',
                'resources/js/apps/product/product-details.js',

                // ORDER
                'resources/js/apps/order/order-list.js',
                'resources/js/apps/order/order-details.js',
                'resources/js/apps/order/order-freebies.js',
                


                // RECEIPT
                'resources/js/apps/invoicereceipt/invoicereceipt.js',

                // PAYMENT 
                'resources/js/apps/payment/payment-list.js',
                'resources/js/apps/payment/payment-details.js',
                'resources/js/apps/payment/payment-history-list.js',
                'resources/js/apps/payment/payment-history-details.js',


                // SUMMARY 
                'resources/js/apps/summary/summary-list.js',


                // USER 
                'resources/js/apps/user/user-list.js',


                // EXPENSES
                'resources/js/apps/expense/expenses-list.js',

                // PROFILE
                'resources/js/apps/profile/profile-details.js',
                'public/plugins/common/common.min.js',
                'public/js/custom.min.js',
                'public/js/settings.js',
                'public/js/gleek.js',
                'public/js/gleek.js',
                'public/js/styleSwitcher.js',
                'public/apps/tools/customizefunction.js',
                'public/css/style.css',
                'public/logonibayicon.png'
               

            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});

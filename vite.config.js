import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import { globSync } from 'glob'

export default defineConfig({
    plugins: [
        // laravel({
        //     input: [
        //         'resources/css/app.css',
        //         'resources/js/app.js',
        //     ],
        //     refresh: true,
        // }),
        laravel({
            input: [
                ...globSync('resources/{css,js,components,views}/**/*.{css,js,vue}'),
                ...globSync('vendor/chrisreedio/inductor/resources/js/**/*.{js,vue,ts}'),
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
})

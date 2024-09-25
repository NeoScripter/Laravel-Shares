import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/ts/app.ts'
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: 'postcss.config.js',
    },
    build: {
        minify: true,  // Minifies the CSS and JS in production
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return 'vendor';
                    }
                }
            }
        }
    }
});

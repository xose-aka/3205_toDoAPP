import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        react(),
        laravel({
            input: ['resources/js/app.tsx'], // Specify your entry points
            refresh: true, // For automatic refresh during development
        })
    ],
    // resolve: {
    //     alias: {
    //         '@': '/resources/js',
    //     },
    // },
    // build: {
    //     outDir: 'public/build', // The build output directory
    //     manifest: true,         // Ensure manifest.json is generated
    //     rollupOptions: {
    //         input: 'resources/js/app.tsx',  // Your entry file
    //     },
    // },
    server: {
        proxy: {
            '/app': 'http://localhost',
        },
    },
});

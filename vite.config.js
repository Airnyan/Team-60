import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/chatbot.js', 'resources/css/basket.css', 'resources/css/styles.css','resources/js/accessibility.js','resources/css/profile.css','resources/css/login-style.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        cors:true,
        hmr: {
            host: "ominous-bassoon-q7p5v9g7w79xf66q5-5173.app.github.dev",
            clientPort: 443,
            protocol:'wss',
        },
        
    }

});
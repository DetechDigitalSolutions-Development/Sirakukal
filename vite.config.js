import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
plugins: [
laravel({
input: [
'resources/css/app.css',
'resources/js/app.js',
'resources/css/filament/admin/theme.css' // if you're using this
],
refresh: true,
}),
],
build: {
manifest: true,
outDir: 'public/build',
},
});
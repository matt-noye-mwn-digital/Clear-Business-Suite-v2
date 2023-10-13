const mix = require('laravel-mix');

mix.copy('resources/assets/fonts', 'public/fonts');
mix.copy('vendor/tinymce/tinymce', 'public/js/tinymce');

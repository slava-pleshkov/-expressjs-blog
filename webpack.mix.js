let mix = require('laravel-mix');

mix.js('resources/js/site.js', 'public/js')
    .sass('resources/sass/site.scss', 'public/css');

mix.js('resources/js/auth.js', 'public/js')
    .sass('resources/sass/auth.scss', 'public/css');

mix.js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/admin.scss', 'public/css');

mix.js('resources/js/logs.js', 'public/js')
    .sass('resources/sass/logs.scss', 'public/css');

mix.js('resources/js/error.js', 'public/js')
    .sass('resources/sass/error.scss', 'public/css');
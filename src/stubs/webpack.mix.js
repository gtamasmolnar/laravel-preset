const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles(['resources/css/mycss.css'], 'public/css/all.css')
    .scripts(['resources/js/polly/polly.js'], 'public/js/polly.js')
    .scripts(['resources/js/crud.js'], 'public/js/crud.js')
    .scripts([

    ], 'public/js/all.js')
    .version();

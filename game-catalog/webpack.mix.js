const mix = require('laravel-mix');

mix .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .scripts('resources/js/script/*', 'public/js/all.js')

    // Bootstrap
    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js')
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css');

const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');

const scriptsPath = 'resources/js/page-js';
fs.readdirSync(scriptsPath).forEach(file => {
    if (path.extname(file) === '.js') {
        mix.js(`${scriptsPath}/${file}`, `public/js/${file}`);
    }
});

mix .js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .scripts('resources/js/script/*', 'public/js/all.js')

    // Bootstrap
    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js')
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css');

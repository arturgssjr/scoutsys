let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
        'resources/assets/js/app.js',
        'resources/assets/js/select2.js',
        'resources/assets/js/tooltip.js',
        'resources/assets/js/confirmation-modal.js'
    ], 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
        'public/css/app.css',
        'resources/assets/css/select2.css',
        'resources/assets/css/footer.css',
        'resources/assets/css/dashboard.css'
    ], 'public/css/app.css');

mix.styles([
        'resources/assets/css/login.css'
    ], 'public/css/login.css');
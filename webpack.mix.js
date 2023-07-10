const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'public/web/css/bootstrap.css',
    'public/web/css/style.css',
    'public/web/css/responsive.css'
], 'public/css/web-all.css');

mix.scripts([
    // 'public/web/js/jquery.js',
    'public/web/js/popper.min.js',
    'public/web/js/bootstrap.min.js',
    'public/web/js/appear.js',
    'public/web/js/isotope.js',
    'public/web/js/mixitup.js',
    'public/web/js/script.js'
], 'public/js/web-all.js');
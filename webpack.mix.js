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

mix
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/fonts/apple', 'public/fonts/apple')
    .styles([
        'public/fonts/apple/font.css',
        'public/css/app.css'
    ], 'public/css/all.css')
    .scripts([
        'resources/assets/js/guardian/modernizr-2.6.2.min.js',
        'public/js/app.js'
    ], 'public/js/all.js');
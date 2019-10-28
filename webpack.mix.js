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
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/quill.js', 'public/js')
    .js('resources/js/swal.js', 'public/js')
    .js('resources/js/photoswipe.js', 'public/js')
    .js('resources/js/swiper.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/swal.scss', 'public/css')
    .sass('resources/sass/swiper.scss', 'public/css')
    .sass('resources/sass/photoswipe.scss', 'public/css');
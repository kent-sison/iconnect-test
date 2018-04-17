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

mix.copy('node_modules/izimodal/js/iziModal.min.js', 'public/assets/js/iziModal.min.js');
mix.copy('node_modules/izimodal/css/iziModal.min.css', 'public/assets/css/iziModal.min.css');

mix.js('./resources/assets/js/app.js', 'public/js/app.js')
   .sass('./resources/assets/sass/app.scss', 'public/css');

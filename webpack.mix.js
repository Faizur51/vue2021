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

//backebd css and js
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

//frontend css and js
mix.styles([
    'resources/sass/website/assets/css/bootstrap.min.css',
    'resources/sass/website/assets/css/font-awesome.min.css',
    'resources/sass/website/assets/css/linear-icon.css',
    'resources/sass/website/assets/css/plugins.css',
    'resources/sass/website/assets/css/default.css',
    'resources/sass/website/assets/css/style.css',
    'resources/sass/website/assets/css/responsive.css',

], 'public/css/style.css');


mix.scripts([
    'resources/sass/website/assets/js/vendor/jquery-1.12.4.min.js',
    'resources/sass/website/assets/js/popper.min.js',
    'resources/sass/website/assets/js/bootstrap.min.js',
    'resources/sass/website/assets/js/plugins.js',
    'resources/sass/website/assets/js/ajax-mail.js',
    'resources/sass/website/assets/js/main.js',

], 'public/js/style.js');


mix.js('resources/js/app2.js', 'public/js/app2.js')


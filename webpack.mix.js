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
mix.js('resources/assets/app.js', 'public/');
mix.sass('resources/assets/app.scss', 'public/')

mix.js('resources/assets/admin/js/question.js', 'public/admin/js/');
mix.sass('resources/assets/user/css/main.sass', 'public/user/css/');
mix.sass('resources/assets/admin/css/main.sass', 'public/admin/css/');
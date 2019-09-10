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

mix.sass('resources/sass/geral.sass','public/css');


mix.copyDirectory('node_modules/jquery', 'public/js/jquery');

mix.copyDirectory('node_modules/font-awesome', 'public/css/font-awesome');

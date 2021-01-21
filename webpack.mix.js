const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').vue()

//ADMIN TEMPLATE FILES JS
mix.js('resources/js/admin-template/scripts.js', 'public/js/admin-template/scripts.js')
mix.js('resources/js/admin-template/chart-area-demo.js', 'public/js/admin-template/chart-area-demo.js')
mix.js('resources/js/admin-template/chart-bar-demo.js', 'public/js/admin-template/chart-bar-demo.js')
mix.js('resources/js/admin-template/datatables-demo.js', 'public/js/admin-template/datatables-demo.js')
//ADMIN TEMPLATE FILES CSS
mix.styles('resources/css/admin-template/styles.css', 'public/css/admin-template/styles.css')
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

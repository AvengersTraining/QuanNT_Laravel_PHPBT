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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/client/index.scss', 'public/css/client/index.css')
    .js('resources/js/adminlte.js', 'public/js/admin')
    .js('resources/js/admin/pages/users/index.js', 'public/js/admin/pages/users/index.js')
    .js('resources/js/admin/pages/posts/index.js', 'public/js/admin/pages/posts/index.js')
    .js('resources/js/client/blockadblock.js', 'public/js/client')
    .js('resources/js/client/navigation.js', 'public/js/client')
    .js('resources/js/client/run-adcode.js', 'public/js/client')
    .sass('resources/sass/adminlte.scss', 'public/css/admin')
    .copy('resources/images/admin', 'public/images/admin')
    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/images/client', 'public/images/client');

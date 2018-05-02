let mix = require('laravel-mix')

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

mix.js('resources/assets/js/admin/app.js', 'public/js/admin')
    .sass('resources/assets/sass/admin/app.scss', 'public/css/admin')

mix.js('resources/assets/js/site/app.js', 'public/js/site')
    .js('resources/assets/js/site/partials.js', 'public/js/site/pages')
    .js('resources/assets/js/site/home.js', 'public/js/site/pages')
    .js('resources/assets/js/site/shop.js', 'public/js/site/pages')
    .sass('resources/assets/sass/site/app.scss', 'public/css/site')
    .sass('resources/assets/sass/site/pages/home.scss', 'public/css/site/pages')

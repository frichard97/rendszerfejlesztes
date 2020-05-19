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
   .js('resources/js/ddm.js', 'public/js')
   .js('resources/js/toggle_action_form.js', 'public/js')
   .js('resources/js/whitelist.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/offer_view.scss', 'public/css')
   .sass('resources/sass/offers_view.scss', 'public/css')
   .sass('resources/sass/products_view.scss', 'public/css')
   .sass('resources/sass/categories_view.scss', 'public/css')
   .sass('resources/sass/users_view.scss', 'public/css')
   .sass('resources/sass/product_view.scss', 'public/css')
   .sass('resources/sass/profile_view.scss','public/css')
    .sass('resources/sass/user_view.scss','public/css')
   .js('resources/js/product_view.js','public/js')
   .js('resources/js/make_offer.js','public/js')
   .js('resources/js/products_view.js','public/js')
   .js('resources/js/categories_view.js','public/js')
    .js('resources/js/licit.js','public/js')
    .js('resources/js/notification.js','public/js');

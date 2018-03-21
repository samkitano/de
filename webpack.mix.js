let mix = require('laravel-mix');
var tailwindcss = require('tailwindcss');
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
  .sass('resources/assets/sass/app.sass', 'public/css')
  .sass('resources/assets/sass/admin.sass', 'public/css')
  .sass('resources/assets/sass/auth.sass', 'public/css')

  .options({
    postCss: require('./postcss.config').plugins,
    processCssUrls: false
  })
;

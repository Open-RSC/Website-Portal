const mix = require('laravel-mix');

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

mix.setResourceRoot("../");

mix.js('resources/js/app.js', 'public/js');

mix.combine([
    'resources/js/jquery.js',
    'resources/js/popper.js',
    'resources/js/bootstrap.js',
    'resources/js/app.js',
],'public/js/app.js').version();

mix.postCss('resources/css/tailwind.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])

mix.sass('resources/sass/all.scss', 'public/css').version();

/*if (mix.inProduction()) {
    mix.version();
}*/

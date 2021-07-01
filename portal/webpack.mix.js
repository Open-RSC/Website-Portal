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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.scripts([
    'resources/assets/js/jquery.js',
    'resources/assets/js/popper.js',
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/app.js',
],'public/js/app.js').version();

mix.sass('resources/sass/app.scss', 'public/css').version();

/*if (mix.inProduction()) {
    mix.version();
}*/

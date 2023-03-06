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

mix.js([
    'resources/js/jquery.js',
    'resources/js/popper.js',
    'resources/js/bootstrap.js',
    'resources/js/app.js',
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
    'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    'resources/js/jquery.dataTables.yadcf.js',
], 'public/js/app.js').styles([
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.css'
], 'public/css/app.css').version();

mix.postCss('resources/css/tailwind.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.sass('resources/sass/all.scss', 'public/css').version();

mix.copyDirectory('resources/assets/fonts', 'public/fonts');

if (mix.inProduction()) {
    mix.version();
}

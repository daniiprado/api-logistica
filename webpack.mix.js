let mix = require('laravel-mix');
let exec = require('child_process').exec;

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

mix.webpackConfig({
    module: {
        rules: [
            {
                // Matches all PHP or JSON files in `resources/lang` directory.
                test: /resources[\\\/]lang.+\.(php|json)$/,
                loader: 'laravel-localization-loader',
            }
        ]
    }
});

mix.js('resources/assets/js/app.js', 'public/js')
    .scripts([
        'resources/assets/js/framework/base/util.js',
        'resources/assets/js/framework/components/general/header.js',
        'resources/assets/js/framework/components/general/menu.js',
        'resources/assets/js/framework/components/general/dropdown.js',
        'resources/assets/js/framework/components/general/offcanvas.js',
        'resources/assets/js/framework/components/general/portlet.js',
        'resources/assets/js/framework/components/general/toggle.js',
        'resources/assets/js/framework/components/general/quicksearch.js',
        'resources/assets/js/framework/components/general/scroll-top.j',
    ], 'public/js/scripts.bundle.js')
    .sass('resources/assets/sass/vendors.scss', 'public/css/vendors.bundle.css')
    .sass('resources/assets/sass/app.scss', 'public/css/style.bundle.css');

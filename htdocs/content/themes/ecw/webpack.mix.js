let mix = require('laravel-mix');
require('mix-tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath('dist');
mix.browserSync({
	proxy: 'https://local.test'
});

mix.sass('assets/sass/style.scss', 'dist/css/style.css')
	// .sass('assets/sass/woocommerce.scss', 'dist/css/woocommerce.css')
	.sass('assets/sass/editor-style.scss', 'dist/css/editor-style.css')
	.tailwind();
mix.js('assets/js/theme.js', 'dist/js/theme.min.js');



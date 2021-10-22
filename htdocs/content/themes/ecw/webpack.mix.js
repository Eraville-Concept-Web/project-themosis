let mix = require('laravel-mix');
// require('mix-tailwindcss');
const tailwindcss = require('tailwindcss');
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
    proxy: {
        target: "https://site.test",
    }
});

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'dist/webfonts');
mix.sass('assets/sass/style.scss', 'dist/css/style.css') .options({
    postCss: [ tailwindcss('./tailwind.config.js') ],
}).webpackConfig(require('./webpack.config'));
    // .tailwind();
mix.js('assets/js/theme.js', 'dist/js/theme.min.js').vue();

if (mix.inProduction()) {
    mix.version();
}

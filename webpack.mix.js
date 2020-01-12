const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@': __dirname + '/resources',
            '@sass': __dirname + '/resources/sass/web',
            'images': __dirname + '/resources/images',
            '@images': __dirname + '/resources/images',
            '@screens': __dirname + '/resources/js/screens',
            '@components': __dirname + '/resources/js/components',
            '@node_modules': __dirname + '/node_modules/',
        }
    },
    module: {
        rules: [
            {
                test: /\.(webm|mp4)$/,
                loader: 'file-loader',
            },
        ],
    },
    devtool: 'cheap-module-eval-sourcemap',
    // devtool: 'cheap-eval-source-map',
}).options({
    hmrOptions: {
        host: 'sectattoo.test',
        port: '3030',
    },
});

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
    .sass('resources/sass/web/app.sass', 'public/css')
    .options({
        globalVueStyles: 'resources/sass/web/_vars.sass',
    })
    .disableNotifications();
    // .sourceMaps();

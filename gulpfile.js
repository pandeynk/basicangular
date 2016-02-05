var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css/bootstrap.css')
        .scripts([
            'bower_components/jquery/dist/jquery.js',
            'bower_components/angular/angular.min.js',
            'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
            'bower_components/bootstrap-star-rating/js/star-rating.js',
            'bower_components/AdminLTE/dist/js/app.min.js',
            'resources/assets/js/app.js'
        ], 'public/js/app.js', './')
        .styles(['resources/assets/css/bootstrap.css',
            './bower_components/font-awesome/css/font-awesome.css',
            './bower_components/bootstrap-star-rating/css/star-rating.css',
            './bower_components/AdminLTE/dist/css/AdminLTE.min.css',
            './bower_components/AdminLTE/dist/css/skins/skin-blue.min.css',
            'resources/assets/css/app.css'
        ], 'public/css/app.css', './')
        .copy([
            'bower_components/bootstrap-sass/assets/fonts/bootstrap',
            'bower_components/font-awesome/fonts'
        ], 'public/fonts/')
        .copy([
            'bower_components/bootstrap-sass/assets/fonts/bootstrap',
            'bower_components/font-awesome/fonts'
        ], 'public/build/fonts/')
        .copy([
            'bower_components/bootstrap-sass/assets/fonts/bootstrap',
            'bower_components/font-awesome/fonts'
        ], 'public/build/fonts/bootstrap')
        .copy('resources/assets/images', 'public/images')
        .copy('resources/assets/images', 'public/build/images')
        .version(['public/css/app.css', 'public/js/app.js', 'public/images']);
});

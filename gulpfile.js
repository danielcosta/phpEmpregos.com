var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('a.less');

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'app.js'

    ], 'public/js/a.js');

    mix.version([
        "css/a.css",
        "js/a.js"
    ]);
});

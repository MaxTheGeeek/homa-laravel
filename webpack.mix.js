const mix = require('laravel-mix');




mix.styles([
    'resources/css/bootstrap.min.css' ,
    'resources/css/styles.css',
    'resources/css/style.css',
], 'public/css/admin.css');

mix.scripts([
    'resources/js/jquery-3.2.1.slim.min.js',
    'resources/js/popper.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/dropdown.js',
], 'public/js/admin.js');



mix.styles([
    'resources/css/bootstrap.css' ,
    'resources/css/styles.css',
    'resources/css/style.css',
], 'public/css/app.css');

mix.scripts([
    'resources/js/popper.min.js',
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/scripts.js',
    'resources/js/main.js',

], 'public/js/app.js');

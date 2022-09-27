const mix = require('laravel-mix');


mix.js('resources/js/app.js','public/js/app.js')
    .styles("resources/css/app.css","public/css/app.css")
    .vue()

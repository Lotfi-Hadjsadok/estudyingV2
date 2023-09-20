let mix = require('laravel-mix');
require('mix-tailwindcss');

mix.sass('src/css/style.scss','assets/css')
.tailwind('./tailwind.config.js');
const mix = require('laravel-mix');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.js('source/_assets/js/main.js', 'js')
    .css('source/_assets/css/main.css', 'css/main.css', [
        require('postcss-import'),
        require('tailwindcss/nesting'),
        require('tailwindcss'),
    ])
    .options({processCssUrls: false})
    .sourceMaps()
    .version();

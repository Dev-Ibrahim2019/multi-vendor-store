// webpack.mix.js

let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/cart.js", "public/js")
    .postCss("resources/css/app.css", "public/css");

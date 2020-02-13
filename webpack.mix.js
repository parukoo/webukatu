const mix = require('laravel-mix');
require('laravel-mix-polyfill');
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

mix.webpackConfig({
  module: {
      rules: [{
          // ローダーの処理対象ファイル
          test: /\.scss/,
          enforce: "pre",
          loader: 'import-glob-loader'
      }]
  }
})
.js('resources/js/app.js', 'public/js')
.sass('resources/sass/style.scss', 'public/css')
.sourceMaps()
.polyfill({
  enabled: true,
  useBuiltIns: "usage",
  targets: {"firefox": "50", "ie": 11}
});

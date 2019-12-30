const mix = require('laravel-mix');
const cssImport = require('postcss-import');
const cssNesting = require('postcss-nesting');
const tailwindcss = require('tailwindcss');

mix
  .js('assets/js/src/main.js', 'assets/js/')
  .postCss('assets/css/src/main.css', 'assets/css/main.css')
  .options({
    postCss: [
      cssImport(),
      cssNesting(),
      tailwindcss('tailwind.config.js'),
      // ...mix.inProduction() ? [
      //   purgecss({
      //     content: ['./*.php', './resources/js/**/*.vue'],
      //     defaultExtractor: content => content.match(/[\w-/:.]+(?<!:)/g) || []
      //   }),
      // ] : [],
    ],
  })
  .setPublicPath('assets');

// TODO: Make surce to apply compression in production

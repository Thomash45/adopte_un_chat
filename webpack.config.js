var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('js/bootstrap', './assets/js/bootstrap.bundle.min.js')
    .addEntry('js/jquery', './assets/js/jquery-2.0.0.min.js')
    .addEntry('js/script', './assets/js/script.js')
    //.addStyleEntry('css/bootstrap', './assets/css/bootstrap-custom.scss')
    //.addStyleEntry('css/responsive', './assets/css/responsive.scss')
    //.addStyleEntry('css/uikit', './assets/css/uikit.scss')
    //.addStyleEntry('fonts/fontawesome', './assets/fonts/fontawesome/scss/fontawesome.scss')
    //.addStyleEntry('fonts/fa-brands', './assets/fonts/fontawesome/scss/fa-brands.scss')
    //.addStyleEntry('fonts/fa-regular', './assets/fonts/fontawesome/scss/fa-regular.scss')
    //.addStyleEntry('fonts/fa-solid', './assets/fonts/fontawesome/scss/fa-solid.scss')
    .addStyleEntry('css/main', './assets/css/main.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();

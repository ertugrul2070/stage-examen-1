const mix = require('laravel-mix');

const src = './sources';
const dest = './public';

const paths = {
    styles    : {
        source : '/scss',
        dest   : '/css'
    },
    scripts   : {
        source : '/scripts',
        dest   : '/js'
    },
    images    : {
        source : '/assets/images',
        dest   : '/css/img'
    },
    svg       : {
        source : '/assets/svg',
        dest   : '/css/svg'
    },
    fonts     : {
        source : '/assets/fonts',
        dest   : '/css/fonts'
    },
    views     : {
        source : '/views',
        dest   : '/views'
    }
};


mix.copyDirectory(
    src + paths.images.source,
    dest + paths.images.dest
);

mix.copyDirectory(
    src + paths.svg.source,
    dest + paths.svg.dest
);

mix.copyDirectory(
    src + paths.fonts.source,
    dest + paths.fonts.dest
);

// scripts
mix.js(
    src + paths.scripts.source + '/app.js',
    dest + paths.scripts.dest
);

// styles
mix.sass(
    src + paths.styles.source + '/app.scss',
    dest + paths.styles.dest
).options({
    autoprefixer   : false,
    processCssUrls : false,
});

if(!mix.inProduction()) {
    mix.browserSync({
        proxy : 'http://localhost:8000'
    });

    mix.sourceMaps();
}

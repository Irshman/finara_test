'use strict';

const {src, dest} = require('gulp');
const gulp= require('gulp');

const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const plumber = require('gulp-plumber');

// Пути к файлам
const paths = {
    scripts: [
        './assets/js/helpers/*.js',
        './assets/js/parts/*.js'
    ],
    styles: [
        'assets/scss/**/*.scss'
    ],
};

// Сборка JS
function scripts()
{
    return src(paths.scripts)
        .pipe(sourcemaps.init())
        .pipe(concat('script.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/js/'));
}

// Сборка CSS
function styles()
{
    return src(paths.styles)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass.sync({ quietDeps: true, silent: true }).on('error', sass.logError))
        .pipe(autoprefixer({ cascade: false }))
        .pipe(cleanCSS())
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('.'));
}

// Наблюдение за изменениями
function watchFiles()
{
    gulp.watch(paths.scripts, scripts);
    gulp.watch(paths.styles, styles);
}

// Экспорт задач
exports.scripts = scripts;
exports.styles = styles;
exports.watch = watchFiles;
// exports.serve = serve;
exports.default = gulp.series(gulp.parallel(scripts, styles), watchFiles);


// Include gulp
var gulp = require('gulp');

// Include Our Plugins
// var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');
var rename = require('gulp-rename');

const { src, dest } = require('gulp');
const { series } = require('gulp');

// Lint Task
// gulp.task('lint', function() {
//     return gulp.src('js/*.js')
//         .pipe(jshint())
//         .pipe(jshint.reporter('default'));
// });

// Styles
function styles() {
    return src('resources/landing/css/styles.css')
        .pipe(uglifycss())
        .pipe(rename('main.min.css'))
        .pipe(dest('public/assets/landing/css/'));
}

function commonStyles() {
    return src(['node_modules/bootstrap/dist/css/bootstrap.css', 'node_modules/bootstrap-icons/font/bootstrap-icons.css'])
        .pipe(uglifycss())
        .pipe(rename('common.min.css'))
        .pipe(dest('public/assets/landing/css/'));
}

function copyBootstrapFonts() {
    return src('node_modules/bootstrap-icons/font/fonts/*')
        .pipe(dest('public/assets/landing/css/fonts/'));
}

function adminStyles() {
    return src('resources/landing/css/styles.css')
        .pipe(uglifycss())
        .pipe(rename('main.min.css'))
        .pipe(dest('public/assets/landing/css/'));
}

// Scripts
function scripts() {
    return src('resources/landing/js/scripts.js')
        .pipe(uglify())
        .pipe(rename('main.min.js'))
        .pipe(dest('public/assets/landing/js/'));
}

function commonScripts() {
    return src(['node_modules/jquery/dist/jquery.js', 'node_modules/bootstrap/dist/js/bootstrap.js', 'node_modules/@popperjs/core/dist/umd/popper.js'])
        .pipe(uglify())
        .pipe(rename('common.min.js'))
        .pipe(dest('public/assets/landing/js/'));
}

function adminScripts() {
    return src('resources/landing/js/scripts.js')
        .pipe(uglify())
        .pipe(rename('main.min.js'))
        .pipe(dest('public/assets/landing/js/'));
}

// Watch Files For Changes
// gulp.task('watch', function() {
//     gulp.watch('js/*.js', ['lint', 'scripts']);
// });

// Default Task
exports.build_landing = series(commonStyles, copyBootstrapFonts, styles, commonScripts, scripts);
exports.build_admin = series(adminStyles, adminScripts);

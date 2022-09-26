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
        .pipe(dest('public/assets/css/'));
}

function copyBootstrapFonts() {
    return src('node_modules/bootstrap-icons/font/fonts/*')
        .pipe(dest('public/assets/css/fonts/'));
}

function adminStyles() {
    return src([
        'resources/admin/assets/vendor/css/core.css',
        'resources/admin/assets/vendor/css/theme-default.css',
        'resources/admin/assets/css/demo.css',

        // 'resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
        // 'resources/admin/assets/vendor/libs/apex-charts/apex-charts.css',
    ])
        .pipe(concat('main.css'))
        .pipe(uglifycss())
        .pipe(rename('main.min.css'))
        .pipe(dest('public/assets/admin/css/'));
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
        .pipe(dest('public/assets/js/'));
}

function adminScripts() {
    return src([
        'resources/admin/assets/vendor/js/menu.js',
        'resources/admin/assets/js/main.js',

        // 'resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
        // 'resources/admin/assets/vendor/libs/apex-charts/apexcharts.js',
    ])
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(rename('main.min.js'))
        .pipe(dest('public/assets/admin/js/'));
}

// Watch Files For Changes
// gulp.task('watch', function() {
//     gulp.watch('js/*.js', ['lint', 'scripts']);
// });

// Default Task
exports.build_common = series(commonStyles, copyBootstrapFonts, commonScripts);
exports.build_landing = series(styles, scripts);
exports.build_admin = series(adminStyles, adminScripts);

var gulp = require("gulp");
var uglify = require("gulp-uglify");
var jshint = require('gulp-jshint');
var browserify = require('browserify');
var source = require("vinyl-source-stream");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var phpunit = require("gulp-phpunit");
var phpcs = require('gulp-phpcs');

gulp.task('phpcs', function () {
    return gulp.src(['src/**/*.php'])
        // Validate files using PHP Code Sniffer
        .pipe(phpcs({
            bin: 'vendor/bin/phpcs',
            standard: 'CakePHP',
            warningSeverity: 0
        }))
        // Log all problems that was found
        .pipe(phpcs.reporter('log'));
});

gulp.task("phpunit",function(){
    gulp.src('tests/TestCase/')
        .pipe(phpunit())
        .on('error', notify.onError({
            title: "Gulp PHP Unit",
            message: "Error(s) occurred during testing..."
        }))
        .pipe(notify({
            title: "Gulp PHP Unit",
            message: 'Successfully run test!'
        }));
});

gulp.task('browserify', function() {
    return browserify('src/Scripts/main.js')
        .bundle()
        .pipe(source('main.js'))
        .pipe(gulp.dest('webroot/js'));
});

gulp.task("uglify", ['browserify'], function() {
    return gulp.src("webroot/js/main.js")
        .pipe(plumber({ errorHandler: notify.onError('<%= error.message %>') }))
        .pipe(uglify())
        .pipe(gulp.dest("webroot/js/min"))
        .pipe(notify({message: "Compressed file: <%= file.relative %>"}));
});

gulp.task('lint', function() {
    return gulp.src('src/Scripts/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

gulp.task("default", function() {
    gulp.watch(["src/Scripts/**/*.js"],['lint', 'uglify']);
    gulp.watch(['src/**/*.php', 'tests/TestCase/**/*.php'], ['phpunit']);
    gulp.watch(['src/**/*.php'], ['phpcs']);
});


//gulp.task('default', ['browserify', 'uglify']);


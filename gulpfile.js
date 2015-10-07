var gulp = require("gulp");
var rename = require("gulp-rename");
var uglify = require("gulp-uglify");
var browserify = require('gulp-browserify');
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
            message: 'Successfully ran test!'
        }));
});

gulp.task('browserify', function() {
    // Single entry point to browserify 
    return gulp.src('src/Scripts/main.js')
        .pipe(plumber( { errorHandler: notify.onError('<%= error.message %>') } ))
        .pipe(browserify({
          insertGlobals : true
        }))
        .pipe(gulp.dest('webroot/js'))
});

gulp.task("uglify", ['browserify'], function() {
        return gulp.src("webroot/js/main.js")
            .pipe(plumber({ errorHandler: notify.onError('<%= error.message %>') }))
            .pipe(uglify())
            .pipe(gulp.dest("webroot/js/min"))
            .pipe(notify({message: "Compressed file: <%= file.relative %>"}));
});

gulp.task("default", function() {
    gulp.watch(["src/Scripts/**/*.js"],['uglify']);
    gulp.watch(['src/**/*.php', 'tests/TestCase/**/*.php'], ['phpunit']);
    gulp.watch(['src/**/*.php'], ['phpcs']);
});


//gulp.task('default', ['browserify', 'uglify']);


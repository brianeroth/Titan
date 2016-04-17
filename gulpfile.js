var gulp       = require('gulp'),
    svgmin     = require('gulp-svgmin'),
    sass       = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps');

var themeDir = 'wp-content/themes/titan/';

gulp.task('default', ['styles'], function() {
    gulp.src( themeDir + 'svg/*.svg' )
        .pipe(svgmin())
        .pipe(gulp.dest( themeDir + '/svg/build'));

    gulp.watch( themeDir + 'css/*.scss' , ['styles']);
});

gulp.task('styles', function(){
    gulp.src( themeDir + 'css/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            errLogToConsole: true
        }).on('error', sass.logError))
        .pipe( sourcemaps.write('.', {
            includeContent: false, sourceRoot: 'src'
        }) )
        .pipe(gulp.dest( themeDir + 'css/build/' ));
});
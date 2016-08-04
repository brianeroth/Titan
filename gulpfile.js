var gulp       = require('gulp'),
    svgmin     = require('gulp-svgmin'),
    sass       = require('gulp-sass'),
    concat     = require('gulp-concat'),
    uglify     = require('gulp-uglify');
    sourcemaps = require('gulp-sourcemaps');

var themeDir = 'wp-content/themes/titan/';

gulp.task('default', ['styles', 'scripts'], function() {
    gulp.src( themeDir + 'svg/*.svg' )
        .pipe(svgmin())
        .pipe(gulp.dest( themeDir + '/svg/build'));

    gulp.watch( themeDir + 'css/*.scss' , ['styles']);
    gulp.watch( themeDir + 'js/*.js' , ['scripts']);
});

gulp.task('styles', function(){
    gulp.src( themeDir + 'css/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed',
            errLogToConsole: true
        }).on('error', sass.logError))
        .pipe( sourcemaps.write('.', {
            includeContent: false, sourceRoot: 'src'
        }) )
        .pipe(gulp.dest( themeDir + 'css/build/' ));
});

gulp.task('scripts', function() {
  gulp.src( themeDir + 'js/*.js' )
    .pipe( concat('production.min.js') )
    .pipe( uglify() )
    .pipe(gulp.dest( themeDir + 'js/build/' ))
});
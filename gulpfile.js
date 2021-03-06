var gulp = require('gulp');
var minifyCss = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('minify', function () {

	return gulp.src('public/css/*.css')
		.pipe(minifyCss({
			keepBreaks: true
		}))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('public/css/min'));

	return gulp.src('public/js/*.js')
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('public/js/min'));
});

gulp.task('default', ['minify'], function () {});

var gulp = require('gulp');
var browserSync = require('browser-sync').create();

gulp.task('browserSync', function() {
	browserSync.init({
		server: {
			baseDir: 'app'
		},
		notify: false
	})
});

gulp.task('watch', ['browserSync'], function() {
	gulp.watch('app/**/*.html', browserSync.reload);
	gulp.watch('app/css/*.css', browserSync.reload);
	gulp.watch('app/js/**/*.js', browserSync.reload);
	gulp.watch('app/php/*.php', browserSync.reload);
});

gulp.task('default', ['watch']);

'use strict';

import gulp from 'gulp';

gulp.task('fonts', () => {
  return gulp
    .src('src/fonts/**/*')
    .pipe(gulp.dest('assets/fonts'));
});

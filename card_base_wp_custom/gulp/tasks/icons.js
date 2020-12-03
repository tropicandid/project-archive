'use strict';

import gulp from 'gulp';

gulp.task('icons', () => {
  return gulp
    .src('src/icons/**/*')
    .pipe(gulp.dest('assets/icons'));
});

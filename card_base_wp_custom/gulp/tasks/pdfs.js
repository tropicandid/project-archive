'use strict';

import gulp from 'gulp';

gulp.task('pdfs', () => {
  return gulp
    .src('src/pdfs/**/*')
    .pipe(gulp.dest('assets/pdfs'));
});

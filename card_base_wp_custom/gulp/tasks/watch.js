'use strict';

import gulp from 'gulp';
import runSequence from 'run-sequence';

gulp.task('watch', ['build'], () => {

  let source = 'src/';
  gulp.watch(source + '/styles/**/*', ['styles']);
  gulp.watch(source + '/scripts/**/*', ['scripts']);
  gulp.watch(source + '/images/**/*', ['images']);
  gulp.watch(source + '/icons/**/*', ['icons']);
  gulp.watch(source + '/pdfs/**/*', ['pdfs']);
});

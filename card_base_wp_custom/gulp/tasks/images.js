'use strict'

import gulp from 'gulp'
import merge from 'merge2'
import imagemin from 'gulp-imagemin'
import resize from 'gulp-image-resize'
import rename from 'gulp-rename'
import newer from 'gulp-newer'

const options = [ { width: 400 }, { width: 800 }, { width: 1400 }, { width: 1400 } ]

gulp.task('images', () => {
  const streams = options.map( el => {
    return gulp.src( 'src/images/**/*' )
      .pipe( gulp.dest( 'assets/images' ) )
      .pipe( rename( file => file.basename += '-' + el.width ) )
      .pipe( newer( 'assets/images' ) )
      .pipe( resize( el ) )
      .pipe( imagemin( ) )
      .pipe( gulp.dest( 'assets/images' ) )
  });

  return merge( streams )
});

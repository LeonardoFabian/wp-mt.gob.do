// const { series } = require( 'gulp' );

// function defaultTask(cb) {
//     console.log('The default gulp task');
//   // place code for your default task here
//   // para ejecutar una función, utilizar gulp TASK_FUNCTION_NAME en la consola
//   cb();
// }

// function hello(done){
//     console.log('Hello World');
//     done();
// }

// exports.default = defaultTask;
// // exports.hello = hello;
// exports.default = series(defaultTask, hello);

import gulp from 'gulp';
import yargs from 'yargs';
//import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';

const PRODUCTION = yargs.argv.prod;
const paths = {
  styles: {
    src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
    dest: 'dist/assets/css'
  },
  scripts: {
    src: 'src/assets/js/*.js',
    dest: 'dist/assets/js'
  },
  images: {
    src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
    dest: 'dist/assets/images'
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
    dest: 'dist/assets'
  } 
};


export const clean = () => del(['dist']);

/**
* Theme styles
*/
export const styles = () => {
  return gulp.src(paths.styles.src)
  .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
  //.pipe(sass.sync().on('error', sass.logError))
  .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
  .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
  .pipe(gulp.dest(paths.styles.dest));
}

/**
* gulp images
* Copy and minified all theme images 
*/
export const images = () => {
  return gulp.src(paths.images.src)
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(gulp.dest(paths.images.dest));
}

/**
* Copy another file from src/assets
*/
export const copy = () => {
  return gulp.src(paths.other.src)
    .pipe(gulp.dest(paths.other.dest));
}

/**
* Task in detect file changes
*/
export const watch = () => {
  gulp.watch('src/assets/scss/**/*.scss', styles);
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.other.src, copy);
}

export const dev = gulp.series(clean, gulp.parallel(styles, images, copy), watch);
export const build = gulp.series(clean, gulp.parallel(styles, images, copy));

export default dev;

/**
* HELP (Console)
*
* For DEV execute script: npm run start
* For PRODUCTION execute script: npm run build
* To terminate gulp watch press: CTRL + C
*/

import gulp from 'gulp';
// import babel from 'gulp-babel';
import yargs from 'yargs';
//import less from 'gulp-less';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;
const paths = {
  styles: {
    src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
    dest: 'dist/assets/css'
  },
  scripts: {
    src: ['src/assets/js/bundle.js', 'src/assets/js/admin.js'],
    dest: 'dist/assets/js'
  },
  images: {
    src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
    dest: 'dist/assets/images'
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
    dest: 'dist/assets'
  },
  package: {
    src: ['**/*', '!.vscode', '!node_modules{,/**}', '!packaged{,/**}', '!src{,/**}', '!.babelrc', 
          '!.gitignore', '!gulpfile.js', '!gulpfile.babel.js', '!package-lock.json', '!package.json' ],
    dest: 'packaged'
  } 
};

export const serve = (done) => {
  server.init({
    proxy: "http://localhost/www/wp-mt.gob.do"
  });
  done();
}

export const reload = (done) => {
  server.reload();
  done();
}

export const clean = () => del(['dist']);

/**
* Theme styles
*/
export const styles = () => {
  return gulp.src(paths.styles.src)
  .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
  .pipe(sass.sync().on('error', sass.logError))
  .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
  .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
  .pipe(gulp.dest(paths.styles.dest))
  .pipe(server.stream());
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

export const scripts = () => {
  return gulp.src(paths.scripts.src)
    .pipe(named())
    .pipe(webpack({
      module: {
        rules: [
          {
            test: /\.js$/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            }
          }
        ]
      }, 
      output: {
        filename: '[name].js'
      },
      externals: {
        jquery: 'jQuery'
      },
      devtool: !PRODUCTION ? 'inline-source-map' : false
    }))
    .pipe(gulpif(PRODUCTION, uglify()))
    .pipe(gulp.dest(paths.scripts.dest));
}

/**
* Task in detect file changes
*/
export const watch = () => {
  //gulp.watch('src/assets/scss/**/*.scss', gulp.series(styles, reload));
  gulp.watch('src/assets/scss/**/*.scss', styles);
  gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
  gulp.watch('**/*.php', reload);
  gulp.watch(paths.images.src, gulp.series(images, reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));
}

/**
* Task to create the final theme.zip folder in /packaged/mytheme.zip
*/
export const compress = () => {
  return gulp.src(paths.package.src)
    .pipe(replace('_themename', info.name))
    .pipe(zip(`${info.name}.zip`))
    .pipe(gulp.dest(paths.package.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
export const bundle = gulp.series(build, compress);

export default dev;

/**
* HELP (Console)
*
* For DEV execute script: npm run start
* For PRODUCTION execute script: npm run build
* To terminate gulp watch press: CTRL + C
*/

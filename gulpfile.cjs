'use strict';

const gulp = require('gulp');
const stylus = require('gulp-stylus');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();

const paths = {
  styles: {
    src: 'resources/stylus/app.styl',
    watch: 'resources/stylus/**/*.styl',
    dest: 'public/css',
  },
  scripts: {
    src: [
      'resources/js/vendor/jquery.min.js',
      'resources/js/modules/*.js',
      'resources/js/app.js',
    ],
    watch: 'resources/js/**/*.js',
    dest: 'public/js',
  },
};

// ── Styles ────────────────────────────────────────────────────────────────────

function styles() {
  return gulp
    .src(paths.styles.src, { sourcemaps: true })
    .pipe(stylus())
    .pipe(gulp.dest(paths.styles.dest, { sourcemaps: '.' }))
    .pipe(browserSync.stream());
}

function stylesProd() {
  return gulp
    .src(paths.styles.src)
    .pipe(stylus({ compress: true }))
    .pipe(gulp.dest(paths.styles.dest));
}

// ── Scripts ───────────────────────────────────────────────────────────────────

function scripts() {
  return gulp
    .src(paths.scripts.src, { sourcemaps: true, allowEmpty: true })
    .pipe(concat('app.js'))
    .pipe(gulp.dest(paths.scripts.dest, { sourcemaps: '.' }))
    .pipe(browserSync.stream());
}

function scriptsProd() {
  return gulp
    .src(paths.scripts.src, { allowEmpty: true })
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest));
}

// ── Serve ─────────────────────────────────────────────────────────────────────

function serve(done) {
  browserSync.init({
    proxy: 'http://localhost:8000',
    notify: false,
    open: false,
  });
  done();
}

// ── Watch ─────────────────────────────────────────────────────────────────────

function watch() {
  gulp.watch(paths.styles.watch, styles);
  gulp.watch(paths.scripts.watch, gulp.series(scripts, browserSync.reload));
  gulp.watch('resources/views/**/*.blade.php', browserSync.reload);
}

// ── Tasks ─────────────────────────────────────────────────────────────────────

const build = gulp.series(
  gulp.parallel(stylesProd, scriptsProd)
);

const dev = gulp.series(
  gulp.parallel(styles, scripts),
  serve,
  watch
);

exports.styles = styles;
exports.scripts = scripts;
exports.serve = serve;
exports.watch = watch;
exports.build = build;
exports.default = dev;

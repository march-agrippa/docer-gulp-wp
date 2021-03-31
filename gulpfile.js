'use strict';

const gulp    = require('gulp');
const sass    = require('gulp-sass');
const glob    = require('gulp-sass-glob'); // sassのimportでワイルトカードを利用可能に
const prefix  = require('gulp-autoprefixer');
const plumber = require('gulp-plumber');
const notify  = require('gulp-notify');
// const stylelint = require('stylelint');
// const postcss = require('gulp-postcss');
// const reporter = require('postcss-reporter');
// const cssDeclarationSorter = require('css-declaration-sorter');
// const mqpacker = require('css-mqpacker');
const bs      = require('browser-sync').create();
const connect = require('gulp-connect-php');
const connectSSI = require('connect-ssi');

// gulp-sassの設定
gulp.task('sass', () => {
  return gulp.src('./dist/assets/scss/*.scss',{sourcemaps:true})
    .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
    .pipe(glob({ignorePaths: ['*node_modules*']}))
    .pipe(sass({outputStyle: 'expanded'}))
//  .pipe(postcss([mqpacker()]))
//  .pipe(postcss([cssDeclarationSorter({ order: 'smacss' })]))
    .pipe(prefix())
    .pipe(gulp.dest('./dist/assets/css/',{sourcemaps:true}))
//  .pipe(gulp.dest('./css/',{sourcemaps:'./maps'})); ディレクトリ指定すると外部ファイルになる
    .pipe(bs.stream());
});

// BrowserSyncの設定
// ブラウザ画面への通知を無効化
gulp.task('sync', (done) => {
  connect.server({
    base: "./",
//  livereload: true,
    port: 3001
  }, function () {
    bs.init({
      proxy: "localhost:3001",
      middleware: [
        connectSSI({
          baseDir: "./",
          ext: ".html"
        })
      ]
    });
  });
  done();
});

gulp.task('reload', (done) => {
  bs.reload();
  done();
});

gulp.task('watch', (done) => {
  gulp.watch('./dist/assets/scss/*.scss', gulp.task('sass'));
  gulp.watch('./dist/assets/js/**/*.js', gulp.task('reload'));
  gulp.watch('./**/*.php', gulp.task('reload'));
  done();
});

gulp.task('default', gulp.series('sass', 'sync', 'reload', 'watch'));
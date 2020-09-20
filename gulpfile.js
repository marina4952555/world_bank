"use strict";

var gulp = require("gulp");
var plumber = require("gulp-plumber");
var sourcemap = require("gulp-sourcemaps");
var sass = require("gulp-sass");
var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var csso = require("gulp-csso");
var del = require("del");
var server = require("browser-sync").create();
var rename = require("gulp-rename");

gulp.task("css", function () {
  return gulp.src("source/scss/style.scss")
    .pipe(plumber())
    .pipe(sourcemap.init())
    .pipe(sass())
    .pipe(postcss([
      autoprefixer()
    ]))
    .pipe(csso())
    .pipe(rename("style.min.css"))
    .pipe(sourcemap.write("."))
    .pipe(gulp.dest("WorldBank/css"))
    .pipe(server.stream());
});


gulp.task("clean", function () {
  return del("WorldBank");
})

gulp.task("copy", function () {
  return gulp.src([
    "source/img/**",
    "source/css/**",
    "source/*.php",
    "source/js/**",
    "source/*.ico"
  ], {
    base: "source"
  })
  .pipe(gulp.dest("WorldBank"));
})

gulp.task("server", function () {
  server.init({
    server: "WorldBank/",
    notify: false,
    open: true,
    cors: true,
    ui: false
  });

  gulp.watch("source/scss/**/*.{scss,sass}", gulp.series("css", "refresh"));
  gulp.watch("source/*.php", gulp.series("build", "refresh"));
  gulp.watch("source/js/*.js", gulp.series("build", "refresh"));
});

gulp.task("refresh", function () {
  server.reload();
  done();
})

gulp.task("build", gulp.series("clean", "copy", "css"));
gulp.task("start", gulp.series("build", "server"))
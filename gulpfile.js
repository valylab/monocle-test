const { watch, src, dest, series } = require("gulp");
const minifyJs = require("gulp-uglify");
const sass = require("gulp-sass");
const plumber = require("gulp-plumber");
const concat = require("gulp-concat");
const cleanCSS = require("gulp-clean-css");

function errorLog(error) {
    console.error.bind(error);
    this.emit("end");
}

function styles() {
    return src(["scss/*.scss"])
        .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
        .pipe(dest("dist/css/"));
}

function libStyles() {
    return src([
            "node_modules/bootstrap/dist/css/bootstrap.min.css"
        ])
        .pipe(concat("lib.min.css"))
        .pipe(cleanCSS())
        .pipe(dest("dist/css/"));
}

function libJs() {
    return src([
            "node_modules/jquery/dist/jquery.min.js",
            "node_modules/jquery-validation/dist/jquery.validate.min.js",
            "node_modules/bootstrap/dist/js/bootstrap.js"
        ])
        .pipe(plumber())
        .pipe(concat("lib.min.js"))
        .pipe(minifyJs())
        .on("error", console.error.bind(console))
        .pipe(dest("dist/js/"));
}

function watcher() {
    watch(["scss/*.scss", "scss/partials/*.scss"], styles);
}

exports.build = series(styles, libStyles, libJs);
exports.dev = series(styles, libStyles, libJs, watcher);

var gulp    = require( "gulp" );
var sass    = require( "gulp-sass" );
var postcss = require( "gulp-postcss" );

gulp.task( "styles", () => {
    return gulp.src( "assets/scss/*.scss" )
               .pipe( sass().on( "error", sass.logError ) )
               .pipe( postcss() )
               .pipe( gulp.dest( "./" ) );
} );

gulp.task( "watch", () => {
    gulp.watch( "assets/scss/*.scss", gulp.series( "styles" ) );
} );

gulp.task( "default", gulp.series( "styles" ) );

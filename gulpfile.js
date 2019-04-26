var gulp = require( "gulp" );
var sass = require( "gulp-sass" );

gulp.task( "styles", () => {
    return gulp.src( "assets/scss/*.scss" )
               .pipe( sass().on( "error", sass.logError ) )
               .pipe( gulp.dest( "./" ) );
} );

gulp.task( "default", gulp.series( "styles" ) );

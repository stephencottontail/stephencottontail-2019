var gulp    = require( "gulp" );
var sass    = require( "gulp-sass" );
var postCss = require( "gulp-postcss" );

gulp.task( "styles", () => {
    return gulp.src( "assets/scss/*.scss" )
               .pipe( sass().on( "error", sass.logError ) )
               .pipe( postCss() )
               .pipe( gulp.dest( "./" ) );
} );

gulp.task( "default", gulp.series( "styles" ) );

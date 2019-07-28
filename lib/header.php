<?php

    /**
     * There's gotta be a better way to do this...
     */
    add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
        if ( 'fontawesome' !== $handle ) {
            return $tag;
        } else {
            return str_replace( '<script', '<script defer="defer" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"', $tag );
        }
    }, 10, 3 );

    add_action( 'genesis_header', function() {
        ?>
        <div class="nav-wrapper">
            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo file_get_contents( get_stylesheet_directory() . '/images/skd-logo.svg' ); ?><span class="screen-reader-text">return home</span></a>
            <?php genesis_do_nav(); ?>
        </div>
    <?php } );

    add_action( 'genesis_header', function() {
        ?>
        <div class="sandwich-bar search-bottom-bar">
            <?php get_search_form(); ?>
        </div>
    <?php
    } );


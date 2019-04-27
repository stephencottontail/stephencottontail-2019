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
        <div class="header-wrapper">
            <div class="sandwich-bar header-top-bar">
                <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">SKD</a>
                <button id="menu-toggle" class="sandwich-button menu-toggle" aria-expanded="false" aria-pressed="false"><i class="fas fa-bars"></i><span class="screen-reader-text">Open Menu</span></button>
            </div>
            <?php genesis_do_nav(); ?>
        </div>
    <?php } );

    add_action( 'genesis_header', function() {
        ?>
        <div class="sandwich-bar search-bottom-bar">
            <button id="search-toggle" class="sandwich-button search-toggle" aria-expanded="false" aria-pressed="false"><i class="fas fa-search"></i><span class="screen-reader-text">Open Search</span></button>
            <?php get_search_form(); ?>
        </div>
    <?php
    } );


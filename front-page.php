<?php

    add_action( 'genesis_before_content', function() {
        echo file_get_contents( get_stylesheet_directory() . '/images/skd-logo.svg' );
    } );

    add_action( 'genesis_loop', function() {
        $front_query = array(
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => 5
        );

        remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
        remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
        remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
        remove_action( 'genesis_entry_footer', 'genesis_entry_header_markup_close', 15 );
        remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

        echo '<div class="front-page-loop">', genesis_custom_loop( $front_query ), '</div>';

        genesis_reset_loops();
    } );

    genesis();

<?php

    add_action( 'genesis_entry_header', function() {
        if ( ! is_single() ) {
            return;
        }

        $img = genesis_get_image( array(
            'format'  => 'html',
            'size'    => 'large',
            'context' => 'archive',
            'attr'    => array( 'class' => 'aligncenter' )
        ) );

        if ( ! empty( $img ) ) {
            genesis_markup( array(
                'open'    => '<div %s>',
                'close'   => '</div>',
                'content' => wp_make_content_images_responsive( $img ),
                'context' => 'post-thumbnail',
            ) );
        }
    } );

    add_action( 'genesis_post_content', 'sc2019_do_post_image' );
    add_shortcode( 'post_edit_with_title', 'sc2019_post_edit_with_title_shortcode' );
    function sc2019_post_edit_with_title_shortcode( $atts ) {
        ob_start();
        edit_post_link( 'Edit <span class="screen-reader-text">' . get_the_title() . '</span>' );
        $edit = ob_get_clean();

        return $edit;
    }

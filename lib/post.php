<?php

    add_shortcode( 'post_edit_with_title', 'sc2019_post_edit_with_title_shortcode' );
    function sc2019_post_edit_with_title_shortcode( $atts ) {
        ob_start();
        edit_post_link( 'Edit <span class="screen-reader-text">' . get_the_title() . '</span>' );
        $edit = ob_get_clean();

        return $edit;
    }

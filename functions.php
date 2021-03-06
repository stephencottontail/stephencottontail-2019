<?php

    add_action( 'genesis_setup', function() {
        define( 'CHILD_THEME_NAME', 'stephencottontail-2019' );
        define( 'CHILD_THEME_URL', 'https://stephencottontail.com/' );
        define( 'CHILD_THEME_VERSION', '1.0.0' );

        add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );
        add_theme_support( 'genesis-responsive-viewport' );
        add_theme_support( 'genesis-accessibility', array( 'skip-links', 'headings' ) );
        add_theme_support( 'genesis-footer-widgets', 3 );

        add_theme_support( 'genesis-structural-wraps', array(
            'footer',
            'footer-widgets',
            'nav',
            'site-inner',
            'site-tagline'
        ) );

        add_theme_support( 'genesis-menus', array(
            'primary' => 'Primary Nav Menu'
        ) );

        add_theme_support( 'genesis-footer-widgets', 1 );

        unregister_sidebar( 'header-right' );
        unregister_sidebar( 'sidebar' );
        unregister_sidebar( 'sidebar-alt' );

        remove_action( 'genesis_header', 'genesis_do_header' );
        remove_action( 'genesis_after_header', 'genesis_do_nav' );
        remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );

        add_filter( 'genesis_post_info', function( $post_info ) {
            $post_info = 'Posted on [post_date] by [post_author]';

            return $post_info;
        } );

        add_filter( 'genesis_post_meta', function( $post_meta ) {
            $post_meta = '[post_categories before="Posted in "] [post_tags before="Tagged "] [post_edit_with_title]';

            return $post_meta;
        } );

        /**
         * There's gotta be a better way to do this
         */
        add_action( 'genesis_entry_content', function() {
            $before = genesis_markup( array(
                'open'    => '<div %s>',
                'context' => 'entry-pagination',
                'echo'    => false
            ) ) . '<span class="screen-reader-text">Pages</span>';

            $after = genesis_markup( array(
                'close'   => '</div>',
                'context' => 'entry-pagination',
                'echo'    => false
            ) );

            wp_link_pages( array(
                'before'      => $before,
                'after'       => $after,
                'link_before' => genesis_a11y( 'screen-reader-text' ) ? sprintf( '<span class="screen-reader-text">%s</span>', 'Page ' ) : ''
            ) );
        } );

        add_filter( 'genesis_prev_link_text', function() {
            return '&laquo; Newer Posts';
        } );

        add_filter( 'genesis_next_link_text', function() {
            return 'Older Posts &raquo;';
        } );

        remove_action( 'genesis_list_comments', 'genesis_default_list_comments' );
        remove_action( 'genesis_footer', 'genesis_do_footer' );
    }, 15 );

    add_action( 'after_switch_theme', function() {
        if ( ! function_exists( 'genesis_update_settings' ) ) {
            return;
        }

        genesis_update_settings( array( 'site_layout' => 'full-width-content' ) );
    } );

    add_action( 'wp_enqueue_scripts', function() {
        wp_enqueue_style( 'google-fonts', 'https://use.typekit.net/pxo8ien.css' );

        wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/js/all.js', array(), CHILD_THEME_VERSION, false );
        wp_enqueue_script( 'sc2019-functions', get_theme_file_uri( 'assets/js/functions.js' ), array( 'jquery' ), CHILD_THEME_VERSION, true );
    } );

    require_once( 'lib/header.php' );
    require_once( 'lib/post.php' );
    require_once( 'lib/comments.php' );
    require_once( 'lib/footer.php' );

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
            'header',
            'nav',
            'site-inner',
            'site-tagline'
        ) );

        add_theme_support( 'genesis-menus', array(
            'primary' => 'Primary Nav Menu'
        ) );

        unregister_sidebar( 'sidebar' );

        remove_action( 'genesis_header', 'genesis_do_header' );
        remove_action( 'genesis_after_header', 'genesis_do_nav' );
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
        wp_enqueue_script( 'toggles', get_theme_file_uri( 'assets/js/toggles.js' ), array( 'jquery' ), CHILD_THEME_VERSION, true );
    } );

    require_once( 'lib/header.php' );

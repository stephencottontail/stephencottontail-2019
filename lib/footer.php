<?php add_action( 'genesis_footer', function() { ?>
    <div class="search-bottom-bar">
        <?php get_search_form(); ?>
    </div>
    <div class="creds">
        <p>&copy; 2019 Stephen Dickinson <span class="powered-by">&middot; Proudly powered by <a href="https://www.studiopress.com/">Genesis</a> and <a href="https://wordpress.org/">WordPress</a></span></p>
    </div>
<?php } );

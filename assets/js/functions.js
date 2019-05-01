( function( $ ) {
    var menuToggle = $( '#menu-toggle' );
    var menuTarget = $( '.nav-primary' );
    var searchToggle = $( '#search-toggle' );
    var searchTarget = $( '.search-bottom-bar .search-form' );

    /**
	 * Toggle aria attributes
	 *
	 * @param  {button} $this      passed through
	 * @param  {aria-xx} attribute aria attribute to toggle
	 * @return {bool}              from _ariaReturn
	 */
	function _toggleAria( $this, attribute ) {
		$this.attr( attribute, function( index, value ) {
			return 'false' === value;
		} );
	}

    /**
	 * Adds a class to `<body>` toggling display of an element
	 */
    function _toggleElement() {
        var $this = $( this );

        _toggleAria( $this, 'aria-expanded' );
        _toggleAria( $this, 'aria-pressed' );
        $( 'body' ).toggleClass( $this.attr( 'id' ) + '-active' );
    }

    function debounce(func, wait, immediate) {
	    var timeout;
	    return function() {
		    var context = this, args = arguments;
		    var later = function() {
			    timeout = null;
			    if (!immediate) func.apply(context, args);
		    };
		    var callNow = immediate && !timeout;
		    clearTimeout(timeout);
		    timeout = setTimeout(later, wait);
		    if (callNow) func.apply(context, args);
	    };
    };

    var checkScrollPosition = debounce( function() {
        if ( 783 < $( window ).width() ) {
            return;
        };

        console.log( $( window ).scrollTop() );
        if ( 46 < $( window ).scrollTop() ) {
            $( 'body' ).addClass( 'scroll-position-past-admin-bar' );
        } else {
            $( 'body' ).removeClass( 'scroll-position-past-admin-bar' );
        }
    }, 200 );

    $( document ).ready( function() {
        menuToggle.on( 'click', _toggleElement );
        searchToggle.on( 'click', _toggleElement );

        $( window ).scroll( checkScrollPosition );
    } );
} )( jQuery );

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

    $( document ).ready( function() {
        menuToggle.on( 'click', _toggleElement );
        searchToggle.on( 'click', _toggleElement );
    } );
} )( jQuery );

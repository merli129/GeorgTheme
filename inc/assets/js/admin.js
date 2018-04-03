jQuery( document ).ready( function( $ ) {

  'use strict';

	$( '.help-tip' ).tipTip({
		attribute: 'data-tip'
	});

	$( 'a.help-tip' ).click( function() {
		return false;
	});

});

/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Excerpt teaser text.
	wp.customize( 'manta_excerpt_teaser', function( value ) {
		value.bind( function( to ) {
			$( '.more-link' ).text( to );
		} );
	} );
	
	// Copyright text.
	wp.customize( 'manta_copyright', function( value ) {
		value.bind( function( to ) {
			$( '.copyright-text p' ).text( to );
		} );
	} );
	
	// Display footer credit information.
	wp.customize( 'manta_site_credit', function( value ) {
		value.bind( function( to ) {
			if ( 1 == to ) {
				$( '.site-credit' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.site-credit' ).css( {
					'display': 'block'
				} );
			}
		} );
	} );
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.title-area' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.title-area' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );

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
	
	wp.customize( 'manta_display_site_title', function( value ) {
		value.bind( function( to ) {
			if ( 1 != to ) {
				$( '.site-title' ).css( {
					'position': 'absolute',
					'clip': 'rect(1px, 1px, 1px, 1px)'
				} );
			} else {
				$( '.site-title' ).css( {
					'position': 'static',
					'clip': 'auto'
				} );
			}
		} );
	} );
	
	wp.customize( 'manta_display_site_desc', function( value ) {
		value.bind( function( to ) {
			if ( 1 != to ) {
				$( '.site-description' ).css( {
					'position': 'absolute',
					'clip': 'rect(1px, 1px, 1px, 1px)'
				} );
			} else {
				$( '.site-description' ).css( {
					'position': 'static',
					'clip': 'auto'
				} );
			}
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

	// Mobile/ tablet base font size.
	wp.customize( 'manta_small_base_font_size', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				if ( $( document ).width() < 640 ) {
					$( 'html' ).css( {
						'font-size': to + 'px'
					} )
				}
			}
		} );
	} );

	// Desktop base font size.
	wp.customize( 'manta_large_base_font_size', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				if ( $( document ).width() >= 640 ) {
					$( 'html' ).css( {
						'font-size': to + 'px'
					} )
				}
			}
		} );
	} );

	// Line height.
	wp.customize( 'manta_base_line_height', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( document.body ).css( {
					'line-height': to
				} )
			}
		} );
	} );

	// Boxed Layout.
	wp.customize( 'manta_site_layout', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'boxed full-width' );
			if ( 'boxed' === to ) {
				$( 'body' ).addClass( 'boxed' );
			} else {
				$( 'body' ).addClass( 'full-width' );
			}
		} );
	} );

	// Header items alignment.
	wp.customize( 'manta_header_alignment', function( value ) {
		value.bind( function( to ) {
			$( '.header-items' ).removeClass( 'aligned left right' );
			if ( 'left' === to ) {
				$( '.header-items' ).addClass( 'aligned left' );
			} else if ( 'right' === to ) {
				$( '.header-items' ).addClass( 'aligned right' );
			}
		} );
	} );

	// Main menu alignment.
	wp.customize( 'manta_main_menu_alignment', function( value ) {
		value.bind( function( to ) {
			$( '#main-navigation' ).removeClass( 'aligned left right' );
			if ( 'left' === to ) {
				$( '#main-navigation' ).addClass( 'aligned left' );
			} else if ( 'right' === to ) {
				$( '#main-navigation' ).addClass( 'aligned right' );
			}
		} );
	} );

	// Footer alignment.
	wp.customize( 'manta_footer_alignment', function( value ) {
		value.bind( function( to ) {
			$( '#colophon' ).removeClass( 'aligned left right' );
			if ( 'left' === to ) {
				$( '#colophon' ).addClass( 'aligned left' );
			} else if ( 'right' === to ) {
				$( '#colophon' ).addClass( 'aligned right' );
			}
		} );
	} );

	// Sticky main menu.
	wp.customize( 'manta_sticky_main_menu', function( value ) {
		value.bind( function( to ) {
			$( '#masthead' ).removeClass( 'fixed-nav' );
			if ( to ) {
				$( '#masthead' ).addClass( 'fixed-nav' );
			}
		} );
	} );

} )( jQuery );

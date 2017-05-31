/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
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
			if ( $( 'style#small_base_font_size' ).length ) {
				$( 'style#small_base_font_size' ).html( '@media only screen and (max-width: 640px){html{font-size:' + to + 'px }}' );
			} else {
				$( 'head' ).append( '<style id="small_base_font_size">@media only screen and (max-width: 640px){html{font-size:' + to + 'px }}</style>' );
				setTimeout(function() {
					$( 'style#small_base_font_size' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );

	// Desktop base font size.
	wp.customize( 'manta_large_base_font_size', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#large_base_font_size' ).length ) {
				$( 'style#large_base_font_size' ).html( '@media only screen and (min-width: 640px){html{font-size:' + to + 'px }}' );
			} else {
				$( 'head' ).append( '<style id="large_base_font_size">@media only screen and (min-width: 640px){html{font-size:' + to + 'px }}</style>' );
				setTimeout(function() {
					$( 'style#large_base_font_size' ).not( ':last' ).remove();
				}, 100);
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

	// Overall link color
	wp.customize( 'manta_link_color', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#link_color' ).length ) {
				$( 'style#link_color' ).html( 'a{color:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="link_color">a{color:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#link_color' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );

	// Overall link hover color
	wp.customize( 'manta_link_hover_color', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#link_hover_color' ).length ) {
				$( 'style#link_hover_color' ).html( 'a:hover,a:focus,.nav-menu a:hover,.nav-menu a:focus,.nav-links a:hover,.nav-links a:focus,.menu-toggle:hover,.menu-toggle:focus,.sub-menu-toggle:hover,.sub-menu-toggle:focus{color:' + to + '}input:focus,textarea:focus{border-color:' + to + '}input[type="button"]:hover,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus,input[type="submit"]:hover,input[type="submit"]:focus{background-color:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="link_hover_color">a:hover,a:focus,.nav-menu a:hover,.nav-menu a:focus,.nav-links a:hover,.nav-links a:focus,.menu-toggle:hover,.menu-toggle:focus,.sub-menu-toggle:hover,.sub-menu-toggle:focus{color:' + to + '}input:focus,textarea:focus{border-color:' + to + '}input[type="button"]:hover,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus,input[type="submit"]:hover,input[type="submit"]:focus{background-color:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#link_hover_color' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );

	// Heading text color
	wp.customize( 'manta_heading_text_color', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#heading_text_color' ).length ) {
				$( 'style#heading_text_color' ).html( 'h1,h2,h3,h4,h5,h6,.widget_calendar caption{color:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="heading_text_color">h1,h2,h3,h4,h5,h6,.widget_calendar caption{color:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#heading_text_color' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );

	// Body text color
	wp.customize( 'manta_content_text_color', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#content_text_color' ).length ) {
				$( 'style#content_text_color' ).html( 'body,.nav-menu a,.nav-links a{color:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="content_text_color">body,.nav-menu a,.nav-links a{color:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#content_text_color' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );

	// Title link color
	wp.customize( 'manta_title_link_color', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#title_link_color' ).length ) {
				$( 'style#title_link_color' ).html( '.site-title a,.entry-title a{color:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="title_link_color">.site-title a,.entry-title a{color:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#title_link_color' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );

	// Title link hover color
	wp.customize( 'manta_title_link_hover_color', function( value ) {
		value.bind( function( to ) {
			if ( $( 'style#title_link_hover_color' ).length ) {
				$( 'style#title_link_hover_color' ).html( '.site-title a:hover,.site-title a:focus,.entry-title a:hover,.entry-title a:focus{color:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="title_link_hover_color">.site-title a:hover,.site-title a:focus,.entry-title a:hover,.entry-title a:focus{color:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#title_link_hover_color' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );
	
	// Body font family
	wp.customize( 'manta_body_font_family', function( value ) {
		value.bind( function( to ) {
			var gfontUrl = ['//fonts.googleapis.com/css?family='];
			var fonts = to.split(' ').join('+');
			gfontUrl.push(fonts);
			if ( 0 === $('link#body_font_family' ).length ) {
				$gfontlink = $('<link>' , {
					id    : 'body_font_family',
					href  : gfontUrl.join(''),
					rel   : 'stylesheet',
					type  : 'text/css'
				});

				$('link:last').after($gfontlink);
			} else {
				$('link#body_font_family' ).attr('href', gfontUrl.join('') );
			}

			if ( $( 'style#body_font_family' ).length ) {
				$( 'style#body_font_family' ).html( 'body{font-family:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="body_font_family">body{font-family:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#body_font_family' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );
	
	// Heading font family
	wp.customize( 'manta_heading_font_family', function( value ) {
		value.bind( function( to ) {
			var gfontUrl = ['//fonts.googleapis.com/css?family='];
			var fonts = to.split(' ').join('+');
			gfontUrl.push(fonts);
			if ( 0 === $('link#heading_font_family' ).length ) {
				$gfontlink = $('<link>' , {
					id    : 'heading_font_family',
					href  : gfontUrl.join(''),
					rel   : 'stylesheet',
					type  : 'text/css'
				});

				$('link:last').after($gfontlink);
			} else {
				$('link#heading_font_family' ).attr('href', gfontUrl.join('') );
			}

			if ( $( 'style#heading_font_family' ).length ) {
				$( 'style#heading_font_family' ).html( 'h1,h2,h3,h4,h5,h6,h1.site-title,p.site-title{font-family:' + to + '}' );
			} else {
				$( 'head' ).append( '<style id="heading_font_family">h1,h2,h3,h4,h5,h6,h1.site-title,p.site-title{font-family:' + to + '}</style>' );
				setTimeout(function() {
					$( 'style#heading_font_family' ).not( ':last' ).remove();
				}, 100);
			}
		} );
	} );
	
	// Thumbnails display
	wp.customize( 'manta_thumbnails_display', function( value ) {
		value.bind( function( to ) {
			var thumbSrc;
			if ( ! $( '#main .post-thumbnail' ).length ) {
				wp.customize.preview.send( 'refresh' );
			} else {
				$( '.hentry' ).removeClass( 'thumb-large thumb-above-title thumb-below-title thumb-small left right' );
				if ( 'large' === to || 'small' === to || 'small_right' === to ) {
					$( '#main .post-thumbnail' ).each(function() {
						$(this).show();
						$(this).prependTo( $(this).closest( '.hentry' ) );
						thumbSrc = $(this).find( '.thumbnails' ).attr('src');
						if ( 'small' === to || 'small_right' === to ) {
							$(this).css( {
								'background-image': 'url(' + thumbSrc + ')'
							} )
						}
					});
					if ( 'large' === to ) {
						$( '.hentry' ).addClass( 'thumb-large' );
					} else if ( 'small' === to ) {
						$( '.hentry' ).addClass( 'thumb-small left' );
					} else if ( 'small_right' ) {
						$( '.hentry' ).addClass( 'thumb-small right' );
					}
					
				} else if ( 'large_above' === to ) {
					$( '#main .post-thumbnail' ).each(function() {
						$(this).show();
						$(this).prependTo( $(this).closest( '.hentry' ).find( '.post-wrapper' ) );
					});
					$( '.hentry' ).addClass( 'thumb-above-title' );
				} else if ( 'large_below' === to ) {
					$( '#main .post-thumbnail' ).each(function() {
						$(this).show();
						$(this).insertAfter( $(this).closest( '.hentry' ).find( '.entry-header' ) );
					});
					$( '.hentry' ).addClass( 'thumb-below-title' );
				} else if ( 'none' === to ) {
					$( '#main .post-thumbnail' ).each(function() {
						$(this).hide();
					});
				}
			}
		} );
	} );
	
	wp.customize.previewer.bind( 'refresh', function() {
		wp.customize.previewer.refresh();
	} );

} )( jQuery );

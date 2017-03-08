<?php
/**
 * Defaults values for customizer options
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Set default values for theme customization options.
 *
 * @since 1.0.0
 *
 * @param str $option name of the option.
 * @return mixed Returns integer, string or array option values.
 */
function manta_get_theme_defaults( $option ) {

	/**
	 * Filter default values for customizer options.
	 *
	 * @since 1.0.0
	 */
	$manta_defaults = apply_filters(
		'manta_theme_defaults', array(
			'manta_logo_image'                  => '',
			'manta_header_layout'               => 'left',
			'manta_excerpt_option'              => 'excerpt',
			'manta_excerpt_length'              => 40,
			'manta_excerpt_teaser'              => __( 'Read More', 'manta' ),
			'manta_thumbnails_display'          => 'large',
			'manta_thumbnails_on_single'        => '',
			'manta_copyright'                   => '',
		)
	);
	if ( 'all' === $option ) {
		return $manta_defaults;
	} else {
		return $manta_defaults[ $option ];
	}
}

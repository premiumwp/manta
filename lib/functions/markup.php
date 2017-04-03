<?php
/**
 * Facilitate adding and filtering html elements or attributes to html elements
 *
 * This file incorporates code from Stargazer WordPress Theme,
 * Copyright (c) 2013 - 2016, Justin Tadlock http://themehybrid.com/themes/stargazer.
 * Stargazer WordPress Theme is distributed under the terms of the GNU GPL.
 *
 * @package Manta
 * @since 1.1
 */

/**
 * Outputs an HTML element's attributes.
 *
 * @since  1.0.0
 *
 * @param  str   $slug The slug/ID of the element (e.g., 'sidebar').
 * @param  array $attr Array of attributes to pass in (overwrites filters).
 */
function manta_attr( $slug, $attr = array() ) {
	echo manta_get_attr( $slug, $attr );
}

/**
 * Gets an HTML element's attributes.
 *
 * @since  1.0.0
 *
 * @param  str   $slug The slug/ID of the element (e.g., 'sidebar').
 * @param  array $attr Array of attributes to pass in (overwrites filters).
 * @return string
 */
function manta_get_attr( $slug, $attr = array() ) {
	$out = '';

	if ( ! in_array( $slug, array( 'body', 'post', 'name', 'head' ), true ) ) {
		$attr['class'] = $slug;
	}

	/**
	 * Filter element's attributes.
	 *
	 * @since 1.0.0
	 */
	$attr = apply_filters( "manta_get_attr_{$slug}", $attr, $slug );

	if ( ! empty( $attr ) ) {
		foreach ( $attr as $name => $value ) {
			$out .= sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) );
		}
	}

	return $out;
}

/**
 * Output a font icon.
 *
 * @since 1.1
 *
 * @param array $args Parameters needed to display a font icon.
 */
function manta_icon( $args = array() ) {
	$icon_markup = manta_get_icon( $args );
	if ( $icon_markup ) {
		echo $icon_markup;
	}
}

/**
 * Gets a font icon markup.
 *
 * @since 1.1
 *
 * @param array $args Parameters needed to display a font icon.
 * @return string Icon markup
 */
function manta_get_icon( $args = array() ) {
	return apply_filters( 'manta_get_icon', '', $args );
}

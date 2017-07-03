<?php
/**
 * Teplate tags for manta theme
 *
 * @package Manta
 * @since 1.2
 */

/**
 * Render footer credit information.
 *
 * @since 1.2
 *
 * @return str copyright information markup.
 */
function manta_render_copyright_info() {
	$copyright_info = get_theme_mod( 'manta_copyright', manta_get_theme_defaults( 'manta_copyright' ) );
	if ( '' === $copyright_info ) {
		$copyright_info = manta_get_theme_defaults( 'manta_copyright' );
	}
	
	$copyright_info = implode( '<br/>', array_map( 'esc_textarea', explode( "\n", $copyright_info ) ) );

	$output = str_replace( '[current_year]', date_i18n( __( 'Y', 'manta' ) ), $copyright_info );
	$output = str_replace( '[site_title]', get_bloginfo('name'), $output );
	$output = str_replace( '[copy_symbol]', '&copy;', $output );

	$output = sprintf( '<p>%s</p>', $output );
	return $output;
}

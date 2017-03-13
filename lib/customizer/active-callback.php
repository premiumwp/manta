<?php
/**
 * Active callback functions
 *
 * Library of active callback functions for theme customizer.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Theme option's active callback conditional functions library
 *
 * @since 1.0.0
 */
class Manta_Active_Callback {

	/**
	 * Constructor method intentionally left blank.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {}

	/**
	 * Check if display excerpt option selected.
	 *
	 * @since 1.0.0
	 *
	 * @param object $control whole wp_customize_control object.
	 * @return bool
	 */
	public static function is_display_excerpt( $control ) {
		return 'excerpt' === $control->manager->get_setting( 'manta_excerpt_option' )->value() );
	}
}

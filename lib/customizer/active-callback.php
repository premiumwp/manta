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
		return 'excerpt' === $control->manager->get_setting( 'manta_excerpt_option' )->value();
	}

	/**
	 * Check if single post or page will have different content layout.
	 *
	 * @since 1.1
	 *
	 * @param object $control whole wp_customize_control object.
	 * @return bool
	 */
	public static function is_different_layout( $control ) {
		return '' !== $control->manager->get_setting( 'manta_enforce_global' )->value();
	}

	/**
	 * Check if site width is to be changed.
	 *
	 * @since 1.1
	 *
	 * @param object $control whole wp_customize_control object.
	 * @return bool
	 */
	public static function is_change_site_width( $control ) {
		return '' !== $control->manager->get_setting( 'manta_change_site_width' )->value();
	}

	/**
	 * Check if primary sidebar width is to be changed.
	 *
	 * @since 1.1
	 *
	 * @param object $control whole wp_customize_control object.
	 * @return bool
	 */
	public static function is_change_primary_sidebar_width( $control ) {
		return '' !== $control->manager->get_setting( 'manta_change_primary_sidebar_width' )->value();
	}

	/**
	 * Check if secondary sidebar width is to be changed.
	 *
	 * @since 1.1
	 *
	 * @param object $control whole wp_customize_control object.
	 * @return bool
	 */
	public static function is_change_secondary_sidebar_width( $control ) {
		return '' !== $control->manager->get_setting( 'manta_change_secondary_sidebar_width' )->value();
	}
}

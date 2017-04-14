<?php
/**
 * Customizer data
 *
 * Theme Customizer's sections and control field data.
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Theme option's active callback conditional functions library
 *
 * @since 1.0.0
 */
class Manta_Customizer_Data {

	/**
	 * Constructor intentionally left blank.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {}

	/**
	 * Set theme customizer panels.
	 *
	 * @since 1.0.1
	 *
	 * @return array Returns array of default theme customizer panels.
	 */
	public static function get_theme_panels() {
		/**
		 * Filter theme customizer panels array.
		 *
		 * @since 1.0.1
		 */
		$manta_panels = apply_filters(
			'manta_theme_panels', array(
				'manta_theme_panel' => array(
					'title'       => __( 'Theme Options', 'manta' ),
					'priority'    => 6,
					'description' => __( 'Options to customize site header structure and elements', 'manta' ),
				)
			)
		);

		return $manta_panels;
	}

	/**
	 * Set theme customizer sections.
	 *
	 * @since 1.0.1
	 *
	 * @return array Returns array of default theme customizer sections.
	 */
	public static function get_theme_sections() {
		/**
		 * Filter theme customizer section array.
		 *
		 * @since 1.0.0
		 */
		$manta_sections = apply_filters(
			'manta_theme_sections', array(
				'manta_content_section' => array(
					'title'       => __( 'Post Content', 'manta' ),
					'panel'       => 'manta_theme_panel',
					'description' => __( 'Options to change content display', 'manta' ),
				),
				'manta_layout_section'  => array(
					'title'       => __( 'Content Layout', 'manta' ),
					'panel'       => 'manta_theme_panel',
					'description' => __( 'Options to change content/sidebar display and positioning', 'manta' ),
				),
				'manta_footer_section'  => array(
					'title'       => __( 'Site Footer', 'manta' ),
					'panel'       => 'manta_theme_panel',
					'description' => __( 'Options to change footer text and navigation', 'manta' ),
				),
			)
		);

		return $manta_sections;
	}

	/**
	 * Set theme customizer controls and settings.
	 *
	 * @since 1.0.0
	 *
	 * @return array Returns array of default theme controls and settings.
	 */
	public static function get_theme_controls() {
		/**
		 * Filter theme customizer controls and settings.
		 *
		 * @since 1.0.0
		 */
		$manta_controls = apply_filters(
			'manta_theme_controls', array(
				array(
					'label'       => __( 'Header Layout', 'manta' ),
					'section'     => 'manta_layout_section',
					'settings'    => 'manta_header_layout',
					'type'        => 'select',
					'choices'     => array(
						'left'    => __( 'Left aligned', 'manta' ),
						'right'   => __( 'Right aligned', 'manta' ),
						'center'  => __( 'Center aligned', 'manta' ),
					),
				),
				array(
					'label'       => __( 'Excerpt or Full Content', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_excerpt_option',
					'type'        => 'select',
					'choices'     => array(
						'excerpt' => __( 'Excerpt', 'manta' ),
						'content' => __( 'Full content', 'manta' ),
					),
				),
				array(
					'label'       => __( 'Excerpt Length (from 1 to 500 words)', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_excerpt_length',
					'type'        => 'number',
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'       => __( 'Change Excerpt Read More Text', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_excerpt_teaser',
					'type'        => 'text',
					'transport'   => 'postMessage',
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'       => __( 'Thumbnail Display Options', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_thumbnails_display',
					'type'        => 'select',
					'choices'     => array(
						'large'   => __( 'Large thumbnails', 'manta' ),
						'small'   => __( 'Small thumbnails', 'manta' ),
						'none'    => __( 'Do not display thumbnails', 'manta' ),
					),
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'       => __( 'Display Thumbnail on Single Posts', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_thumbnails_on_single',
					'description' => __( 'Displays the thumbnail image on singular posts and pages', 'manta' ),
					'type'        => 'checkbox',
				),
				array(
					'label'       => __( 'Copyright Text', 'manta' ),
					'section'     => 'manta_footer_section',
					'settings'    => 'manta_copyright',
					'description' => __( 'Change default copyright text', 'manta' ),
					'transport'   => 'postMessage',
					'type'        => 'textarea',
				),
			)
		);
		return $manta_controls;
	}
}

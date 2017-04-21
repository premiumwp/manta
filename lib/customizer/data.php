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
					'title'       => esc_html__( 'Theme Options', 'manta' ),
					'priority'    => 6,
					'description' => esc_html__( 'Options to customize site header structure and elements', 'manta' ),
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
					'title'       => esc_html__( 'Post Content', 'manta' ),
					'panel'       => 'manta_theme_panel',
					'description' => esc_html__( 'Options to change content display', 'manta' ),
				),
				'manta_layout_section'  => array(
					'title'       => esc_html__( 'Content Layout', 'manta' ),
					'panel'       => 'manta_theme_panel',
					'description' => esc_html__( 'Options to change content/sidebar display and positioning', 'manta' ),
				),
				'manta_footer_section'  => array(
					'title'       => esc_html__( 'Site Footer', 'manta' ),
					'panel'       => 'manta_theme_panel',
					'description' => esc_html__( 'Options to change footer text and navigation', 'manta' ),
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
					'label'       => esc_html__( 'Header Layout', 'manta' ),
					'section'     => 'manta_layout_section',
					'settings'    => 'manta_header_layout',
					'type'        => 'select',
					'choices'     => array(
						'left'    => esc_html__( 'Left aligned', 'manta' ),
						'right'   => esc_html__( 'Right aligned', 'manta' ),
						'center'  => esc_html__( 'Center aligned', 'manta' ),
					),
				),
				array(
					'label'       => esc_html__( 'Excerpt or Full Content', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_excerpt_option',
					'type'        => 'select',
					'choices'     => array(
						'excerpt' => esc_html__( 'Excerpt', 'manta' ),
						'content' => esc_html__( 'Full content', 'manta' ),
					),
				),
				array(
					'label'       => esc_html__( 'Excerpt Length (from 1 to 500 words)', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_excerpt_length',
					'type'        => 'number',
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'       => esc_html__( 'Change Excerpt Read More Text', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_excerpt_teaser',
					'type'        => 'text',
					'transport'   => 'postMessage',
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'       => esc_html__( 'Thumbnail Display Options', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_thumbnails_display',
					'type'        => 'select',
					'choices'     => array(
						'large'   => esc_html__( 'Large thumbnails', 'manta' ),
						'small'   => esc_html__( 'Small thumbnails', 'manta' ),
						'none'    => esc_html__( 'Do not display thumbnails', 'manta' ),
					),
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'       => esc_html__( 'Display Thumbnail on Single Posts', 'manta' ),
					'section'     => 'manta_content_section',
					'settings'    => 'manta_thumbnails_on_single',
					'description' => esc_html__( 'Displays the thumbnail image on singular posts and pages', 'manta' ),
					'type'        => 'checkbox',
				),
				array(
					'label'       => esc_html__( 'Copyright Text', 'manta' ),
					'section'     => 'manta_footer_section',
					'settings'    => 'manta_copyright',
					'description' => esc_html__( 'Change default copyright text', 'manta' ),
					'transport'   => 'postMessage',
					'type'        => 'textarea',
				),
			)
		);
		return $manta_controls;
	}
}

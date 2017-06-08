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
				'manta_typography_section' => array(
					'title'              => esc_html__( 'Typography', 'manta' ),
					'panel'              => 'manta_theme_panel',
					'description'        => esc_html__( 'Options to theme typography', 'manta' ),
					'description_hidden' => true,
				),
				'manta_layout_section'  => array(
					'title'              => esc_html__( 'Layout', 'manta' ),
					'panel'              => 'manta_theme_panel',
					'description'        => esc_html__( 'Options to change various layouts', 'manta' ),
					'description_hidden' => true,
				),
				'manta_dimension_section'  => array(
					'title'              => esc_html__( 'Dimensions', 'manta' ),
					'panel'              => 'manta_theme_panel',
					'description'        => esc_html__( 'Options to change various site deimensions', 'manta' ),
					'description_hidden' => true,
				),
				'manta_content_section' => array(
					'title'              => esc_html__( 'Blog', 'manta' ),
					'panel'              => 'manta_theme_panel',
					'description'        => esc_html__( 'Options to change content display', 'manta' ),
					'description_hidden' => true,
				),
				'manta_copyright_section' => array(
					'title'              => esc_html__( 'Copyright', 'manta' ),
					'panel'              => 'manta_theme_panel',
					'description'        => esc_html__( 'Options to change copyright content', 'manta' ),
					'description_hidden' => true,
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
					'label'         => esc_html__( 'Display Site Title', 'manta' ),
					'section'       => 'title_tagline',
					'settings'      => 'manta_display_site_title',
					'transport'     => 'postMessage',
					'type'          => 'checkbox',
				),
				array(
					'label'         => esc_html__( 'Display Tagline', 'manta' ),
					'section'       => 'title_tagline',
					'settings'      => 'manta_display_site_desc',
					'transport'     => 'postMessage',
					'type'          => 'checkbox',
					'priority'      => 20,
				),
				array(
					'label'         => esc_html__( 'Site Title Color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_site_title_color',
					'transport'     => 'postMessage',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Body Text Color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_content_text_color',
					'transport'     => 'postMessage',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Link Color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_link_color',
					'transport'     => 'postMessage',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Link Hover Color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_link_hover_color',
					'transport'     => 'postMessage',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Post Title Color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_post_title_color',
					'transport'     => 'postMessage',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Post Title Hover Color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_post_title_hover_color',
					'transport'     => 'postMessage',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Body Font Family', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_body_font_family',
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Font_Dropdown_Control',
					'control_path'  => 'manta-font-dropdown-control',
					'choices'       => self::get_all_web_fonts_list(),
				),
				array(
					'label'         => esc_html__( 'Heading Font Family', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_heading_font_family',
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Font_Dropdown_Control',
					'control_path'  => 'manta-font-dropdown-control',
					'choices'       => self::get_all_web_fonts_list(),
				),
				array(
					'label'         => esc_html__( 'Mobile Base Font Size', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_small_base_font_size',
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Slider_Control',
					'control_path'  => 'manta-slider-control',
					'js_template'   => true,
					'input_attrs'   => array( 'min' => 8, 'max' => 40, 'step' => 1 ),
					'unit'          => 'px',
					'default_value' => manta_get_theme_defaults('manta_small_base_font_size'),
				),
				array(
					'label'         => esc_html__( 'Desktop Base Font Size', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_large_base_font_size',
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Slider_Control',
					'control_path'  => 'manta-slider-control',
					'js_template'   => true,
					'input_attrs'   => array( 'min' => 8, 'max' => 40, 'step' => 1 ),
					'unit'          => 'px',
					'default_value' => manta_get_theme_defaults('manta_large_base_font_size'),
				),
				array(
					'label'         => esc_html__( 'Base Line Height', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_base_line_height',
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Slider_Control',
					'control_path'  => 'manta-slider-control',
					'js_template'   => true,
					'input_attrs'   => array( 'min' => 1, 'max' => 3, 'step' => 0.01 ),
					'unit'          => 'px',
					'default_value' => manta_get_theme_defaults('manta_base_line_height'),
				),
				array(
					'label'         => esc_html__( 'Overall Site Layout', 'manta' ),
					'section'       => 'manta_layout_section',
					'settings'      => 'manta_site_layout',
					'type'          => 'select',
					'transport'     => 'postMessage',
					'choices'       => array(
						'boxed'      => esc_html__( 'Boxed layout', 'manta' ),
						'full_width' => esc_html__( 'Full width layout', 'manta' ),
					),
				),
				array(
					'label'         => esc_html__( 'Header Items Alignment', 'manta' ),
					'section'       => 'manta_layout_section',
					'settings'      => 'manta_header_alignment',
					'type'          => 'select',
					'transport'     => 'postMessage',
					'choices'       => array(
						'left'    => esc_html__( 'Left aligned', 'manta' ),
						'right'   => esc_html__( 'Right aligned', 'manta' ),
						'center'  => esc_html__( 'Center aligned', 'manta' ),
					),
				),
				array(
					'label'         => esc_html__( 'Main Menu Alignment', 'manta' ),
					'section'       => 'manta_layout_section',
					'settings'      => 'manta_main_menu_alignment',
					'type'          => 'select',
					'transport'     => 'postMessage',
					'choices'       => array(
						'left'    => esc_html__( 'Left aligned', 'manta' ),
						'right'   => esc_html__( 'Right aligned', 'manta' ),
						'center'  => esc_html__( 'Center aligned', 'manta' ),
					),
				),
				array(
					'label'         => esc_html__( 'Footer Items Alignment', 'manta' ),
					'section'       => 'manta_layout_section',
					'settings'      => 'manta_footer_alignment',
					'type'          => 'select',
					'transport'     => 'postMessage',
					'choices'       => array(
						'left'    => esc_html__( 'Left aligned', 'manta' ),
						'right'   => esc_html__( 'Right aligned', 'manta' ),
						'center'  => esc_html__( 'Center aligned', 'manta' ),
					),
				),
				array(
					'label'         => esc_html__( 'Make main menu sticky on scroll', 'manta' ),
					'section'       => 'manta_layout_section',
					'settings'      => 'manta_sticky_main_menu',
					'transport'     => 'postMessage',
					'type'          => 'checkbox',
				),
				array(
					'label'         => esc_html__( 'Thumbnail Display Options', 'manta' ),
					'section'       => 'manta_layout_section',
					'settings'      => 'manta_thumbnails_display',
					'type'          => 'select',
					'choices'       => array(
						'large'       => esc_html__( 'Hero thumbnail above post title', 'manta' ),
						'large_above' => esc_html__( 'Large thumbnail above post title', 'manta' ),
						'large_below' => esc_html__( 'Large thumbnail below post title', 'manta' ),
						'small'       => esc_html__( 'Small thumbnail left aligned', 'manta' ),
						'small_right' => esc_html__( 'Small thumbnail right aligned', 'manta' ),
						'none'        => esc_html__( 'Do not display thumbnails', 'manta' ),
					),
					'select_refresh' => array(
						'selector'            => '.site-main',
						'container_inclusive' => false,
						'render_callback'     => 'manta_customize_partial_main_content',
						'fallback_refresh'    => false,
					),
					'transport'      => 'postMessage',
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'         => esc_html__( 'Overall Site Width', 'manta' ),
					'section'       => 'manta_dimension_section',
					'settings'      => 'manta_overall_site_width',
					'description'   => esc_html__( 'Change overall site width for laptops and desktops. Minimum allowed site width is 960px. Enter a number i.e., 1280', 'manta' ),
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Slider_Control',
					'control_path'  => 'manta-slider-control',
					'js_template'   => true,
					'input_attrs'   => array( 'step' => 2, 'min' => 960, 'max' => 2000 ),
					'unit'          => 'px',
					'default_value' => '',
				),
				array(
					'label'         => esc_html__( 'Primary Sidebar Width', 'manta' ),
					'section'       => 'manta_dimension_section',
					'settings'      => 'manta_primary_sidebar_width',
					'description'   => esc_html__( 'Change primary sidebar width for laptops and desktops. Minimum allowed sidebar width is 300px. Enter a number i.e., 340 ', 'manta' ),
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Slider_Control',
					'control_path'  => 'manta-slider-control',
					'js_template'   => true,
					'input_attrs'   => array( 'step' => 2, 'min' => 180, 'max' => 1000 ),
					'unit'          => 'px',
					'default_value' => '',
				),
				array(
					'label'         => esc_html__( 'Secondary Sidebar Width', 'manta' ),
					'section'       => 'manta_dimension_section',
					'settings'      => 'manta_secondary_sidebar_width',
					'description'   => esc_html__( 'Change secondary sidebar width for laptops and desktops. Minimum allowed site width is 180px. Enter a number i.e., 1280', 'manta' ),
					'transport'     => 'postMessage',
					'control_class' => 'Manta_Slider_Control',
					'control_path'  => 'manta-slider-control',
					'js_template'   => true,
					'input_attrs'   => array( 'step' => 2, 'min' => 180, 'max' => 500 ),
					'unit'          => 'px',
					'default_value' => '',
				),
				array(
					'label'          => esc_html__( 'Excerpt Or Full Content', 'manta' ),
					'section'        => 'manta_content_section',
					'settings'       => 'manta_excerpt_option',
					'type'           => 'select',
					'transport'      => 'postMessage',
					'select_refresh' => array(
						'selector'            => '.site-main',
						'container_inclusive' => false,
						'render_callback'     => 'manta_customize_partial_main_content',
						'fallback_refresh'    => false,
					),
					'choices'        => array(
						'excerpt' => esc_html__( 'Excerpt', 'manta' ),
						'content' => esc_html__( 'Full content', 'manta' ),
					),
				),
				array(
					'label'         => esc_html__( 'Excerpt Length (from 1 to 500 words)', 'manta' ),
					'section'       => 'manta_content_section',
					'settings'      => 'manta_excerpt_length',
					'type'          => 'number',
					'transport'      => 'postMessage',
					'select_refresh' => array(
						'selector'            => '.site-main',
						'container_inclusive' => false,
						'render_callback'     => 'manta_customize_partial_main_content',
						'fallback_refresh'    => false,
					),
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'         => esc_html__( 'Change Excerpt Read More Text', 'manta' ),
					'section'       => 'manta_content_section',
					'settings'      => 'manta_excerpt_teaser',
					'type'          => 'text',
					'transport'     => 'postMessage',
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'         => esc_html__( 'Display thumbnail image on single posts', 'manta' ),
					'section'       => 'manta_content_section',
					'settings'      => 'manta_thumbnails_on_single',
					'type'          => 'checkbox',
					'transport'      => 'postMessage',
					'select_refresh' => array(
						'selector'            => '.site-main',
						'container_inclusive' => false,
						'render_callback'     => 'manta_customize_partial_main_content',
						'fallback_refresh'    => false,
					),
				),
				array(
					'label'         => esc_html__( 'Copyright Text', 'manta' ),
					'section'       => 'manta_copyright_section',
					'settings'      => 'manta_copyright',
					'description'   => esc_html__( 'Change default copyright text', 'manta' ),
					'transport'     => 'postMessage',
					'type'          => 'textarea',
				),
			)
		);
		return $manta_controls;
	}

	/**
	 * Get Sans serif Google fonts.
	 *
	 * @since  1.1
	 * @return array  Returns array of required google fonts.
	 */
	public static function get_google_sans_fonts_list() {
		$google_fonts = array(
			'Noto Sans',
			'Source Sans Pro',
			'Open Sans',
			'Roboto',
			'Alegreya Sans',
			'Lato',
			'Raleway',
			'PT Sans',
			'Ubuntu',
			'Arimo',
			'Oswald',
			'Montserrat',
			'Droid Sans',
			'Titillium Web',
			'Dosis',
			'Catamaran',
			'Sintony',
			'Archivo Narrow',
		);

		return apply_filters( 'manta_sans_serif_web_fonts_list', $google_fonts );
	}

	/**
	 * Get Serif Google fonts attributes.
	 *
	 * @since  1.1
	 * @return array  Returns array of required google fonts.
	 */
	public static function get_google_serif_fonts_list() {
		$google_fonts = array(
			'Lora',
			'Droid Serif',
			'Merriweather',
			'PT Serif',
			'Playfair Display',
			'Bitter',
			'Arvo',
			'Noto Serif',
			'Crimson Text',
			'Libre Baskerville',
			'Josefin Slab',
			'Noticia Text',
			'Cormorant Garamond',
			'Tinos',
			'Gentium Book Basic',
		);

		return apply_filters( 'manta_serif_web_fonts_list', $google_fonts );
	}

	/**
	 * Get list of all available web fonts.
	 *
	 * @return  array Returns list of all web fonts.
	 * @since   1.1
	 */
	public static function get_all_web_fonts_list() {
		$google_sans_fonts  = self::get_google_sans_fonts_list();
		$google_serif_fonts = self::get_google_serif_fonts_list();

		return array_merge( $google_sans_fonts, $google_serif_fonts );
	}
}

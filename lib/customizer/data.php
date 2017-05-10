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
					'label'         => esc_html__( 'Display Site title', 'manta' ),
					'section'       => 'title_tagline',
					'settings'      => 'manta_display_site_title',
					'transport'     => 'postMessage',
					'type'          => 'checkbox',
				),
				array(
					'label'         => esc_html__( 'Display Site description', 'manta' ),
					'section'       => 'title_tagline',
					'settings'      => 'manta_display_site_desc',
					'transport'     => 'postMessage',
					'type'          => 'checkbox',
					'priority'      => 20,
				),
				array(
					'label'         => esc_html__( 'Heading text color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_heading_text_color',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Body text color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_content_text_color',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Link color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_link_color',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Link hover color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_link_hover_color',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Title link color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_title_link_color',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Title link hover color', 'manta' ),
					'section'       => 'colors',
					'settings'      => 'manta_title_link_hover_color',
					'control_class' => 'WP_Customize_Color_Control',
				),
				array(
					'label'         => esc_html__( 'Body font family', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_body_font_family',
					'control_class' => 'Manta_Font_Dropdown_Control',
					'control_path'  => 'manta-font-dropdown-control',
					'choices'       => self::get_all_fonts_list(),
				),
				array(
					'label'         => esc_html__( 'Heading font family', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_heading_font_family',
					'control_class' => 'Manta_Font_Dropdown_Control',
					'control_path'  => 'manta-font-dropdown-control',
					'choices'       => self::get_all_fonts_list(),
				),
				array(
					'label'         => esc_html__( 'Mobile/ tablet base font size (in px)', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_small_base_font_size',
					'transport'     => 'postMessage',
					'type'          => 'number',
				),
				array(
					'label'         => esc_html__( 'Desktop base font size (in px)', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_large_base_font_size',
					'transport'     => 'postMessage',
					'type'          => 'number',
				),
				array(
					'label'         => esc_html__( 'Base line height', 'manta' ),
					'section'       => 'manta_typography_section',
					'settings'      => 'manta_base_line_height',
					'transport'     => 'postMessage',
					'type'          => 'number',
					'input_attrs'   => array( 'step' => 0.01 ),
				),
				array(
					'label'         => esc_html__( 'Overall site layout', 'manta' ),
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
					'label'         => esc_html__( 'Header items alignment', 'manta' ),
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
					'label'         => esc_html__( 'Main menu alignment', 'manta' ),
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
					'label'         => esc_html__( 'Footer items alignment', 'manta' ),
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
					'active_callback' => array( 'Manta_Active_Callback', 'is_display_excerpt' ),
				),
				array(
					'label'         => esc_html__( 'Excerpt or Full Content', 'manta' ),
					'section'       => 'manta_content_section',
					'settings'      => 'manta_excerpt_option',
					'type'          => 'select',
					'choices'       => array(
						'excerpt' => esc_html__( 'Excerpt', 'manta' ),
						'content' => esc_html__( 'Full content', 'manta' ),
					),
				),
				array(
					'label'         => esc_html__( 'Excerpt Length (from 1 to 500 words)', 'manta' ),
					'section'       => 'manta_content_section',
					'settings'      => 'manta_excerpt_length',
					'type'          => 'number',
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
	 * Get list of web safe fonts.
	 *
	 * @return  array Returns list of web safe fonts.
	 * @since   1.1
	 */
	public static function get_web_safe_fonts_list() {
		$web_safe_fonts = array(
			'Times serif'     => esc_html__( 'Times serif', 'manta' ),
			'Lucida serif'    => esc_html__( 'Lucida serif', 'manta' ),
			'Garamond serif'  => esc_html__( 'Garamond serif', 'manta' ),
			'Helvetica sans'  => esc_html__( 'Helvetica sans', 'manta' ),
			'Lucida sans'     => esc_html__( 'Lucida sans', 'manta' ),
			'Segoe UI sans'      => esc_html__( 'Segoe UI sans', 'manta' ),
		);
		return $web_safe_fonts;
	}

	/**
	 * Get web safe stack.
	 *
	 * @return  array Returns list of web safe font stack.
	 * @since   1.1
	 */
	public static function get_web_safe_fonts_stack( $name ) {
		$web_safe_fonts = array(
			'Times serif'    => 'Cambria, "Hoefler Text", Utopia, "Liberation Serif", Times, "Times New Roman", serif',
			'Lucida serif'   => '"Lucida Bright", Lucidabright, "Lucida Serif", Lucida, "DejaVu Serif", Georgia, serif',
			'Garamond serif' => 'Garamond, Baskerville, Baskerville Old Face, Hoefler Text, Times New Roman, serif',
			'Helvetica sans' => '"Helvetica Neue", Helvetica, Arial, sans-serif',
			'Lucida sans'    => '"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif',
			'Segoe UI sans'  => '"Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif',
		);
		return $web_safe_fonts[ $name ];
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

	/**
	 * Get list of all available fonts.
	 *
	 * @return  array Returns list of all fonts.
	 * @since   1.1
	 */
	public static function get_all_fonts_list() {
		$web_safe_fonts     = self::get_web_safe_fonts_list();
		$google_fonts       = self::get_all_web_fonts_list();

		return array_merge( $web_safe_fonts, $google_fonts );
	}
}

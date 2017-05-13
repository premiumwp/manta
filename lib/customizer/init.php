<?php
/**
 * Manta Theme Customizer.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Add theme modification options to Theme Customizer
 *
 * @since 1.0.0
 */
class Manta_Customizer extends Manta_Sanitization {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Hold defaults values for theme customization options.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    array
	 */
	public $defaults;

	/**
	 * Hold defaults theme settings and controls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    array
	 */
	public $customizer_controls;

	/**
	 * Hold theme customizer sections details.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    array
	 */
	public $customizer_sections;

	/**
	 * Hold theme customizer panels details.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    array
	 */
	public $customizer_panels;

	/**
	 * Constructor method.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->defaults            = manta_get_theme_defaults( 'all' );
		$this->customizer_panels   = Manta_Customizer_Data::get_theme_panels();
		$this->customizer_sections = Manta_Customizer_Data::get_theme_sections();
		$this->customizer_controls = Manta_Customizer_Data::get_theme_controls();
	}

	/**
	 * Add theme modification options and postMessage support to Theme Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_control( 'blogdescription' )->priority   = 20;
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->get_section( 'colors' )->panel               = 'manta_theme_panel';

		foreach ( $this->customizer_panels as $id => $args ) {
			$wp_customize->add_panel( $id, $args );
		}

		foreach ( $this->customizer_sections as $id => $args ) {
			$wp_customize->add_section( $id, $args );
		}

		foreach ( $this->customizer_controls as $customizer_control ) {
			$wp_customize->add_setting( $customizer_control['settings'], array(
				'default'           => isset( $this->defaults[ $customizer_control['settings'] ] ) ? $this->defaults[ $customizer_control['settings'] ] : '',
				'sanitize_callback' => array( $this, 'sanitization' ),
				'transport'         => ( isset( $customizer_control['transport'] ) && 'postMessage' === $customizer_control['transport'] ) ? 'postMessage':'refresh',
			) );

			// Check if custom control class is available.
			if ( isset( $customizer_control['control_class'] ) ) {
				$class = $customizer_control['control_class'];

				// Include required custom control class.
				if ( isset( $customizer_control['control_path'] ) ) {
					$path = get_parent_theme_file_path( sprintf( '/lib/customizer/controls/%s.php', $customizer_control['control_path'] ) );
					$path = apply_filters( 'manta_custom_control_class_path', $path, $class );
					if ( ! class_exists( $class ) && file_exists( $path ) ) {
						require_once( $path );
					}
				}

				// Are we using underscores js template for control rendering?
				if ( isset( $customizer_control['js_template'] ) ) {
					$wp_customize->register_control_type( $class );
				}

				if ( class_exists( $class ) ) {
					$wp_customize->add_control( new $class( $wp_customize, $customizer_control['settings'], $customizer_control ) );
				} else {
					$wp_customize->add_control( $customizer_control['settings'], $customizer_control );
				}
			} else {

				$wp_customize->add_control( $customizer_control['settings'], $customizer_control );
			}
		}
	}

	/**
	 * Wrapper function for sanitization class.
	 *
	 * @since 1.0.0
	 *
	 * @param  Mixed                $option  Selected customizer option.
	 * @param  WP_Customize_Setting $setting Setting instance.
	 * @return Mixed Returns sanitized value.
	 */
	public function sanitization( $option, $setting ) {
		return $this->get_sanitized_value( $option, $setting );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @since 1.0.0
	 */
	public function customize_preview_js() {
		wp_enqueue_script(
			'manta_customizer',
			get_template_directory_uri() . '/assets/js/customize-preview.js',
			array( 'customize-preview' ),
			'1.0.0',
			true
		);
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 *
	 * @return object Customizer instance.
	 */
	public static function getInstance() {
		null === self::$instance && self::$instance = new self;
		return self::$instance;
	}
}

add_action( 'customize_register'                 , array( Manta_Customizer::getInstance(), 'customize_register' ) );
add_action( 'customize_preview_init'             , array( Manta_Customizer::getInstance(), 'customize_preview_js' ) );

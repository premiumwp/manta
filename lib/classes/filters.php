<?php
/**
 * Filters to modify default contents
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Filters to add or change theme contents.
 *
 * @since 1.0.0
 */
class Manta_Filters {

	/**
	 * Constructor method intentionally left blank.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {}

	/**
	 * Initiate.
	 *
	 * @since 1.0.0
	 */
	public static function initiate() {
		add_filter( 'body_class'                         , array( __CLASS__, 'add_body_classes' ) );
		add_filter( 'manta_get_attr_header-menu'         , array( __CLASS__, 'add_header_menu_classes' ) );
		add_filter( 'excerpt_length'                     , array( __CLASS__, 'change_excerpt_length' ) );
		add_filter( 'excerpt_more'                       , array( __CLASS__, 'modify_excerpt_teaser' ) );
		add_filter( 'wp_get_attachment_image_attributes' , array( __CLASS__, 'custom_logo_attr' ), 10, 2 );
	}

	/**
	 * Adds custom classes to the array of body class.
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	public static function add_body_classes( $classes ) {

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class for header content alignment.
		if ( 'left' === get_theme_mod( 'manta_header_layout', manta_get_theme_defaults( 'manta_header_layout' ) ) ) {
			$classes[] = 'branding-wrapper';
		} elseif ( 'right' === get_theme_mod( 'manta_header_layout', manta_get_theme_defaults( 'manta_header_layout' ) ) ) {
			$classes[] = 'wrapper-branding';
		}

		// Adds a class for displayed sidebars.
		$no_col = array( 'only-content', 'only-content-full' );
		$three_col = array( 'content-sidebar-sidebar', 'sidebar-sidebar-content', 'sidebar-content-sidebar' );
		if ( count( array_intersect( $classes, $three_col ) ) !== 0 ) {
			$classes[] = 'both-sidebar';
		} elseif ( count( array_intersect( $classes, $no_col ) ) === 0 ) {
			$classes[] = 'one-sidebar';
		} else {
			$classes[] = 'no-sidebar';
		}

		if ( is_home() || is_search() || is_archive() ) {
			// Adds a class to identify excerpt or full content on home, search or archive pages.
			if ( 'excerpt' === get_theme_mod( 'manta_excerpt_option', manta_get_theme_defaults( 'manta_excerpt_option' ) ) ) {
				$classes[] = 'excerpt';
			} else {
				$classes[] = 'full-content';
			}

			// Adds a class to style smaller thumbnails.
			if ( 'small' === get_theme_mod( 'manta_thumbnails_display', manta_get_theme_defaults( 'manta_thumbnails_display' ) ) ) {
				$classes[] = 'small-thumb';
			}
		}

		return $classes;
	}

	/**
	 * Adds custom classes to header menu.
	 *
	 * @since 1.0.0
	 *
	 * @param array $attr attribute values array.
	 * @return array
	 */
	public static function add_header_menu_classes( $attr ) {
		// Adds a class for header menu content alignment.
		if ( 'left' === get_theme_mod( 'manta_header_layout', manta_get_theme_defaults( 'manta_header_layout' ) ) ) {
			$attr['class'] .= ' aligned-menu';
		}

		return $attr;
	}

	/**
	 * Change excerpt length.
	 *
	 * Change excerpt length to be displayed on main, archive and search
	 * pages, default excerpt length is 55.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length excert length.
	 * @return integer
	 */
	public static function change_excerpt_length( $length ) {
		$length = absint( get_theme_mod( 'manta_excerpt_length', manta_get_theme_defaults( 'manta_excerpt_length' ) ) );
		return $length;
	}

	/**
	 * Change Read more text.
	 *
	 * Change excerpt read more link text based on custom text entered in
	 * theme customizer.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function modify_excerpt_teaser() {
		$url  = esc_url( get_permalink() );
		$text = esc_html( get_theme_mod( 'manta_excerpt_teaser', manta_get_theme_defaults( 'manta_excerpt_teaser' ) ) );
		$title = get_the_title();

		if ( 0 === strlen( $title ) ) {
			$screen_reader = '';
		} else {
			$screen_reader = sprintf( '<span class="screen-reader-text">%s</span>', $title );
		}

		$excerpt_teaser = sprintf( '<p class="link-more"><a class="more-link" href="%1$s">%2$s %3$s</a></p>', $url, $text, $screen_reader );
		return $excerpt_teaser;
	}

	/**
	 * Modify custom logo attributes.
	 *
	 * Modify 'itemprop="logo"' and 'alt' attributes to address google strucutral data
	 * and accessibility related errors.
	 *
	 * @since 1.0.0
	 *
	 * @param array   $attr       Attributes for the image markup.
	 * @param WP_Post $attachment Image attachment post.
	 * @return array
	 */
	public static function custom_logo_attr( $attr, $attachment ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id === $attachment->ID ) {
			if ( isset( $attr['itemprop'] ) ) {
				unset( $attr['itemprop'] );
			}
			if ( ! get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ) ) {
				$attr['alt'] = get_bloginfo( 'name', 'display' );
			}
		}

		return $attr;
	}
}

Manta_Filters::initiate();

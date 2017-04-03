<?php
/**
 * Manta theme functions and definitions
 *
 * This file defines content width, add theme support for various wordpress
 * features, load required stylesheets and scripts, register menus and widget
 * areas and load other required files to extend theme functionality.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Manta only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/lib/classes/back-compat.php';
	return;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @since 1.0.0
 *
 * @global int $content_width
 */
function manta_content_width() {

	$content_width = 880;

	/**
	 * Filter maximum allowed width for any content in the theme.
	 *
	 * @since 1.0.0
	 */
	$GLOBALS['content_width'] = apply_filters( 'manta_content_width', $content_width );
}
add_action( 'after_setup_theme' , 'manta_content_width', 0 );

/**
 * Register theme features.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 */
function manta_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'manta' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 880, 540, true );

	// Allows the use of valid HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add custom styles for visual editor to resemble the theme style.
	add_editor_style( array( 'assets/css/editor-style.css', manta_font_url() ) );

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary', 'manta' ),
		'header'    => __( 'Header', 'manta' ),
		'footer'    => __( 'Footer', 'manta' ),
	) );

	/**
	 * Filter custom background args.
	 *
	 * @since 1.0.0
	 */
	$manta_custom_background_args = apply_filters(
		'manta_custom_background_args', array(
			'default-color' => 'f2f2f2',
			'default-image' => '',
		)
	);
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', $manta_custom_background_args );

	/**
	 * Filter custom logo args.
	 *
	 * @since 1.0.0
	 */
	$manta_custom_logo_args = apply_filters(
		'manta_custom_logo_args', array(
			'flex-width'             => true,
			'flex-height'            => true,
			'width'                  => 56,
			'height'                 => 56,
		)
	);
	// Set up the WordPress core custom logo feature.
	add_theme_support( 'custom-logo', $manta_custom_logo_args );

	/**
	 * Filter custom header args.
	 *
	 * @since 1.0.0
	 */
	$manta_custom_header_args = apply_filters(
		'manta_custom_header_args', array(
			'default-image'          => '',
			'width'                  => 1280,
			'height'                 => 340,
			'flex-width'             => false,
			'flex-height'            => true,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => 'manta_header_style',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		)
	);
	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', $manta_custom_header_args );

	/**
	 * Filter support for manta theme specific features.
	 *
	 * @since 1.0.0
	 */
	$manta_theme_support = apply_filters( 'manta_theme_support', array( 'schema', 'featured', 'fonticons' ) );
	foreach ( $manta_theme_support as $support ) {
		// Custom addon support for manta theme.
		add_theme_support( "manta_{$support}" );
	}

	// Load theme specific functions files.
	require_once( get_parent_theme_file_path( '/lib/functions/markup.php' ) );
	require_once( get_parent_theme_file_path( '/lib/functions/defaults.php' ) );
	require_once( get_parent_theme_file_path( '/lib/functions/header-style.php' ) );
	require_once( get_parent_theme_file_path( '/lib/functions/inline-css.php' ) );

	// Load theme specific classes files.
	require_once( get_parent_theme_file_path( '/lib/classes/plugin-support.php' ) );
	require_once( get_parent_theme_file_path( '/lib/classes/display.php' ) );
	require_once( get_parent_theme_file_path( '/lib/classes/filters.php' ) );
	require_once( get_parent_theme_file_path( '/lib/classes/layouts.php' ) );

	// Load theme customizer files.
	require_once( get_parent_theme_file_path( '/lib/customizer/active-callback.php' ) );
	require_once( get_parent_theme_file_path( '/lib/customizer/data.php' ) );
	require_once( get_parent_theme_file_path( '/lib/customizer/sanitization.php' ) );

	// Load theme features files.
	require_if_theme_supports( 'manta_schema'   , get_parent_theme_file_path( '/lib/addon/schema/schema.php' ) );
	require_if_theme_supports( 'manta_featured' , get_parent_theme_file_path( '/lib/addon/featured/featured-post.php' ) );
	require_if_theme_supports( 'manta_fonticons', get_parent_theme_file_path( '/lib/addon/fonticons/svg-icons.php' ) );

	// Load theme customizer initiation file at last.
	require_once( get_parent_theme_file_path( '/lib/customizer/init.php' ) );
}
add_action( 'after_setup_theme' , 'manta_setup', 5 );

/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function manta_widgets_init() {

	$secondary_sidebar_text1 = __( 'Add widgets here to appear in your secondary sidebar.', 'manta' );
	$secondary_sidebar_text2 = __( 'Add at least one widget to primary sidebar before adding widgets here.', 'manta' );

	/**
	 * Filter register widgets args.
	 *
	 * @since 1.0.0
	 */
	$widgets = apply_filters(
		'manta_register_sidebar', array(
			array(
				'name' => __( 'Sidebar-Primary', 'manta' ),
				'id' => 'sidebar-1',
				'description' => __( 'Add widgets here to appear in your primary sidebar.', 'manta' ),
			),
			array(
				'name' => __( 'Sidebar-Secondary', 'manta' ),
				'id' => 'sidebar-2',
				'description' => is_active_sidebar( 'sidebar-1' ) ? $secondary_sidebar_text1 : $secondary_sidebar_text2,
			),
			array(
				'name' => __( 'Header', 'manta' ),
				'id' => 'header',
				'description' => '',
			),
			array(
				'name' => __( 'footer-widget-1', 'manta' ),
				'id' => 'footer-1',
				'description' => '',
			),
			array(
				'name' => __( 'footer-widget-2', 'manta' ),
				'id' => 'footer-2',
				'description' => '',
			),
			array(
				'name' => __( 'footer-widget-3', 'manta' ),
				'id' => 'footer-3',
				'description' => '',
			),
		)
	);
	foreach ( $widgets as $widget ) {
		register_sidebar( array(
			'name'          => $widget['name'],
			'id'            => $widget['id'],
			'description'   => $widget['description'],
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3' . manta_get_attr( 'widget-title' ) . '><span>',
			'after_title'   => '</span></h3>',
		) );
	}
}
add_action( 'widgets_init', 'manta_widgets_init' );

/**
 * Get Google fonts url to register and enqueue.
 *
 * This function incorporates code from Twenty Fifteen WordPress Theme,
 * Copyright 2014-2016 WordPress.org & Automattic.com Twenty Fifteen is
 * distributed under the terms of the GNU GPL.
 *
 * @since 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function manta_font_url() {

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'manta' ) ) {
		$fonts[] = 'Noto Sans:400,600,400italic,600italic';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'manta' ) ) {
		$fonts[] = 'Source Sans Pro:400,600,400italic,600italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	/**
	 * Filter google font url.
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'manta_font_url', $fonts_url );
}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 */
function manta_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'manta_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function manta_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'manta-style', get_stylesheet_uri() );

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'manta-fonts', esc_url( manta_font_url() ), array(), null );

	// Skip link focus fix script.
	wp_enqueue_script( 'manta-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0.0', true );

	// Theme navigation.
	if ( has_nav_menu( 'primary' ) || has_nav_menu( 'header' ) ) {
		$manta_l10n = array(
			'expand'   => __( 'Expand child menu', 'manta' ),
			'collapse' => __( 'Collapse child menu', 'manta' ),
			'icon'     => manta_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
		);
		wp_enqueue_script( 'manta-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0.0', true );
		wp_localize_script( 'manta-navigation', 'mantaScreenReaderText', $manta_l10n );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'manta_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * This function incorporates code from Twenty Seventeen WordPress Theme,
 * Copyright 2016-2017 WordPress.org. Twenty Seventeen is distributed
 * under the terms of the GNU GPL.
 *
 * @since 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function manta_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'manta-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints' , 'manta_resource_hints', 10, 2 );

<?php
/**
 * Display site contents
 *
 * Call appropriate WordPress built-in function or include theme template file
 * to display various site contents.
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Conditionally call display function or include template.
 *
 * @since 1.0.0
 */
class Manta_Display {

	/**
	 * Constructor method intentionally left blank.
	 */
	private function __construct() {}

	/**
	 * Display functions.
	 *
	 * @since 1.0.0
	 */
	public static function initiate() {

		add_action( 'wp_head'                          , array( __CLASS__, 'head' ), 0 );

		// Items to be displayed on site header.
		add_action( 'manta_hook_for_site_header'      , array( __CLASS__, 'skip_link' ), 0 );
		add_action( 'manta_hook_for_header_items'     , array( __CLASS__, 'site_branding' ) );
		add_action( 'manta_hook_for_header_items'     , array( __CLASS__, 'header_extra' ) );
		add_action( 'manta_hook_for_branding'         , array( __CLASS__, 'header_logo' ) );
		add_action( 'manta_hook_for_branding'         , array( __CLASS__, 'header_text' ) );
		add_action( 'manta_hook_for_site_header'      , array( __CLASS__, 'header_items' ) );
		add_action( 'manta_hook_for_site_header'      , array( __CLASS__, 'custom_header' ) );
		add_action( 'manta_hook_for_site_header'      , array( __CLASS__, 'menu_primary' ) );

		// Items to be displayed on site content.
		add_action( 'manta_hook_for_main_loop'        , array( __CLASS__, 'page_header' ) );
		add_action( 'manta_hook_for_main_loop'        , array( __CLASS__, 'loop' ), 15 );
		add_action( 'manta_hook_for_entry_header'     , array( __CLASS__, 'entry_title' ) );
		add_action( 'manta_hook_for_entry_header'     , array( __CLASS__, 'entry_meta' ) );
		add_action( 'manta_hook_for_entry_content'    , array( __CLASS__, 'entry_content' ) );
		add_action( 'manta_hook_bottom_of_entry'      , array( __CLASS__, 'entry_footer' ) );

		add_action( 'manta_hook_after_main_content'   , array( __CLASS__, 'post_pagination' ) );
		add_action( 'manta_hook_on_top_of_entry'      , array( __CLASS__, 'sticky_icon' ) );
		add_action( 'manta_hook_on_top_of_entry'      , array( __CLASS__, 'post_thumbnails' ) );
		add_action( 'manta_hook_on_top_of_entry'      , array( __CLASS__, 'postwrapper_open' ) );
		add_action( 'manta_hook_bottom_of_entry'      , array( __CLASS__, 'postwrapper_close' ) );
		add_action( 'manta_hook_after_entry'          , array( __CLASS__, 'post_author' ) );
		add_action( 'manta_hook_after_entry'          , array( __CLASS__, 'post_navigation' ) );
		add_action( 'get_sidebar'                      , array( __CLASS__, 'sidebar1' ) );
		add_action( 'get_sidebar'                      , array( __CLASS__, 'sidebar2' ) );

		// Items to be displayed in post comments section.
		add_action( 'manta_hook_on_top_of_comments'   , array( __CLASS__, 'comment_title' ) );
		add_action( 'manta_hook_on_top_of_comments'   , array( __CLASS__, 'comment_navigation' ) );
		add_action( 'manta_hook_bottom_of_comments'   , array( __CLASS__, 'comment_navigation' ) );

		// Items to be displayed on site footer.
		add_action( 'manta_hook_before_footer'        , array( __CLASS__, 'footer_widgets' ) );
		add_action( 'manta_hook_for_footer_items'     , array( __CLASS__, 'menu_footer' ) );
		add_action( 'manta_hook_for_footer_items'     , array( __CLASS__, 'footer_items' ) );

		if ( is_active_sidebar( 'header' ) ) {
			add_action( 'manta_hook_for_header_extra' , array( __CLASS__, 'header_widget' ) );
		}

		if ( has_nav_menu( 'header' ) ) {
			add_action( 'manta_hook_for_header_extra' , array( __CLASS__, 'menu_header' ) );
		}
	}

	/**
	 * Include head contents display template.
	 *
	 * @since 1.0.0
	 */
	public static function head() {
		get_template_part( 'template-parts/head/head' );
	}

	/**
	 * Include skip link display template.
	 *
	 * @since 1.0.0
	 */
	public static function skip_link() {
		get_template_part( 'template-parts/header/skiplink' );
	}

	/**
	 * Include site branding display template.
	 *
	 * @since 1.0.0
	 */
	public static function site_branding() {
		get_template_part( 'template-parts/header/branding' );
	}

	/**
	 * Include custom logo display function.
	 *
	 * @since 1.0.0
	 */
	public static function header_logo() {
		the_custom_logo();
	}

	/**
	 * Include header text display template.
	 *
	 * @since 1.0.0
	 */
	public static function header_text() {
		get_template_part( 'template-parts/header/text' );
	}

	/**
	 * Include header items display template.
	 *
	 * @since 1.0.0
	 */
	public static function header_items() {
		if ( has_action( 'manta_hook_for_header_items' ) ) {
			get_template_part( 'template-parts/header/items' );
		}
	}

	/**
	 * Include header extra items display template.
	 *
	 * @since 1.0.0
	 */
	public static function header_extra() {
		if ( has_action( 'manta_hook_for_header_extra' ) ) {
			get_template_part( 'template-parts/header/extra' );
		}
	}

	/**
	 * Include header widget display template.
	 *
	 * @since 1.0.0
	 */
	public static function header_widget() {
		if ( is_active_sidebar( 'header' ) ) {
			get_template_part( 'template-parts/header/widget' );
		}
	}

	/**
	 * Conditionally include header image display template.
	 *
	 * @since 1.0.0
	 */
	public static function custom_header() {
		if ( get_header_image() && is_front_page() ) {
			the_custom_header_markup();
		}
	}

	/**
	 * Include header menu display template.
	 *
	 * @since 1.0.0
	 */
	public static function menu_header() {
		get_template_part( 'template-parts/menu/header' );
	}

	/**
	 * Conditionally include primary menu display template.
	 *
	 * @since 1.0.0
	 */
	public static function menu_primary() {
		if ( has_nav_menu( 'primary' ) ) {
			get_template_part( 'template-parts/menu/primary' );
		}
	}

	/**
	 * Conditionally include footer menu display template.
	 *
	 * @since 1.0.0
	 */
	public static function menu_footer() {
		if ( has_nav_menu( 'footer' ) ) {
			get_template_part( 'template-parts/menu/footer' );
		}
	}

	/**
	 * Display sticky icon for sticky post.
	 *
	 * @since 1.0.0
	 */
	public static function sticky_icon() {
		if ( is_sticky() && is_home() ) {
			manta_svg( array( 'icon' => 'thumb-tack' ) );
		}
	}

	/**
	 * Conditionally include post thumbnail display template.
	 *
	 * @since  1.0.0
	 */
	public static function post_thumbnails() {
		// Return if thumbnail is not available or not to be displayed at all.
		if ( ( 'none' === get_theme_mod( 'manta_thumbnails_display', manta_get_theme_defaults( 'manta_thumbnails_display' ) ) )
			|| ! has_post_thumbnail()
			|| post_password_required() ) {
			return;
		}

		// Conditions where full post content is being displayed.
		if ( ( is_singular()
			|| 'excerpt' !== get_theme_mod( 'manta_excerpt_option', manta_get_theme_defaults( 'manta_excerpt_option' ) )
			|| has_post_format( array( 'aside', 'quote', 'status', 'video', 'audio', 'gallery', 'image' ) ) ) ) {

			// Check whether thumbnail is to be displayed for full post content.
			if ( ( '' !== get_theme_mod( 'manta_thumbnails_on_single', manta_get_theme_defaults( 'manta_thumbnails_on_single' ) ) ) ) {

				// Include thumbnail display template for full post content.
				get_template_part( 'template-parts/entry/thumbnail' );
			}
			// Condition where post excerpt is being displayed.
		} else {

			// Include thumbnail display template for post excerpts.
			get_template_part( 'template-parts/entry/thumbnail' );
		}
	}

	/**
	 * Post Content Wrapper open.
	 *
	 * @since  1.0.0
	 */
	public static function postwrapper_open() {
		echo '<div class="post-wrapper">';
	}

	/**
	 * Post Content Wrapper close.
	 *
	 * @since  1.0.0
	 */
	public static function postwrapper_close() {
		echo '</div>';
	}

	/**
	 * Include page header display template.
	 *
	 * @since  1.0.0
	 */
	public static function page_header() {
		get_template_part( 'template-parts/content/page-header' );
	}

	/**
	 * Include main loop display template.
	 *
	 * @since  1.0.0
	 */
	public static function loop() {
		get_template_part( 'template-parts/content/loop' );
	}

	/**
	 * Conditionally include header post meta display template.
	 *
	 * @since  1.0.0
	 */
	public static function entry_meta() {
		if ( 'post' === get_post_type() ) {
			get_template_part( 'template-parts/entry/meta' );
		}
	}

	/**
	 * Include post entry title display template.
	 *
	 * @since  1.0.0
	 */
	public static function entry_title() {
		get_template_part( 'template-parts/entry/title' );
	}

	/**
	 * Include post content display template.
	 *
	 * @since  1.0.0
	 */
	public static function entry_content() {
		get_template_part( 'template-parts/entry/content' );
	}

	/**
	 * Conditionally include footer post meta display template.
	 *
	 * @since  1.0.0
	 */
	public static function entry_footer() {
		get_template_part( 'template-parts/entry/footer' );
	}

	/**
	 * Conditionally include post author display template.
	 *
	 * @since  1.0.0
	 */
	public static function post_author() {
		if ( is_singular() && '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/entry/author' );
		}
	}

	/**
	 * Conditionally include post pagination display template.
	 *
	 * Display posts pagination on home, archive and search pages.
	 *
	 * @since  1.0.0
	 */
	public static function post_pagination() {
		if ( ! is_singular() ) {
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous', 'manta' ),
				'next_text'          => __( 'Next', 'manta' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'manta' ) . ' </span>',
			) );
		}
	}

	/**
	 * Conditionally include post navigation display template.
	 *
	 * Display next and previous post navigation for single posts.
	 *
	 * @since  1.0.0
	 */
	public static function post_navigation() {
		if ( is_singular( 'post' ) ) {
			the_post_navigation( array(
				'next_text' => '<span' . manta_get_attr( 'meta-nav' ) . ' aria-hidden="true">' . __( 'Next', 'manta' ) . '</span>
					<span class="screen-reader-text">' . __( 'Next post:', 'manta' ) . '</span>
					<span' . manta_get_attr( 'post-title' ) . '>%title</span>',
				'prev_text' => '<span' . manta_get_attr( 'meta-nav' ) . ' aria-hidden="true">' . __( 'Previous', 'manta' ) . '</span>
					<span class="screen-reader-text">' . __( 'Previous post:', 'manta' ) . '</span>
					<span' . manta_get_attr( 'post-title' ) . '>%title</span>',
			) );
		}
	}

	/**
	 * Conditionally include primary sidebar widgets display template.
	 *
	 * @since  1.0.0
	 */
	public static function sidebar1() {
		$classes = Manta_Layouts::get_instance()->layout_css_classes( array() );
		$no_col  = array( 'only-content', 'only-content-full', 'two-col-grid', 'three-col-grid' );

		// Conditionally display primary sidebar.
		if ( count( array_intersect( $classes, $no_col ) ) === 0 ) {
			get_template_part( 'template-parts/sidebar/sidebar1' );
		}
	}

	/**
	 * Conditionally include secondary sidebar widgets display template.
	 *
	 * @since  1.0.0
	 */
	public static function sidebar2() {
		$classes = Manta_Layouts::get_instance()->layout_css_classes( array() );
		$three_col = array( 'content-sidebar-sidebar', 'sidebar-sidebar-content', 'sidebar-content-sidebar' );

		// Return if secondary sidebar is not to be displayed.
		if ( count( array_intersect( $classes, $three_col ) ) === 0 ) {
			return;
		}

		// Display secondary sidebar.
		get_template_part( 'template-parts/sidebar/sidebar2' );
	}

	/**
	 * Include comment title display template.
	 *
	 * @since  1.0.0
	 */
	public static function comment_title() {
		get_template_part( 'template-parts/comment/title' );
	}

	/**
	 * Include template to display pingback, trackback or comment.
	 *
	 * @since  1.0.0
	 *
	 * @param object $comment comment object.
	 */
	public static function comments( $comment ) {
		$comment_type = get_comment_type( $comment->comment_ID );
		if ( 'pingback' === $comment_type || 'trackback' === $comment_type ) {
			get_template_part( 'template-parts/comment/ping' );
		} else {
			get_template_part( 'template-parts/comment/comment' );
		}
	}

	/**
	 * Conditionally include comments navigation display template.
	 *
	 * @since  1.0.0
	 */
	public static function comment_navigation() {
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {// Are there comments to navigate through?
			get_template_part( 'template-parts/comment/navigation' );
		}
	}

	/**
	 * Conditionally include footer widgets display template.
	 *
	 * @since  1.0.0
	 */
	public static function footer_widgets() {
		if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) {
			get_template_part( 'template-parts/footer/widgets' );
		}
	}

	/**
	 * Include template to display footer widgets
	 *
	 * @since  1.0.0
	 */
	public static function footer_items() {
		get_template_part( 'template-parts/footer/items' );
	}
}

Manta_Display::initiate();

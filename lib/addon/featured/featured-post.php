<?php
/**
 * Display featured post
 *
 * @package Manta
 * @since 1.0.0
 */

/**
 * Class for displaying featured post.
 *
 * @since  1.0.0
 */
class Manta_Featured_Post {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Holds featured post count.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var int
	 */
	protected $featured_post_count = 0;

	/**
	 * Holds top three sticky posts.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array
	 */
	protected $sticky_posts = array();

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {

		// Get all sticky posts.
		$sticky = get_option( 'sticky_posts' );

		if( $sticky ) {
			// Sort the stickies with the newest ones at the top.
			rsort( $sticky );

			// Get the 3 newest stickies.
			$this->sticky_posts = array_slice( $sticky, 0, 3 );
		}
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.0
	 */
	public static function init() {
		add_action( 'manta_hook_on_top_of_site_content' , array( Manta_Featured_Post::get_instance(), 'render_featured_post' ) );
		add_action( 'pre_get_posts'                     , array( Manta_Featured_Post::get_instance(), 'modify_main_query' ) );
		remove_action( 'manta_hook_on_top_of_entry'     , array( 'Manta_Display', 'sticky_icon' ) );
		add_filter( 'manta_get_attr_featured-content'   , array( Manta_Featured_Post::get_instance(), 'style_class' ) );
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 *
	 * @return object Customizer instance.
	 */
	public static function get_instance() {
		null === self::$instance and self::$instance = new self;
		return self::$instance;
	}

	/**
	 * Display featured post.
	 *
	 * @since  1.0.0
	 */
	public function render_featured_post() {

		if ( ! is_home() || ! $this->sticky_posts || is_paged() ) {
			return;
		}

		$args = array(
			'ignore_sticky_posts' => 1,
			'post__in'            => $this->sticky_posts,
		);

		$featured_posts = new WP_Query( $args );
		$this->featured_post_count = $featured_posts->post_count;

		if ( $featured_posts->have_posts() ) :?>
			<aside id="featured-content"<?php manta_attr( 'featured-content' ); ?>>
				<?php
				while ( $featured_posts->have_posts() ) : $featured_posts->the_post();

					if ( 1 === $featured_posts->post_count ) {
						$thumbnail_url = get_the_post_thumbnail_url( $featured_posts->post->ID, 'large' );
					} elseif ( $featured_posts->post_count > 1 ) {
						$thumbnail_url = get_the_post_thumbnail_url( $featured_posts->post->ID, 'post-thumbnail' );
					}

					$thumb_style = '';
					if ( $thumbnail_url ) {
						$thumb_style = sprintf( ' style="background-image: url(%s)"', esc_url( $thumbnail_url ) );
					}
				?>
					<div<?php manta_attr( 'featured-posts' ); ?><?php echo $thumb_style; ?>>
						<?php the_title( sprintf( '<a class="featured-post-link" href="%1$s"><span class="screen-reader-text">', esc_url( get_permalink() ) ), '</span></a>' );?>
						<div<?php manta_attr( 'featured-wrapper' ); ?>>
							<div<?php manta_attr( 'featured-head' ); ?>>
								<?php apply_filters( 'manta_featured_title_text', esc_html_e( 'Featured', 'manta' ) ); ?>
							</div><!-- .featured-head -->
							<?php get_template_part( 'lib/addon/featured/content' );?>
						</div><!-- .featured-wrapper -->
						
					</div><!-- #featured-posts -->
				<?php
				endwhile;

				// Restore original Post Data.
				wp_reset_postdata();
				?>
			</aside><!-- #featured-content --><?php
		endif;
	}

	/**
	 * Modify main query.
	 *
	 * Modify main query to prevent showing sticky posts at the top. The 'sticky posts' will
	 * still show in their natural position (e.g. by date)
	 *
	 * @param object $query The WP_Query instance (passed by reference).
	 * @since  1.0.0
	 */
	public function modify_main_query( $query ) {

		if ( $query->is_home() && $query->is_main_query() && ! $query->is_paged ) {
			$query->query_vars['ignore_sticky_posts'] = 1;
		}
	}

	/**
	 * Display featured post thumbnail image.
	 *
	 * @since  1.0.0
	 *
	 * @param array $attr attribute values array.
	 * @return array
	 */
	public function style_class( $attr ) {

		if ( 2 === $this->featured_post_count ) {
			$attr['class'] .= ' multiple-featured-posts two-featured';
		} elseif ( 3 === $this->featured_post_count ) {
			$attr['class'] .= ' multiple-featured-posts three-featured';
		}

		return $attr;
	}
}

Manta_Featured_Post::init();

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
	 * Constructor method.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.0
	 */
	public static function init() {
		add_action( 'manta_hook_on_top_of_site_content' , array( Manta_Featured_Post::get_instance(), 'render_featured_post' ) );
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

		if ( ! is_home() ) {
			return;
		}

		$args = array(
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => 1,
			'category_name'       => 'featured',
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
						<div<?php manta_attr( 'featured-wrapper' ); ?>>
							<div<?php manta_attr( 'featured-head' ); ?>>
								<?php apply_filters( 'manta_featured_title_text', _e( 'Featured', 'manta' ) ); ?>
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

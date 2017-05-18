<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php manta_attr( 'post' ); ?>>
	<div class="post-wrapper">
		<header<?php manta_attr( 'entry-header' ); ?>>
			<?php
			/** This action is documented in template-parts/content.php */
			do_action( 'manta_hook_for_entry_header' );?>
		</header><!-- .entry-header -->

		<div<?php manta_attr( 'entry-content' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->

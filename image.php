<?php
/**
 * The template for displaying image attachments
 *
 * @package Manta
 * @since 1.0
 */

get_header(); ?>

	<div<?php manta_attr( 'content-sidebar-wrap' ); ?>>

		<div id="primary"<?php manta_attr( 'content-area' ); ?>>

			<?php
			/**
			 * Fires immediately after opening of primary content area.
			 *
			 * @since 1.0.0
			 */
			do_action( 'manta_hook_before_main_content' ); ?>

			<main id="main" role="main"<?php manta_attr( 'site-main' ); ?>>


				<?php
				/**
				 * Fires immediately before executing main loop.
				 *
				 * @since 1.0.0
				 */
				do_action( 'manta_hook_for_main_loop' );?>

			</main><!-- #main -->

			<?php
			/**
			 * Fires immediately before closing primary content area.
			 *
			 * @since 1.0.0
			 */
			do_action( 'manta_hook_after_main_content' ); ?>

		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .content-sidebar-wrap -->

<?php
get_footer();

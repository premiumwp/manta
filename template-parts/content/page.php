<?php
/**
 * Template part for displaying page content
 *
 * @package Manta
 * @since 1.0.0
 */

/** This action is documented in template-parts/content.php */
do_action( 'manta_hook_before_entry' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php manta_attr( 'post' ); ?>>

	<?php
	/** This action is documented in template-parts/content.php */
	do_action( 'manta_hook_on_top_of_entry' ); ?>

	<header<?php manta_attr( 'entry-header' ); ?>>

		<?php
		/** This action is documented in template-parts/content.php */
		do_action( 'manta_hook_for_entry_header' );?>

	</header><!-- .entry-header -->

	<?php
	/** This action is documented in template-parts/content.php */
	do_action( 'manta_hook_before_entry_content' ); ?>

	<div<?php manta_attr( 'entry-content' ); ?>>

		<?php
		/** This action is documented in template-parts/content.php */
		do_action( 'manta_hook_for_entry_content' );?>

	</div><!-- .entry-content -->

	<?php
	/** This action is documented in template-parts/content.php */
	do_action( 'manta_hook_after_entry_content' ); ?>

	<?php
	/** This action is documented in template-parts/content.php */
	do_action( 'manta_hook_bottom_of_entry' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/** This action is documented in template-parts/content.php */
do_action( 'manta_hook_after_entry' );

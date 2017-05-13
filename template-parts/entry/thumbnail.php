<?php
/**
 * The template part for displaying post thumbnails
 *
 * @package Manta
 * @since 1.0.0
 */

if ( is_singular() ) {
	?>
	<div <?php manta_attr( 'single-thumb' ); ?>>

		<?php the_post_thumbnail( 'large', array(
				'alt'   => the_title_attribute( 'echo=0' ),
				'class' => 'aligncenter',
		) ); ?>

	</div>
	<?php
} else {

	// Use thumbnail image as background image for center cropping (only if small thumbnail option selected).
	$manta_thumb_style = '';
	if ( 'small' === get_theme_mod( 'manta_thumbnails_display', manta_get_theme_defaults( 'manta_thumbnails_display' ) )
		|| 'small_right' === get_theme_mod( 'manta_thumbnails_display', manta_get_theme_defaults( 'manta_thumbnails_display' ) ) ) {
		$manta_thumbnail_url = get_the_post_thumbnail_url();
		if ( $manta_thumbnail_url ) {
			$manta_thumb_style = sprintf( ' style="background-image: url(%s)"', esc_url( $manta_thumbnail_url ) );
		}
	}

	/*
	 * Even though post thumbnal link is a focusable element and screen-reader will
	 * announce as 'blank' if we have 'area-hidden= "true"' in it. But, here
	 * area-hidden is use as a non-verbose option to minimize repetition of data.
	 * https://core.trac.wordpress.org/ticket/30076#comment:13
	 */
	?>
	<a href="<?php the_permalink(); ?>" <?php manta_attr( 'post-thumbnail' ); ?> aria-hidden="true" <?php echo $manta_thumb_style ?>>

		<?php the_post_thumbnail( 'post-thumbnail', array(
				'alt'   => the_title_attribute( 'echo=0' ),
				'class' => 'thumbnails aligncenter',
		) ); ?>

	</a>
	<?php
}

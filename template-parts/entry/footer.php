<?php
/**
 * The template part for displaying footer meta information for current post
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<?php if ( is_singular( 'post' ) ) : ?>

	<footer<?php manta_attr( 'entry-footer' ); ?>>

		<?php
		if ( 1 === get_theme_mod( 'manta_show_cat', manta_get_theme_defaults( 'manta_show_cat' ) ) ):
			get_template_part( 'template-parts/meta/categories' );
		endif;
		?>

		<?php
		if ( 1 === get_theme_mod( 'manta_show_tags', manta_get_theme_defaults( 'manta_show_tags' ) ) ):
			get_template_part( 'template-parts/meta/tags' );
		endif;
		?>

	</footer><!-- .entry-footer -->

<?php elseif ( is_singular() ) : ?>

	<footer<?php manta_attr( 'entry-footer' ); ?>>

		<?php
		get_template_part( 'template-parts/meta/edit-link' );
		get_template_part( 'template-parts/meta/attachment' );
		?>

	</footer><!-- .entry-footer -->

<?php endif;

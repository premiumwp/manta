<?php
/**
 * The template part for displaying header meta information for current post
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<div<?php manta_attr( 'entry-meta' ) ?>>

	<?php
	if ( 1 === get_theme_mod( 'manta_show_date', manta_get_theme_defaults( 'manta_show_date' ) ) ):
		get_template_part( 'template-parts/meta/date' );
	endif;
	?>

	<?php
	if ( 1 === get_theme_mod( 'manta_show_author', manta_get_theme_defaults( 'manta_show_author' ) ) ):
		get_template_part( 'template-parts/meta/author' );
	endif;
	?>

	<?php
	if ( 1 === get_theme_mod( 'manta_show_comment_link', manta_get_theme_defaults( 'manta_show_comment_link' ) ) ):
		get_template_part( 'template-parts/meta/comment-link' );
	endif;

	get_template_part( 'template-parts/meta/edit-link' );
	?>

</div>

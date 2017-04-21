<?php
/**
 * The template part for displaying entry content for current post
 *
 * @package Manta
 * @since 1.0.0
 */

/*
 * Display excerpt if : It is home or archive page and show full content
 * option is not selected from customizer options and post format is not
 * aside, quote or status. Else display full content.
 */
if ( ( is_home() || is_archive() ) && 'content' !== get_theme_mod( 'manta_excerpt_option', manta_get_theme_defaults( 'manta_excerpt_option' ) )
	&& ! has_post_format( array( 'aside', 'quote', 'status', 'video', 'audio', 'gallery', 'image' ) )
	&& ! post_password_required() ) {
	the_excerpt();
} else {
	the_content( sprintf(
		esc_html__( 'Continue reading %s', 'manta' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	) );

	/*
	 * Displays page-links for paginated posts (i.e. if the <!--nextpage-->
	 * Quicktag has been used for one or more times in a single post).
	 */
	wp_link_pages( array(
		'before' => '<div' . manta_get_attr( 'page-links' ) . '>' . esc_html__( 'Pages:', 'manta' ),
		'after'  => '</div>',
	) );
}

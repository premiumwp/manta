<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Manta
 * @since 1.0.0
 */

while ( have_posts() ) : the_post();

	if ( is_page() ) {

		/**
		 * Include the Post-Format-specific template for the content.
		 */
		get_template_part( 'template-parts/content/page' );
	} elseif ( is_search() ) {

		/**
		 * Include the Post-Format-specific template for the content.
		 */
		get_template_part( 'template-parts/content/search' );
	} else {

		/**
		 * Include the Post-Format-specific template for the content.
		 */
		get_template_part( 'template-parts/content/content' );
	}

	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) ) {
		// If comments are open or we have at least one comment, load up the comment template.
		comments_template();
	}

endwhile;

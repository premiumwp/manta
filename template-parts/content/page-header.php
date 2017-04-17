<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Manta
 * @since 1.0.0
 */

if ( is_home() && ! is_front_page() ) :?>

	<header<?php manta_attr( 'page-header', array( 'class' => 'screen-reader-text' ) ); ?>>
		<h1<?php manta_attr( 'page-title');?>><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->

<?php
elseif ( is_archive() ) :?>
	<header<?php manta_attr( 'page-header' ); ?>>
		<?php
		the_archive_title( sprintf( '<h1%1$s>', manta_get_attr( 'page-title' ) ), '</h1>' );
		the_archive_description( sprintf( '<div%1$s>', manta_get_attr( 'taxonomy-description' ) ), '</div>' );
		?>
	</header><!-- .page-header -->

<?php
elseif ( is_search() ) :?>

	<header<?php manta_attr( 'page-header' ); ?>>
		<h1<?php manta_attr( 'page-title' ); ?>>
			<?php printf( __( 'Search Results for: %s', 'manta' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
	</header><!-- .page-header -->

<?php
endif;

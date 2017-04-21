<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<aside id="secondary" aria-label="Primary Sidebar" role="complementary"<?php manta_attr( 'primary-sidebar' ); ?>>
	<h2 class="screen-reader-text"><?php echo esc_html__( 'Primary Sidebar', 'manta' ); ?></h2>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

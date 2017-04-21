<?php
/**
 * The sidebar containing the secondary widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<aside id="tertiary" aria-label="Secondary Sidebar" role="complementary"<?php manta_attr( 'secondary-sidebar' ); ?>>
	<h2 class="screen-reader-text"><?php echo esc_html__( 'Secondary Sidebar', 'manta' ); ?></h2>
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #tertiary -->

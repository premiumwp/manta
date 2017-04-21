<?php
/**
 * Template part for displaying footer navigation menu
 *
 * @package Manta
 * @since 1.0.0
 */

?>
<nav id="footer-menu" aria-label="<?php esc_attr_e( 'Footer Menu', 'manta' ); ?>" role="navigation"<?php manta_attr( 'footer-menu' );?>>
	<h2 class="screen-reader-text"><?php printf( esc_html__( 'Footer Menu', 'manta' ) );?></h2>
	<?php
	wp_nav_menu(
		array(
			'depth'           => 1,
			'theme_location'  => 'footer',
			'menu_id'         => 'footer-nav',
			'menu_class'      => 'nav-menu',
			'container_class' => 'wrap',
		)
	);
	?>
</nav><!-- #footer-menu -->

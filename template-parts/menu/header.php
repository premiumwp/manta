<?php
/**
 * Template part for displaying header navigation menu
 *
 * @package Manta
 * @since 1.0.0
 */

?>
<nav id="header-menu" aria-label="<?php esc_attr_e( 'Header Menu', 'manta' ); ?>" role="navigation"<?php manta_attr( 'header-menu' );?>>
	<h2 class="screen-reader-text"><?php printf( __( 'Header Menu', 'manta' ) );?></h2>
	<button aria-controls="header-nav" aria-expanded="false"<?php manta_attr( 'menu-toggle' );?>>
		<?php
		manta_svg( array( 'icon' => 'bars' ) );
		_e( 'Menu', 'manta' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'header',
			'menu_id'        => 'header-nav',
			'menu_class'     => 'nav-menu',
			'container'      => false,
		)
	);
	?>

</nav><!-- #secondary-menu -->

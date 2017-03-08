<?php
/**
 * Template part for displaying primary navigation menu
 *
 * @package Manta
 * @since 1.0.0
 */

?>
<nav id="main-navigation" aria-label="Primary Menu"<?php manta_attr( 'main-navigation' );?>>
	<h2 class="screen-reader-text"><?php printf( __( 'Main Navigation', 'manta' ) );?></h2>
	<button aria-controls="primary-menu" aria-expanded="false"<?php manta_attr( 'menu-toggle' );?>>
		<?php
		manta_svg( array( 'icon' => 'bars' ) );
		_e( 'Menu', 'manta' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'nav-menu',
			'container_class' => 'wrap',
		)
	);
	?>
</nav><!-- #main-navigation -->

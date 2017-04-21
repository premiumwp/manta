<?php
/**
 * Template part for displaying footer widgets
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<aside<?php manta_attr( 'footer-widgets' ); ?> aria-label="Footer Widgets">
	<h2 class="screen-reader-text"><?php echo esc_html__( 'Footer Widgets', 'manta' ); ?></h2>

	<div<?php manta_attr( 'wrap' ); ?>>
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

			<div<?php manta_attr( 'footer-widget' ); ?>>
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>

			<div<?php manta_attr( 'footer-widget' ); ?>>
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
		
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			
			<div<?php manta_attr( 'footer-widget' ); ?>>
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		
		<?php endif; ?>
	</div>

</aside>

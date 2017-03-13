<?php
/**
 * Template part for displaying footer items
 *
 * @package Manta
 * @since 1.0.0
 */

$manta_copyright_info = get_theme_mod( 'manta_copyright', manta_get_theme_defaults( 'manta_copyright' ) );
?>

<div<?php manta_attr( 'footer-items' ); ?>>

	<div<?php manta_attr( 'wrap' ); ?>>
		
		<?php // Display Copyright text. ?>
		<div<?php manta_attr( 'copyright-text' ); ?>>
			<?php if ( $manta_copyright_info ) : ?>
				<p><?php echo implode( '<br/>', array_map( 'esc_textarea', explode( "\n", $manta_copyright_info ) ) ); ?></p>
			<?php else : ?>
				<p><?php bloginfo(); ?> &copy; <?php echo date_i18n( __( 'Y', 'manta' ) ); ?> . <?php _e( 'All Rights Reserved', 'manta' ); ?></p>
			<?php endif; ?>
		</div><!-- .copyright-text -->

		<?php // Display site credit text. ?>
		<div<?php manta_attr( 'site-credit' ); ?>>
			<?php
			printf(
				__( 'Theme by %1$s', 'manta' ),
				// Note: URI is escaped via `WP_Theme::markup_header()`.
				'<a href="' . wp_get_theme( get_template() )->display( 'AuthorURI' ) . '" rel="nofollow">PremiumWP</a>'
			);
			?>
		</div><!-- .site-credit -->

	</div><!-- .wrap -->

</div><!-- .footer-items -->

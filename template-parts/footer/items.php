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
			<?php echo manta_render_copyright_info(); ?>
		</div><!-- .copyright-text -->

		<?php // Display site credit text. ?>
		<div<?php manta_attr( 'site-credit' ); ?>>
			<?php
			printf(
				esc_html__( 'Powered by %1$s', 'manta' ),
				'<a href="' . esc_url( __( 'https://wordpress.org/', 'manta' ) ) . '">WordPress</a>'
			);
			?>
			<span class="sep"> | </span>
			<?php
			printf(
				esc_html__( 'Theme by %1$s', 'manta' ),
				// Note: URI is escaped via `WP_Theme::markup_header()`.
				'<a href="' . wp_get_theme( get_template() )->display( 'AuthorURI' ) . '" rel="designer">PremiumWP</a>'
			);
			?>
		</div><!-- .site-credit -->

	</div><!-- .wrap -->

</div><!-- .footer-items -->

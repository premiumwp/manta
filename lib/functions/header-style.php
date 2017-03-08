<?php
/**
 * Styling of header image and text
 *
 * @package Manta
 * @since 1.0.0
 */

if ( ! function_exists( 'manta_header_style' ) ) {

	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @since 1.0.0
	 */
	function manta_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) {
			?>
			.title-area {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
			// If the user has set a custom color for the text use that.
			} else {
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			<?php
			}
			?>
		</style>
		<?php
	}
}

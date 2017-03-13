<?php
/**
 * The template part for displaying footer meta information for current post
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<?php if ( is_singular( 'post' ) ) : ?>

	<footer<?php manta_attr( 'entry-footer' ); ?>>

		<?php $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'manta' ) ); ?>
		<?php if ( $categories_list ) : ?>
			<span<?php manta_attr( 'cat-links' ) ?>>
				<?php
				printf( __( 'Filed Under: ', 'manta' ) );
				echo $categories_list;
				?>
			</span>
		<?php endif; ?>

		<?php $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'manta' ) ); ?>
		<?php if ( $tags_list ) : ?>
			<span<?php manta_attr( 'tags-links' ) ?>>
				<?php
				printf( __( 'Tagged With: ', 'manta' ) );
				echo $tags_list;
				?>
			</span>
		<?php endif;?>

	</footer><!-- .entry-footer -->

<?php elseif ( is_singular() ) : ?>

	<footer<?php manta_attr( 'entry-footer' ); ?>>

		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'manta' ),
				get_the_title()
			),
			'<span' . manta_get_attr( 'edit-link' ) . '>',
			'</span>'
		);
		
		if ( is_attachment() && wp_attachment_is_image() ) {
			// Retrieve attachment metadata.
			$manta_metadata = wp_get_attachment_metadata();

			printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
				_x( 'Full size', 'Used before full size attachment link.', 'manta' ),
				esc_url( wp_get_attachment_url() ),
				$manta_metadata['width'],
				$manta_metadata['height']
			);
		}
		?>

	</footer><!-- .entry-footer -->

<?php endif;

<?php
/**
 * The template part for displaying header meta information for current post
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<div<?php manta_attr( 'entry-meta' ) ?>>

	<span<?php manta_attr( 'posted-on' ) ?>>
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) :?>
				<time datetime="<?php the_modified_date( DATE_W3C ) ?>"<?php manta_attr( 'modified-entry-date' )?>>
					<?php the_modified_date(); ?>
				</time>
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"<?php manta_attr( 'entry-date' )?>>
					<?php echo esc_html( get_the_date() ); ?>
				</time>
			<?php else : ?>
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ) ?>"<?php manta_attr( 'entry-date' )?>>
					<?php echo esc_html( get_the_date() ); ?>
				</time>
			<?php endif;?>
		</a>
	</span>

	<span<?php manta_attr( 'byline' ) ?>>
		<?php esc_html_e( 'By', 'manta' ); ?>
		<span<?php manta_attr( 'author' ) ?>>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"<?php manta_attr( 'url' ) ?>>
				<span<?php manta_attr( 'name' ) ?>> <?php the_author(); ?></span>
			</a>
		</span>
	</span>
	
	<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<span<?php manta_attr( 'comments-link' ) ?>>
			<?php comments_popup_link(
				sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'manta' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() )
			);?>
		</span>
	<?php endif; ?>

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
	?>

</div>

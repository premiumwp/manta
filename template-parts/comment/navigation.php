<?php
/**
 * The template part for displaying post comment navigation
 *
 * @package Manta
 * @since 1.0.0
 */

$manta_prev_link = get_previous_comments_link();
$manta_next_link = get_next_comments_link();
?>

<nav id="comment-nav" <?php manta_attr( 'comment-navigation' ); ?>>
	<h2 class="screen-reader-text"><?php printf( __( 'Comment navigation', 'manta' ) );?></h2>

	<div<?php manta_attr( 'nav-links' ); ?>>
		<?php if ( $manta_prev_link ) : ?>
			<div<?php manta_attr( 'nav-previous' ); ?>>
				<?php echo $manta_prev_link;?>
			</div>
		<?php endif; ?>

		<?php if ( $manta_next_link ) : ?>
			<div<?php manta_attr( 'nav-next' ); ?>>
				<?php echo $manta_next_link;?>
			</div>
		<?php endif; ?>
	</div>
</nav>

<?php
/**
 * The template part for displaying post comment title
 *
 * @package Manta
 * @since 1.0.0
 */

?>

<h2<?php manta_attr( 'comments-title' ) ?>>
	<?php
	$comments_number = get_comments_number();
	if ( '1' === $comments_number ) {
		/* translators: %s: post title */
		printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'manta' ), get_the_title() );
	} else {
		printf(
			/* translators: 1: number of comments, 2: post title */
			_nx(
				'%1$s Reply to &ldquo;%2$s&rdquo;',
				'%1$s Replies to &ldquo;%2$s&rdquo;',
				$comments_number,
				'comments title',
				'manta'
			),
			number_format_i18n( $comments_number ),
			get_the_title()
		);
	}
	?>
</h2>

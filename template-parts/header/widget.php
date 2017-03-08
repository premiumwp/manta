<?php
/**
 * Template part for displaying header widgets
 *
 * @package Manta
 * @since 1.0.0
 */

?>
<div<?php manta_attr( 'header-widget' ); ?>>

	<?php
	// Display header widgets.
	dynamic_sidebar( 'header' ); ?>

</div>

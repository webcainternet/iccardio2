<?php
/**
 * Thumbnails configuration.
 *
 * @package __Tm
 */

add_action( 'after_setup_theme', 'madeleine_register_image_sizes', 5 );
function madeleine_register_image_sizes() {
	set_post_thumbnail_size( 770, 560, true );

	// Registers a new image sizes.
	add_image_size( 'madeleine-thumb-s', 116, 116, true );
	add_image_size( 'madeleine-thumb-180', 180, 180, true );
	add_image_size( 'madeleine-thumb-270', 270, 270, true );
	add_image_size( 'madeleine-thumb-m', 385, 255, true );
	add_image_size( 'madeleine-thumb-post-img', 470, 270, true );
	add_image_size( 'madeleine-thumb-550', 550, 550, true );
	add_image_size( 'madeleine-thumb-lg', 600, 400, true );
	add_image_size( 'madeleine-post-thumbnail-large', 770, 560, true );
	add_image_size( 'madeleine-thumb-l', 1170, 550, true );
}

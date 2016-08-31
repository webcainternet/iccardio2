<?php
/**
 * Menus configuration.
 *
 * @package __Tm
 */

add_action( 'after_setup_theme', 'madeleine_register_menus', 5 );
function madeleine_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'madeleine' ),
		'main'   => esc_html__( 'Main', 'madeleine' ),
		'footer' => esc_html__( 'Footer', 'madeleine' ),
		'social' => esc_html__( 'Social', 'madeleine' ),
	) );
}

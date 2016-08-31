<?php
/**
 * Custom functions that act independently of the tm-content-builder plugin.
 *
 * @package Ironmass
 */

add_action( 'tm_builder_load_user_modules', 'madeleine_builder_load_user_modules' );

function madeleine_builder_load_user_modules( $modules ) {

	$key = 'Tm_Builder_Module_Link_Box';
	$value = MADELEINE_THEME_DIR  . 'builder/modules/class-builder-module-link-box.php';
	$modules->modules_list = ( ! isset( $modules->modules_list ) ? array( $key => $value ) : $modules->modules_list += array( $key => $value ) );

	require_once trailingslashit( MADELEINE_THEME_DIR ) . 'builder/modules/class-builder-module-link-box.php';
}

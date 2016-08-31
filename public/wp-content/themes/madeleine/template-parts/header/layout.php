<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */
?>

<div class="header-flex-container">
	<div class="header_left_text">
		<?php madeleine_top_header_left( '<div class="top-panel__message">%s</div>' ); ?>
	</div>

	<div class="site-branding">
		<?php madeleine_header_logo() ?>
		<?php madeleine_site_description(); ?>
	</div>

	<div class="header_right_text">
		<?php madeleine_top_header_right( '<div class="top-panel__message">%s</div>' ); ?>
	</div>

	<div class="site-menu">
		<?php
		madeleine_main_menu();
		madeleine_top_search( '<div class="header__search">%s<span class="search__toggle fa fa-search"></span></div>' );
		?>
	</div>
</div>


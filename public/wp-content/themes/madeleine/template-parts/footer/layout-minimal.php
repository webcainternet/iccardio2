<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package __Tm
 */
?>

<div class="footer-container">
	<div <?php echo madeleine_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="site-info__flex">
			<div class="site-info__mid-box"><?php
				madeleine_footer_copyright();
				madeleine_footer_menu();
			?></div>
			<?php madeleine_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
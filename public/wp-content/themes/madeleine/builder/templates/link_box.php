<?php
/**
 * Template part for Blurb module displaying
 */
?>
<div class="tm_pb_link_box_content" style="background-image:url(<?php echo $this->_var( 'image' ); ?>);">
	<?php echo $this->_var( 'title' ); ?>
	<div class="tm_pb_blurb_content"><?php
		echo $this->shortcode_content;
	?></div>
	<?php if( '' !== $this->_var( 'button') ) : ?>
		<div class="tm_pb_link_box_button_holder"><?php echo $this->_var( 'button' ); ?></div>
	<?php endif; ?>	
</div> <!-- .tm_pb_blurb_content -->

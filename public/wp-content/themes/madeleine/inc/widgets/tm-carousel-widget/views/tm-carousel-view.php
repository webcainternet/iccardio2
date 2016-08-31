<?php
/**
 * Template part to display Carousel widget.
 *
 * @package __Tm
 * @subpackage widgets
 */
?>

<div class="inner">
	<div class="content-wrapper">
		<header class="entry-header">
			<?php echo $image; ?>
			<div class="post__cats"><?php echo $terms_line; ?></div>
		</header>
		<div class="entry-content">
			<div class="post__author vcard"><span><?php echo esc_html__( 'Posted by ', 'madeleine' ); ?></span><?php echo $author; ?></div>
			<?php echo $title; ?>
			<?php echo $content; ?>
			<?php echo $more_button; ?>
		</div>
	</div>
	<footer class="entry-footer">
		<div class="entry-meta">
			<span class="post__date"><?php echo $date; ?></span>
			<span class="post__comments"><?php echo $comments; ?></span>
		</div>
	</footer>
</div>
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item card'); ?>>

    <div class="post-list__item-content">

        <?php if ('post' === get_post_type()) : ?>

            <div class="entry-meta">
                <?php

                madeleine_meta_author(
                    'loop',
                    array(
                        'before' => esc_html__('by', 'madeleine') . ' ',
                    )
                );

                madeleine_meta_date('loop', array(
                    'before' => '',
                ));

                madeleine_meta_categories('loop');

                ?>
            </div><!-- .entry-meta -->

        <?php endif; ?>

        <div class="post-featured-content format-quote ">
            <?php madeleine_sticky_label(); ?>
            <?php do_action('cherry_post_format_quote'); ?>
        </div><!-- .post-featured-content -->

        <div class="entry-content">
            <?php madeleine_meta_tags('loop', array(
                'before' => 'Tags: ' . '  ',
                'separator' => ' ',
            )); ?>
        </div><!-- .entry-content -->


    </div>
    <footer class="entry-footer">
        <?php
            madeleine_read_more();
            madeleine_share_buttons('loop');
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

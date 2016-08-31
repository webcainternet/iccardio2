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

        <header class="entry-header">
            <?php
            if (is_single()) {
                the_title('<h3 class="entry-title">', '</h3>');
            } else {
                the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
            }

            ?>
        </header><!-- .entry-header -->

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

        <div class="entry-content">
            <?php madeleine_sticky_label(); ?>

            <?php

            $embed_args = array(
                'fields' => array('twitter', 'facebook'),
                'height' => 300,
                'width' => 300,
            );
            $embed_content = apply_filters('cherry_get_embed_post_formats', false, $embed_args);

            if (false === $embed_content) {
                madeleine_blog_content();
            } else {
                printf('<div class="embed-wrapper">%s</div>', $embed_content);
            }

            madeleine_meta_tags('loop', array(
                'before' => 'Tags: ' . '  ',
                'separator' => ' ',
            ));
            ?>
        </div><!-- .entry-content -->


    </div>
    <footer class="entry-footer">
        <?php madeleine_read_more();

        madeleine_meta_comments('loop', array(
            'before' => '<i class="fa  fa-comment"></i>',
            'after' => esc_html__('comments ', 'madeleine'),
            'zero' => '0',
            'one' => '1',
            'plural' => '%',
        ));

        ?>
        <?php madeleine_share_buttons('loop'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

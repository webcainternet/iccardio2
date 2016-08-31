<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php

        the_title('<h3 class="entry-title">', '</h3>');


        ?>



        <?php if ('post' === get_post_type()) : ?>

            <div class="entry-meta">

                <?php
                madeleine_meta_author(
                    'single',
                    array(
                        'before' => esc_html__('by', 'madeleine') . ' ',
                    )
                );

                madeleine_meta_date('single', array(
                    'before' => '',
                ));

                madeleine_meta_categories('single');

                ?>

            </div><!-- .entry-meta -->

        <?php endif; ?>
    </header><!-- .entry-header -->

    <figure class="post-thumbnail">
        <?php madeleine_post_thumbnail( false ); ?>
        <div class="post-thumbnail__format-link">
            <?php do_action( 'cherry_post_format_quote', array( 'render' => true, 'class' => 'invert' ) ); ?>
        </div>
    </figure><!-- .post-thumbnail -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'madeleine' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="entry-footer__inner">
            <?php
            madeleine_meta_tags('single', array(
                'before' => 'Tags: ' . '  ',
                'separator' => ' ',
            ));

            madeleine_meta_comments('single', array(
                'before' => '<i class="fa fa-comment"></i>',
                'after' => esc_html__('comments ', 'madeleine'),
                'zero' => '0',
                'one' => '1',
                'plural' => '%',
            ));
            ?>
        </div>
        <?php madeleine_share_buttons( 'single' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

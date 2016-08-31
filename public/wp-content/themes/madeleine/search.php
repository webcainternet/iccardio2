<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package __Tm
 */

if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title screen-reader-text"><?php printf( esc_html__( 'Search Results for: %s', 'madeleine' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header><!-- .page-header -->

	<div <?php madeleine_posts_list_class(); ?>>

	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		get_template_part( 'template-parts/content', madeleine_get_template_part_name() );

	endwhile; ?>

	</div><!-- .posts-list -->

	<?php get_template_part( 'template-parts/content', 'pagination' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>
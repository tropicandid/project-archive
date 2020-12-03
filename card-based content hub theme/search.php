<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package api
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="single-background-wrap"></div>

		<div class="container">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					
					<h1 class="dark-teal">Search Results for:</h1>

					<div class="site-search">
						<?php get_search_form( ); ?>
					</div>

				</header>

				<div class="grid-3">

				<?php

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */

						get_template_part( 'template-parts/content', 'search' );

					endwhile; ?>

				</div>

				<div class="pager-nav">
					<p class="prev small"><?php previous_posts_link( '&laquo; Previous' ); ?></p>
					<p class="next small"><?php next_posts_link( 'Next &raquo;', '' ); ?></p>
				</div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif;

			?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();

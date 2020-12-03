<?php

/**
 * Template Name: Filtered Read Time Page
 * Template Post Type: page
**/

get_header(); 

// Gather time range for use by facet template
$GLOBALS['lowRange'] = get_field('shortest_duration');
$GLOBALS['highRange'] = get_field('longest_duration');
?>



<div id="primary" class="content-area mixed-content read-time-filtered">

	<main id="main" class="site-main">

		<div class="container">

			<div class="filtered-content single-topic">

				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					?>
					<?php echo get_field('topic_subheader_text'); ?>
				</header><!-- .entry-header -->

			</div>

			<div class="facet-feed">

				<?php echo facetwp_display( 'template', 'mixed' ); ?>

			</div>

		</div>

	</main><!-- #main -->
	
</div><!-- #primary -->


<?php get_footer(); ?>
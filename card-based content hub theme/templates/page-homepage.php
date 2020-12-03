<?php

/**
 * Template Name: Homepage
 * Template Post Type: page
**/

get_header(); 

?>

<div id="primary" class="content-area">

	<main id="main" class="site-main">

		<!-- Primary Featured Article Block -->
		<?php get_template_part( 'template-parts/content', 'homepage-primary-features' ); ?>

		<!-- Secondary Featured Article Block -->
		<?php get_template_part( 'template-parts/content', 'homepage-secondary-features' ); ?>

		<!-- Timeline (This is reliant upon the mu plugin being present) -->
		<?php echo do_shortcode('[timeline]'); ?>

		<!-- Secondary Featured Article Block -->
		<?php get_template_part( 'template-parts/content', 'homepage-ge-features' ); ?>

		<!-- External Articals -->
		<?php get_template_part( 'template-parts/content', 'homepage-external-articles' ); ?>

	</main><!-- #main -->
	
</div><!-- #primary -->


<?php get_footer(); ?>
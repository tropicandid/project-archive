<?php
/**
 * The template for displaying all single articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sfig
 */

get_header();
?>	
	<div id="primary" class="content-area">
		
		<main id="main" class="site-main">
			
			<?php 
			// Articles
			if ( get_post_type() == 'post' || get_post_type() == 'article' ) { get_template_part( 'template-parts/content-singlepagesocial' ); }

			// Generation Energy
			if ( get_post_type() == 'generation-energy') { get_template_part( 'template-parts/content-generation-energy' ); }

			// Topics
			if ( get_post_type() == 'topic') { get_template_part( 'template-parts/content-topic' ); }

			// External Articles
			if ( get_post_type() == 'external-articles') { get_template_part( 'template-parts/content-singlepagesocial' ); }

			// Case Studies
			if ( get_post_type() == 'case-study') { get_template_part( 'template-parts/content-singlepagesocial' ); }

			// Mobilization Landing Pages
			if ( get_post_type() == 'mobilization') { get_template_part( 'template-parts/mobilization/content-mobilization' ); }

			?>

		</main>

	</div>
<?php
get_footer(); ?>
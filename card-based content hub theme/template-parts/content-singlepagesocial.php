<?php

/**
 * Template part for displaying single page with social share
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sfig
 */

?>

<div class="container alt">

	<section class="single-content background-white border">
		
		<?php get_template_part( 'template-parts/content-singleinfo' ); ?>

		<h1 class="dark-teal"><?php echo get_the_title(); ?></h1>
		
		<div class="subtext">
			<?php echo get_field('subtext'); ?>
		</div>

		<div class="single-content-bottom section-social-sticky">

			<div class="addthis-side-wrapper">
				<div class="addthis_inline_share_toolbox"></div>
			</div>

			<?php
				if ( has_post_thumbnail() ) {
					$thumbId = get_post_thumbnail_id();
					$thumbUrlArray = wp_get_attachment_image_src($thumbId, 'full', true);
					$thumbUrl = $thumbUrlArray[0];
					echo "<img class='article-featured' src='" . $thumbUrl . "' alt=\"article teaser\">";
				}
			?>

			<?php get_template_part( 'template-parts/content-authorby' ); ?>

			<div class="single-date"><p class="upper-sans-bold no-marg dark-gray"><?php the_time( 'F j, Y' ); ?></p></div>
		
			<?php the_content(); ?>
			
			<?php get_template_part( 'template-parts/content-authorimages' ); ?>

		</div>

	</section>

</div>

<?php get_template_part( 'template-parts/content-relatedarticles' ); ?>
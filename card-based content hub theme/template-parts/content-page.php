<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

?>

<?php

/**
 * Template part for displaying single page with social share
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sfig
 */

?>

<div class="single-background-wrap"></div>

<div class="container alt">

	<section class="single-content background-white border">
		
		<?php get_template_part( 'template-parts/content-singleinfo' ); ?>

		<h1><?php echo get_the_title(); ?></h1>
		
		<div class="subtext">
			<?php echo get_field('subtext'); ?>
		</div>

		<div class="single-content-bottom">

			<div class="addthis-side-wrapper">
				<div class="addthis_inline_share_toolbox"></div>
			</div>

			<?php
				if ( has_post_thumbnail() ) {
					echo the_post_thumbnail('large');
				}
			?>

			<?php the_content(); ?>

		</div>

	</section>

</div>


			

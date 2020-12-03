<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$articleSource = get_field('ge_source');
?>

<section class="homepage__generation-energy">

	<div class="container">

		<div class="ge_heading">
		
			<?php if( get_field('ge_header') ): ?>

				<h2><?php echo esc_html( get_field('ge_header') ); ?></h2>

			<?php endif; ?>

			<?php if( get_field('ge_subtext') ): ?>
				
				<p class="homepage__generation-energy--subtext"><?php echo esc_html( get_field('ge_subtext') ); ?></p>

			<?php endif; ?>

			<?php if( get_field('ge_home_optional_link') ): ?>
				
				<a href="<?php echo esc_url( get_field('ge_home_optional_link')['url'] ); ?>" class="homepage__generation-energy--link"><?php echo esc_html( get_field('ge_home_optional_link')['title'] ); ?></a>

			<?php endif; ?>
		</div>

		<div class="homepage__generation-energy-teasers">

			<?php if( $articleSource === 'Custom'):?>
				
				<!-- CUSTOM -->

				<?php if( have_rows('ge_custom_selected_items') ): ?>
					
				<?php while( have_rows('ge_custom_selected_items') ): the_row(); 
					
					$article = get_sub_field('generation_energy_article');

					if ($article) {
						$post = $article;
						setup_postdata( $post ); 
						get_template_part( 'template-parts/content', 'ge-card' );	
						wp_reset_postdata();
					}
							
					endwhile; 
					?>

				<?php endif; ?>

			<?php else:?>
				<?php 
					$the_query = new WP_Query( array( 
						'post_type' 		=> 'generation-energy',
						'post_status'       => 'publish',
						'posts_per_page'    => 3,
						'orderby'           => 'ID',
			    		'order'             => 'DESC'
					) );

					$i = 1;

				if ( $the_query->have_posts() ) : ?>	

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

						<?php get_template_part( 'template-parts/content', 'ge-card' ); ?>

					<?php endwhile; wp_reset_query(); ?>
					
				<?php endif; ?>

				<!-- AUTOMATED -->
			<?php endif; ?>

		</div>
	</div>

</section>
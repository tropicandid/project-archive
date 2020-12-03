<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */
$articleSource = get_field('external_article_source');
$shouldHidePanel = get_field('hide_panel');

if( !$shouldHidePanel ):
?>

<section class="homepage__external-articles">

	<div class="container">

		<?php if(get_field('external_articles_header')): ?>
		
			<h2><?php echo esc_html( get_field('external_articles_header') ); ?></h2>

		<?php endif;?>

		<?php if(get_field('external_articles_subtext')): ?>
		
			<p class="subtext"><?php echo esc_html( get_field('external_articles_subtext') ); ?></p>
			
		<?php endif;?>


		<?php if( $articleSource === 'Custom'):?>
		
			<?php if( have_rows('custom_external_articles') ): 
				$count = count(get_field('custom_external_articles'));
				$i = 1;?>

				<div class="homepage__external-articles--wrapper grid-3">
					
					<?php while( have_rows('custom_external_articles') ): the_row(); 
						
						$article = get_sub_field('external_article');

						if ($article) {
							$post = $article;
							setup_postdata( $post );
						}?>

						<?php get_template_part( 'template-parts/content', 'external-article-card' ); ?>	

					<?php $i++;
						wp_reset_postdata();
						endwhile; 
					?>

				</div>

			<?php endif; ?>

		<?php else:?>
			<!-- AUTOMATED -->

			<?php 
				$the_query = new WP_Query( array( 
					'post_type' 		=>  array('external-article'),
					'post_status'       => 'publish',
					'posts_per_page'    => 6,
					'orderby'           => 'ID',
		    		'order'             => 'DESC'
				) );

				$i = 1;

			if ( $the_query->have_posts() ) : 
				$count = $the_query->post_count; 
				?>

				<div class="homepage__external-articles--wrapper grid-3">

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

						<div class="card-wrap card-border article-card card-<?php echo $i; ?>">
							<!-- Pass Data to Card Template -->
							<?php get_template_part( 'template-parts/content', 'external-article-card' ); ?>
						</div>	

						<?php $i++; ?>

					<?php endwhile; wp_reset_query(); ?>

				</div>

			<?php endif; ?>

		<?php endif; ?>

	</div>
	
</section>
<?php endif; ?>
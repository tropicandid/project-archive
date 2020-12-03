<?php
/**
 * Template part for mobilization related content module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */
$articleSource = get_sub_field('related_article_source');
?>

<?php if ($articleSource): ?>

	<div class="container">

		<section class="mobilization-section mobilization-related-content">

			<section class="related-articles-text">
	
				<h2 class="mobilization-related-content__header dark-teal">Related Content</h2>

			</section>

			<?php $relatedAtriclesCount = count( get_sub_field('related_articles') ); ?>

			<?php if( $articleSource === 'Custom'):?>
				<!-- CUSTOM SELECTED -->

				<?php if ( $relatedAtriclesCount ): ?>

					<div class="grid-<?php echo $relatedAtriclesCount; ?>">

						<?php 

							$posts = get_sub_field('related_articles');

							if( $posts ): ?>
								
								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>

									<?php get_template_part( 'template-parts/mobilization/mobilization-card' ); ?>

								<?php endforeach; ?>

								<?php wp_reset_postdata();?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			<?php else:?>
				<!-- AUTOMATED -->
				<?php
					$thisID = get_the_ID();
					$topics = get_the_terms($thisID, 'topic-tax');
					$topic = (count($topics) > 0) ? $topics[0]->slug : "";

					$the_query = new WP_Query( array( 
						'post_type' 		=> 'article',
						'post__not_in'      => array($thisID),
						'post_status'       => 'publish',
						'posts_per_page'    => 3,
						'orderby'           => 'ID',
						'order'             => 'DESC',
						'tax_query' => array(
				            array(
				                'taxonomy' => 'topic-tax',
				                'field' => 'slug',
				                'terms' => array($topic)
				            )
				        )

					) );
					$count = $the_query->post_count;
					$i = 1;

				if ( $the_query->have_posts() ) : ?>

					<div class="related-articles-inner grid-<?php echo $count; ?>">

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

							<?php get_template_part( 'template-parts/mobilization/mobilization-card' ); ?>

							<?php $i++; ?>

						<?php endwhile; wp_reset_query(); ?>

					</div>

				<?php endif; ?>

			<?php endif; ?>

		</section>

	</div>

<?php endif; ?>

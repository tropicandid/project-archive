<?php
/**
 * Template part for displaying related articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sfig
 */
	
?>

<?php $articleSource = get_field('related_article_source'); ?>

<?php if ($articleSource): ?>

	<section class="related-articles">

		<div class="container">

			<section class="related-articles-text">
				<?php
					$relatedContentHeader = get_field('relatedcontent_header', 'options');
					$relatedContentSubHeader = get_field('relatedcontent_subheader', 'options');
				?>
				<?php if ( $relatedContentHeader ): ?>
					<p class="related-articles-title"><?php echo $relatedContentHeader; ?></p>
				<?php endif; ?>
				<?php if ( $relatedContentSubHeader ): ?>
					<?php echo $relatedContentSubHeader; ?>
				<?php endif; ?>
			</section>

			<?php $relatedAtriclesCount = count( get_field('related_articles') ); ?>

			<?php if( $articleSource === 'Custom'):?>
				<!-- CUSTOM SELECTED -->

				<?php if ( $relatedAtriclesCount ): ?>

					<div class="related-articles-inner grid-<?php echo $relatedAtriclesCount; ?>">

						<?php 

							$posts = get_field('related_articles');

							if( $posts ): ?>
							    
							    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
							        <?php setup_postdata($post); ?>
							        <div class="card-wrap card-border card-purple">
										<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
									</div>
							    <?php endforeach; ?>

							    <?php wp_reset_postdata();?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			<?php else:?>
				<!-- AUTOMATED -->
				<?php
					$thisID = get_the_ID();

					$relatedArticlePostType = get_post_type();
					$the_query = new WP_Query( array( 
						'post_type' 		=> $relatedArticlePostType,
						'post__not_in'      => array($thisID),
						'post_status'       => 'publish',
						'posts_per_page'    => 3,
						'orderby'           => 'ID',
			    		'order'             => 'DESC'
					) );
					$count = $the_query->post_count;
					$i = 1;

				if ( $the_query->have_posts() ) : ?>

					<div class="related-articles-inner grid-<?php echo $count; ?>">

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

							<div class="card-wrap card-border">
								<!-- Pass Data to Card Template -->
								<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
							</div>	

							<?php $i++; ?>

						<?php endwhile; wp_reset_query(); ?>

					</div>

				<?php endif; ?>

			<?php endif; ?>

		</div>

	</section>

<?php endif; ?>
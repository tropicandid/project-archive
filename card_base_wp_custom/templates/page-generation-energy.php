<?php

/**
 * Template Name: Generation Energy
 * Template Post Type: page
**/

get_header(); 
$GLOBALS['exclude'] = array();
$hasCallout = have_rows('topic_callout_block');
$perPage = 2;
?>


<div id="primary" class="content-area generation-energy-landing">
		
	<main id="main" class="site-main">
		
		<div class="content-area-background paper">

			<div class="content-area-background-content">

				<div class="container">

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

		
					<div class="ge__featured-articles">

					<?php 
						$posts = get_field('ge_optional_featured_items');

						if( $posts ): ?>
							<div class="grid-2">
								<?php if( $hasCallout ): ?>

									<?php while (have_rows('topic_callout_block')) {
										the_row();?>

										<div class="card-wrap topic-card optional_card" style="background-image: url(<?php echo get_sub_field('topic_callout_background_image');?> );">

											<div class="text">

												<?php if( get_sub_field('topic_callout_block_headline') ): ?>
													<h2><?php echo get_sub_field('topic_callout_block_headline'); ?></h2>
												<?php endif; ?>

												<?php if( get_sub_field('topic_callout_block_subtext') ): ?>
													<p><?php echo get_sub_field('topic_callout_block_subtext'); ?></p>
												<?php endif; ?>

												<?php 
													if ( get_sub_field('optional_button') == "Link Button"){
														echo "<a class=\"button light-teal \" href=\"".get_sub_field('link_button')['url']."\" target=\"".get_sub_field('link_button')['target']."\">".get_sub_field('link_button')['title']."</a>";
													}

													if ( get_sub_field('optional_button') == "Download Button"){
														echo "<a class=\"button light-teal \" href=\"".get_sub_field('download_button')['url']."\" download>".get_sub_field('download_button')['filename']."</a>";
													}
												?>
											</div>

										</div>

									<?php } ?>

									<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
								        <?php 
							        	setup_postdata($post); 
							        	array_push( $GLOBALS['exclude'], get_the_ID() );
							        	?>

							            <div class="card-wrap card-border ge-landing-card">
											<?php get_template_part( 'template-parts/content', 'ge-card' ); ?>
										</div>

										<?php  break; ?>

								    <?php endforeach; ?>

								<?php else: ?>

								    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
								        <?php 
								        	setup_postdata($post); 
								        	array_push( $GLOBALS['exclude'], get_the_ID() );
								        	?>

								            <div class="card-wrap card-border ge-landing-card">
												<?php get_template_part( 'template-parts/content', 'ge-card' ); ?>
											</div>

								    <?php endforeach; ?>

								<? endif;?>

							</div>

								
						
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

							<?php else: ?>

								<div class=" grid-2">

								<?php if( $hasCallout ): ?>

									<?php $perPage = 1; ?>

										<?php while (have_rows('topic_callout_block')) {
											the_row();?>

											<div class="card-wrap topic-card" style="background-image: url(<?php echo get_sub_field('topic_callout_background_image');?> );">

												<div class="text">

													<?php if( get_sub_field('topic_callout_block_headline') ): ?>
														<h2><?php echo get_sub_field('topic_callout_block_headline'); ?></h2>
													<?php endif; ?>

													<?php if( get_sub_field('topic_callout_block_subtext') ): ?>
														<p><?php echo get_sub_field('topic_callout_block_subtext'); ?></p>
													<?php endif; ?>

													<?php 
														if ( get_sub_field('optional_button') == "Link Button"){
															echo "<a class=\"button light-teal \" href=\"".get_sub_field('link_button')['url']."\" target=\"".get_sub_field('link_button')['target']."\">".get_sub_field('link_button')['title']."</a>";
														}

														if ( get_sub_field('optional_button') == "Download Button"){
															echo "<a class=\"button light-teal \" href=\"".get_sub_field('download_button')['url']."\" download>".get_sub_field('download_button')['filename']."</a>";
														}
													?>
												</div>

											</div>

										<?php } ?>

										<!-- do second card here -->

								<?php endif; ?>

							<?php

								$topics = get_the_terms(get_the_ID(),'topic-tax');
								$topic = ($topics) ? $topics[0]->slug: "";


								$the_query = new WP_Query( array( 
									'post_type' 		=> array('generation-energy'),
									'post_status'       => 'publish',
									'posts_per_page'    => $perPage,
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

							if ( $the_query->have_posts() ) : ?>	
								

									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

										<?php array_push( $GLOBALS['exclude'], get_the_ID() ); ?>

										<div class="card-wrap card-border ge-landing-card">

											<?php get_template_part( 'template-parts/content', 'ge-card' ); ?>

										</div>	

									<?php endwhile; wp_reset_query(); ?>

								

							<?php endif; ?>

							</div>

						<?php endif; ?>
					</div>

					<div class="facet-feed">
						<?php echo facetwp_display( 'template', 'generation_energy' ); ?>

						<button class="fwp-load-more button light-teal">View more</button>
					</div>
			
				</div>

			</div>


		</div>

	</main>

</div>


<?php get_footer(); ?>
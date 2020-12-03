<?php

/**
 * Template Name: Campaign
 * Template Post Type: page
**/

get_header(); 
?>

<div id="primary" class="content-area">
		
	<main id="main" class="site-main">

		<?php
		if( have_rows('campaign_page_blocks') ):

		    // Loop through rows.
		    while ( have_rows('campaign_page_blocks') ) : the_row();

		    	$diagonalDirection = 'top-right';
		    	if( get_sub_field('diagonal_direction') == 'Top Left to Bottom Right' ) {
		    		$diagonalDirection = 'top-left';
		    	}


		        // Case: Paragraph layout.
		        if( get_row_layout() == 'campaign_hero' ): ?>

		        	<?php 
		        		$class = "";
		        		$videoId = "";

		        		if(get_sub_field('vimeo_id')) {
		        			$videoId = get_sub_field('vimeo_id'); 
							$class = "video-full-wrap";
		        		}
		        	?>


		        	<?php if(!empty($videoId)){ ?>
						<div class="video-full-wrap campaign__hero" data-video-id="<?php echo $videoId; ?>">
							<iframe src="//player.vimeo.com/video/<?php echo $videoId; ?>?autopause=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow=autoplay class="vimeo-video" id="<?php echo $videoId; ?>"></iframe>

							<div class="video-full-image" style="background-image: url('<?php echo get_sub_field('panel_image');?>');">
								<?php if( $attribution != '' ): ?>
									<div class="attribution"><?php echo $attribution; ?></div>
								<?php endif; ?>

								<div class="video-full-overlay banner-inner">
									<div class="container container-banner">

				        				<h1><?php echo get_sub_field('optional_large_title');?></h1>

										<p><?php echo get_sub_field('panel_text');?></p>


										<img class="play-button" src="<?php bloginfo('template_directory'); ?>/assets/icons/play-arrow.svg" alt="Play Button" />

									</div>

								</div>
							</div>
						</div>
					<?php } else { ?>

						<div class="video-full-wrap campaign__hero inactive">
							<div class="video-full-image" style="background-image: url('<?php echo get_sub_field('panel_image');?>');">
								<?php if( $attribution != '' ): ?>
									<div class="attribution"><?php echo $attribution; ?></div>
								<?php endif; ?>

								<div class="video-full-overlay banner-inner">
									<div class="container container-banner">

				        				<h1><?php echo get_sub_field('optional_large_title');?></h1>

										<p><?php echo get_sub_field('panel_text');?></p>

									</div>

								</div>
							</div>
						</div>
					<?php } ?>
		           
		      












		       	<?php elseif( get_row_layout() == 'blue_text_center_block' ): ?>
		       		

		        	<div id="<?php echo get_sub_field('anchor_text');?>" class="campaign__panel blue campaign__panel-1 <?php echo $diagonalDirection; ?>">
		        		<div class="container">

		        			<div class="compaign__panel-text">
		        			
				        		<?php if(get_sub_field('primary_heading')): ?>
					        		<h2 class="primary_heading"><?php echo get_sub_field('primary_heading');?></h2>
					        	<?php endif; ?>

					        	<?php if(get_sub_field('secondary_heading')): ?>
					        		<h2 class="secondary_heading"><?php echo get_sub_field('secondary_heading');?></h2>
					        	<?php endif; ?>

					        	<?php if(get_sub_field('subtext')): ?>
					        		<div class="subtext">
					        			<?php echo get_sub_field('subtext');?>
					        		</div>
					        	<?php endif; ?>

					        </div>

				        	<?php if(get_sub_field('optional_video_link')): ?>


					        	<div class="embed-container video-play-wrapper">

					        		<?php if(get_sub_field('panel_image')): ?>
						        		<div class="embed-container__overlay"  style="background-image: url( <?php echo get_sub_field('panel_image');?> );">
						        			<img class="play-button" src="<?php bloginfo('template_directory'); ?>/assets/icons/play-arrow.svg" alt="Play Button" />
						        		</div>
						        	<?php endif; ?>

						        	<?php if(get_sub_field('optional_video_title')): ?>
						        		<div class="video-title"><?php echo get_sub_field('optional_video_title'); ?></div>
						        	<?php endif; ?>

								    <?php echo get_sub_field('optional_video_link'); ?>
								</div>

							<?php elseif(get_sub_field('panel_image')): ?>
								<div class="embed-container__overlay"  style="background-image: url( <?php echo get_sub_field('panel_image');?> );"></div>
				        	<?php endif; ?>

		        		</div>

					</div>

		        <?php elseif( get_row_layout() == 'purple_text_left_block' ): ?>
		        	

					<div id="<?php echo get_sub_field('anchor_text');?>" class="campaign__panel purple campaign__panel-2 <?php echo $diagonalDirection; ?>">

						<div class="container campaign-container">

							<?php if( get_sub_field('visual_asset_type') == 'Image') : ?>

								<div class="visual-asset">
						        	<?php if(get_sub_field('panel_image')): ?>
						        		<img src="<?php echo get_sub_field('panel_image');?>" alt="panel image"/>
						        	<?php endif; ?>
						        </div>

					        <?php else: ?>
					        	<div class="visual-asset">
									<?php if(get_sub_field('panel_chart')): ?>
						        		<?php echo do_shortcode( get_sub_field('panel_chart') );?>
						        	<?php endif; ?>
						        </div>

					        <?php endif; ?>	

					        <?php if ( get_sub_field('optional_arrow') ) : ?>

					        	<img class="campaign_arrow mobile" src="<?php bloginfo('template_directory'); ?>/assets/icons/campaign-arrow-mobile.svg" alt="Downward Arrow" />

					        <?php endif; ?>

					        <div class="campaign__panel-2--text">

								<?php if(get_sub_field('primary_heading')): ?>
									<h2 class="primary_heading"><?php echo get_sub_field('primary_heading');?></h2>
								<?php endif; ?>

								<?php if(get_sub_field('secondary_heading')): ?>
				        			<h2 class="secondary_heading"><?php echo get_sub_field('secondary_heading');?></h2>
				        		<?php endif; ?>

				        		<?php if(get_sub_field('subtext')): ?>
				        			<div class="subtext">
					        			<?php echo get_sub_field('subtext');?>
					        		</div>
			        			<?php endif; ?>

			        		</div>

			        	</div>

					</div>

				<?php elseif( get_row_layout() == 'gold_text_left_block' ): ?>
		        	

					<div id="<?php echo get_sub_field('anchor_text');?>" class="campaign__panel gold campaign__panel-2 <?php echo $diagonalDirection; ?>">

						<div class="container campaign-container">

					        <?php if ( get_sub_field('optional_arrow') ) : ?>

					        	<img class="campaign_arrow mobile" src="<?php bloginfo('template_directory'); ?>/assets/icons/campaign-arrow-mobile.svg" alt="Downward Arrow" />

					        <?php endif; ?>

					        <div class="campaign__panel-2--text">

								<?php if(get_sub_field('primary_heading')): ?>
									<h2 class="primary_heading"><?php echo get_sub_field('primary_heading');?></h2>
								<?php endif; ?>

								<?php if(get_sub_field('secondary_heading')): ?>
				        			<h2 class="secondary_heading"><?php echo get_sub_field('secondary_heading');?></h2>
				        		<?php endif; ?>

				        		<?php if(get_sub_field('subtext')): ?>
				        			<div class="subtext">
					        			<?php echo get_sub_field('subtext');?>
					        		</div>
			        			<?php endif; ?>

			        		</div>

			        		<?php if( get_sub_field('visual_asset_type') == 'Image') : ?>

								<div class="visual-asset">
						        	<?php if(get_sub_field('panel_image')): ?>
						        		<img src="<?php echo get_sub_field('panel_image');?>" alt="panel image" />
						        	<?php endif; ?>
						        </div>

					        <?php else: ?>
					        	<div class="visual-asset">
									<?php if(get_sub_field('panel_chart')): ?>
						        		<?php echo do_shortcode( get_sub_field('panel_chart') );?>
						        	<?php endif; ?>
						        </div>

					        <?php endif; ?>	

			        	</div>

					</div>

				<?php elseif( get_row_layout() == 'white_text_block' ): ?>
		        	
					<div id="<?php echo get_sub_field('anchor_text');?>" class="campaign__panel white campaign__panel-2 <?php echo $diagonalDirection; ?>">

						<div class="container campaign-container">

					        <div class="campaign__panel-2--text">

								<?php if(get_sub_field('primary_heading')): ?>
									<h2 class="primary_heading"><?php echo get_sub_field('primary_heading');?></h2>
								<?php endif; ?>

								<?php if(get_sub_field('secondary_heading')): ?>
				        			<h2 class="secondary_heading"><?php echo get_sub_field('secondary_heading');?></h2>
				        		<?php endif; ?>

				        		<?php if(get_sub_field('subtext')): ?>
				        			<div class="subtext">
					        			<?php echo get_sub_field('subtext');?>
					        		</div>
			        			<?php endif; ?>

			        		</div>

			        	</div>

					</div>

		        <?php elseif( get_row_layout() == 'brown_text_left_block' ): ?>
		       
					<div id="<?php echo get_sub_field('anchor_text');?>" class="campaign__panel brown campaign__panel-3 <?php echo $diagonalDirection; ?>">

						<div class="container campaign-container">

							<div class="heading-container">
								<?php if(get_sub_field('primary_heading')): ?>
									<h2 class="primary_heading"><?php echo get_sub_field('primary_heading');?></h2>
								<?php endif; ?>

								<?php if(get_sub_field('secondary_heading')): ?>
				        			<h2 class="secondary_heading"><?php echo get_sub_field('secondary_heading');?></h2>
				        		<?php endif; ?>

				        		<?php if ( get_sub_field('optional_arrow') ) : ?>

				        			<img class="campaign_arrow desktop" src="<?php bloginfo('template_directory'); ?>/assets/icons/campaign-arrow.svg" alt="Downward Arrow" />

				        		<?php endif; ?>
				        	</div>

			        		

			        		<div class="image-blocks">

			        			<?php if(get_sub_field('subtext')): ?>
				        			<div class="subtext">
					        			<?php echo get_sub_field('subtext');?>
					        		</div>
			        			<?php endif; ?>

			        			<?php if( have_rows('image_and_text_pairing') ): ?>

								    <?php while ( have_rows('image_and_text_pairing') ) : the_row(); ?>

								        <div class="image-block">
								        	<div class="image-wrapper">
									        	<div class="background-image" style="background-image: url(<?php echo get_sub_field('image'); ?>);"></div>
									        </div>
								        	<span><?php echo get_sub_field('text'); ?></span>
								        </div>

								    <?php endwhile; ?>

								<?php endif; ?>
			        		</div>

			        		<?php if ( get_sub_field('optional_arrow') ) : ?>

			        			<img class="campaign_arrow mobile" src="<?php bloginfo('template_directory'); ?>/assets/icons/campaign-arrow-mobile.svg" alt="Downward Arrow" />

			        		<?php endif; ?>
			        	
			        	</div>

					</div>

		        <?php endif;

		    // End loop.
		    endwhile;

		endif;  ?>

	</main>

</div>

<?php get_footer(); ?>
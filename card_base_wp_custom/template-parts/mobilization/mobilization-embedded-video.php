<?php
/**
 * Template part for mobilization embedded video module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */
	if(get_sub_field('vimeo_id')) {
		$videoId = get_sub_field('vimeo_id'); 
	}
?>

<?php if( $videoId ): ?>

	<div class="container">

		<section class="mobilization-section mobilization-embedded-video">

			<div class="video-full-wrap" data-video-id="<?php echo $videoId; ?>">

				<iframe src="//player.vimeo.com/video/<?php echo $videoId; ?>?autopause=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow=autoplay class="vimeo-video" id="<?php echo $videoId; ?>"></iframe>

				<div class="video-full-image" style="background-image: url('<?php echo get_sub_field('panel_image');?>');">
					
					<div class="video-full-overlay">

						<div class="mobilization-embedded-video__container">

							<?php if( get_sub_field('length') ): ?>

								<p class="highlight"><?php echo esc_html( get_sub_field('length') ); ?></p>

							<?php endif; ?>

							<?php if( get_sub_field('title') ): ?>

								<h1 class="mobilization-embedded-video__title"><?php echo esc_html( get_sub_field('title') ); ?></h1>

							<?php endif; ?>

							<?php if( get_sub_field('description') ): ?>

								<p class="mobilization-embedded-video__description"><?php echo esc_html( get_sub_field('description') ); ?></p>

							<?php endif; ?>

						</div>

						<div class="mobilization-embedded-video__play-button">

							<img src="<?php bloginfo('template_directory'); ?>/assets/icons/play-arrow.svg" alt="Play Button" />

						</div>

					</div>

				</div>
			
			</div>

		</section>

	</div>

<?php endif; ?>

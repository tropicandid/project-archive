<?php
/**
 * Template part for mobilization video teaser module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$image = get_sub_field('image');
$size = 'full';
$button = get_sub_field('button');
?>

<section class="mobilization-section mobilization-video-teaser">

	<div class="container mobilization-video-teaser__container">
		
		<div class="mobilization-video-teaser__image" style="background-image: url('<?php echo $image?>');"></div>

		<div class="mobilization-video-teaser__copy">

			<?php if( get_sub_field('length') ): ?>

				<p class="highlight"><?php echo esc_html( get_sub_field('length') ); ?></p>

			<?php endif; ?>

			<?php if( get_sub_field('title') ): ?>

				<h1 class="mobilization-video-teaser__title"><?php echo esc_html( get_sub_field('title') ); ?></h1>

			<?php endif; ?>

			<?php if( $button ):
				$button_url = $button['url'];
				$button_title = $button['title'];
				$button_target = $button['target'] ? $button['target'] : '_self';
			?>
				<a class="mobilization-video-teaser__button button medium-teal" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/assets/icons/play-arrow.svg" alt="Play Button" />
					<?php echo esc_html( $button_title ); ?>
				</a>

			<?php endif; ?>


			<?php if( get_sub_field('description') ): ?>

				<p class="mobilization-video-teaser__description"><?php echo esc_html( get_sub_field('description') ); ?></p>

			<?php endif; ?>

		</div>

	</div>

</section>

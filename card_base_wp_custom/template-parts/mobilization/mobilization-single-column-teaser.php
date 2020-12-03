<?php
/**
 * Template part for mobilization single column teaser/campaign hero
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$image = get_sub_field('image');
$size = 'full';
$button = get_sub_field('button');
?>

<div class="container">

	<section class="mobilization-section mobilization-single-column-teaser">
		
		<div class="mobilization-single-column-teaser__wrapper">

		<?php if ($image) echo wp_get_attachment_image( $image, $size, '', ['class' => 'mobilization-single-column-teaser__image'] ); ?>

			<div class="mobilization-single-column-teaser__text-container">
			
				<?php if( get_sub_field('headline') ): ?>

					<h1 class="mobilization-single-column-teaser__headline"><?php echo esc_html( get_sub_field('headline') ); ?></h1>

				<?php endif; ?>

				<?php if( get_sub_field('description') ): ?>

					<p class="mobilization-single-column-teaser__description"><?php echo esc_html( get_sub_field('description') ); ?></p>

				<?php endif; ?>

			</div>
		
		</div>

		<?php if( $button ):
			$button_url = $button['url'];
			$button_title = $button['title'];
			$button_target = $button['target'] ? $button['target'] : '_self';
		?>
			<a class="mobilization-single-column-teaser__button button medium-teal" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>

		<?php endif; ?>

	</section>

</div>

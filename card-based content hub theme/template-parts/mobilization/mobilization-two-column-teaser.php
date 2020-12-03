<?php
/**
 * Template part for mobilization two column teaser module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$image = get_sub_field('image');
$size = 'ge-card';
$button = get_sub_field('button');
$alignment = get_sub_field('alignment');
?>

<div class="container">

	<section class="mobilization-section mobilization-two-column-teaser <?php echo $alignment === 'left' ? 'mobilization-two-column-teaser--left' : 'mobilization-two-column-teaser--right';  ?>">
		
		<?php if ($image) echo wp_get_attachment_image( $image, $size, '', ['class' => 'mobilization-two-column-teaser__image'] ); ?>

		<div class="mobilization-two-column-teaser__text-container">
			
			<div>
		
				<?php if( get_sub_field('headline') ): ?>

					<h2 class="mobilization-two-column-teaser__headline"><?php echo esc_html( get_sub_field('headline') ); ?></h2>

				<?php endif; ?>

				<?php if( get_sub_field('description') ): ?>

					<p class="mobilization-two-column-teaser__description"><?php echo esc_html( get_sub_field('description') ); ?></p>

				<?php endif; ?>

				<?php if( $button ):
					$button_url = $button['url'];
					$button_title = $button['title'];
					$button_target = $button['target'] ? $button['target'] : '_self';
				?>
					<a class="mobilization-two-column-teaser__button button medium-teal" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>

				<?php endif; ?>

			</div>

		</div>

	</section>

</div>
<?php
/**
 * Template part for mobilization basic hero module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$image = get_sub_field('image');
$size = 'full';
?>

<div class="container">

	<section class="mobilization-section mobilization-basic-hero">

		<div class="mobilization-basic-hero__container">

			<div class="mobilization-basic-hero__date"><?php echo esc_html( get_the_date() ); ?></div>

			<h1 class="mobilization-basic-hero__headline"><?php echo esc_html( get_sub_field('headline') ); ?></h1>

			<?php if( get_sub_field('description') ): ?>

				<p class="mobilization-basic-hero__description"><?php echo esc_html( get_sub_field('description') ); ?></p>

			<?php endif; ?>

		</div>

		<?php if ($image) echo wp_get_attachment_image( $image, $size, '', ['class' => 'mobilization-basic-hero__image'] ); ?>

	</section>

</div>

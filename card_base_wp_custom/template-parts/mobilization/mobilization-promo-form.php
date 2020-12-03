<?php
/**
 * Template part for mobilization promo form module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$term = get_sub_field('topic');
?>

<div class="container">

	<section class="mobilization-section mobilization-promo mobilization-promo--form">

		<div class="mobilization-promo__left">

			<div>
				
				<?php if( $term ): ?>

					<div class="single-info single-info--teal single-info--large">

						<a href="/topic/<?php echo esc_html( $term->slug )?>">

							<?php echo esc_html( $term->name ); ?>
						
						</a>

					</div>

				<?php endif; ?>
				
				<?php if( get_sub_field('headline') ): ?>

					<h2 class="mobilization-promo__headline dark-teal"><?php echo esc_html( get_sub_field('headline') ); ?></h2>

				<?php endif; ?>
							
				<?php if( get_sub_field('description') ): ?>

					<p class="mobilization-promo__description dark-teal"><?php echo esc_html( get_sub_field('description') ); ?></p>

				<?php endif; ?>

			</div>

		</div>

		<div class="mobilization-promo__right">
			
		<div>

			<?php if( get_sub_field('form_title') ): ?>

				<h2 class="mobilization-promo__form-title dark-teal"><?php echo esc_html( get_sub_field('form_title') ); ?></h2>

			<?php endif; ?>
					
			<?php if( get_sub_field('form_description') ): ?>

				<p class="mobilization-promo__form-description"><?php echo esc_html( get_sub_field('form_description') ); ?></p>

			<?php endif; ?>
						
				<?php if( get_sub_field('form') ): ?>

					<?php the_sub_field('form'); ?>

				<?php endif; ?>
				
			</div>

		</div>

	</section>

</div>
<?php
/**
 * Template part for mobilization promo module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$button = get_sub_field('button');
$term = get_sub_field('topic');
?>

<div class="container">

	<section class="mobilization-section mobilization-promo">

		<div class="mobilization-promo__left">

			<div>
				
				<?php if( $term ): ?>

					<div class="single-info single-info--teal single-info--large">

						<a href="/topic/<?php echo esc_html( $term->slug )?>">

							<?php echo esc_html( $term->name ); ?>
						
						</a>

					</div>

				<?php endif; ?>
							
				<?php if( get_sub_field('description') ): ?>

					<h2 class="mobilization-promo__description dark-teal"><?php echo esc_html( get_sub_field('description') ); ?></h2>

				<?php endif; ?>

			</div>

		</div>

		<div class="mobilization-promo__right">
			
			<div>

				<?php if( get_sub_field('cta') ): ?>

					<p class="mobilization-promo__cta"><?php echo esc_html( get_sub_field('cta') ); ?></p>

				<?php endif; ?>

				<?php if( $button ):
					$button_url = $button['url'];
					$button_title = $button['title'];
					$button_target = $button['target'] ? $button['target'] : '_self';
				?>

					<a class="mobilization-promo__button button medium-teal" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
						
						<?php echo esc_html( $button_title ); ?>
					
					</a>

				<?php endif; ?>
			
			</div>

		</div>

	</section>

</div>
<?php
/**
 * Template part for mobilization card module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$featured_posts= get_sub_field('cards');

?>

<div class="container">

	<section class="mobilization-section mobilization-cards grid-2">
		
		<?php if( $featured_posts ): ?>

				<?php foreach( $featured_posts as $post ): 
					
					setup_postdata($post); 

					get_template_part( 'template-parts/mobilization/mobilization-card' );

					endforeach; ?>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

	</section>

</div>
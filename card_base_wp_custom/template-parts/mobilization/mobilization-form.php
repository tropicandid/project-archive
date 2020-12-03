<?php
/**
 * Template part for mobilization form module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

?>
<div class="container">
	
	<section class="mobilization-section mobilization-form">

		<?php if( get_sub_field('form_title') ): ?>

			<h1 class="mobilization-form__form-title dark-teal"><?php echo esc_html( get_sub_field('form_title') ); ?></h1>

		<?php endif; ?>
			
		<?php if( get_sub_field('form_description') ): ?>

			<p class="mobilization-form__form-description"><?php echo esc_html( get_sub_field('form_description') ); ?></p>

		<?php endif; ?>

		<?php the_sub_field('form'); ?>

	</section>
</div>
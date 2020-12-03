<?php
/**
 * Template part for mobilization pull quote module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

?>

<?php if( get_sub_field('quote') ): ?>

	<div class="container">

		<blockquote class="mobilization-pull-quote mobilization-pull-quote--standalone">

			<p><?php echo esc_html( get_sub_field('quote') ); ?></p>

			<?php if( get_sub_field('citation') ): ?>

				<p><cite class="mobilization-pull-quote__citation">—<?php echo esc_html( get_sub_field('citation') ); ?></cite>

			<?php endif; ?>

		</blockquote>

	</div>

<?php endif; ?>

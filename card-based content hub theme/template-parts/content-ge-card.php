<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$terms = get_the_terms( $post->id, 'topic-tax' );
if ( $terms ):
	$termsTotalCount = count($terms);
	$termCount = 0; 
endif;

$title = get_field('ge_name') ? get_field('short_title'): get_the_title(); 
$title = get_field('short_title') ? get_field('short_title'): get_the_title(); 

?>

<!-- CARD EXAMPLE -->
<div class="card ge-card teal">

	<div class="ge-card-top">

		<div class="single-info"><?php if ( $terms ): foreach( $terms as $term ) : if ($termCount > 0 ): echo ', '; endif; echo "<a href=\"/topic/". esc_url( $term->slug ) ."\">" . esc_html( $term->name ) . "</a>"; $termCount++; endforeach; endif; ?>
		</div>

		<?php $geImage = get_field('ge_image'); ?>

		<?php 
			if ( $geImage ):
		?>
			<a href="<?php echo get_permalink(); ?>">
				<div class="ge-card__img">
					<div class="ge-card__readtime"><?php echo reading_time(); ?></div>
					<?php $geImageSize = 'ge-card'; ?>
					<?php echo wp_get_attachment_image( $geImage, $geImageSize ); ?>
				</div>
			</a>
		<?php 
			endif;
		?>

			
		<p class="name"><a href="<?php echo get_permalink(); ?>"><?php echo esc_html( $title ); ?></a></p>


		<?php if( get_field('ge_summary') ): ?>

			<div class="summary"><?php echo get_field('ge_summary'); ?></div>

		<?php endif; ?>

	</div>

	<div class="ge-card-bottom">

		<?php get_template_part( 'template-parts/content', 'authorby' ); ?>

	</div>

</div>
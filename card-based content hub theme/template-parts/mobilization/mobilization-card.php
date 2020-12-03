<?php
/**
 * Template part for mobilization card module
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$cardImgId = "";
if ( has_post_thumbnail( get_the_ID() ) ) { $cardImgId = get_post_thumbnail_id( get_the_ID() ); }
if ( get_field('card_image') ) { $cardImgId = get_field('card_image'); }

$description = get_field('short_description') ? get_field('short_description'): get_the_excerpt();
?>

<div class="mobilization-card">

	<?php
		if ($cardImgId): 
			$cardImgUrlArray = wp_get_attachment_image_src($cardImgId, 'large', true);
			$cardImgUrl = $cardImgUrlArray[0];
		endif;
	?>

	<a href="<?php echo esc_url( get_permalink(get_the_ID()) );?>" class="mobilization-card__image" <?php if ($cardImgId): ?>style="background-image: url('<?php echo esc_url( $cardImgUrl ); ?>')" <?php endif; ?>>
		&nbsp;
	</a>

	<div class="single-info">
		<?php echo reading_time(); ?>
	</div>

	<a href="<?php the_permalink(); ?>"><h2 class="mobilization-card__title dark-teal"><?php the_title(); ?></h2></a>

	<?php if (get_row_layout() == 'mobilization_cards'): ?>

		<p class="mobilization-card__description"><?php echo esc_html( $description ); ?></p>
	
	<?php endif; ?>

</div>			


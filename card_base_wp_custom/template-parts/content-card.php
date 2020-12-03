<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */
	
	$shouldDisplay = true;

	if ( isset($GLOBALS['highRange']) && isset($GLOBALS['lowRange']) ) {
		$high_range = (int)$GLOBALS['highRange'];
		$low_range = (int)$GLOBALS['lowRange'];
		$read_time_int = (int)str_replace (' MIN', '', reading_time() );

		if ( ( $read_time_int < $low_range ) || ( $read_time_int > $high_range ) ) {
			$shouldDisplay = false;
		}
	}



	$title = get_field('short_title') ? get_field('short_title'): get_the_title(); 
	$description = get_field('short_description') ? get_field('short_description'): get_the_excerpt();
	$cardImgId = "";

	if ( has_post_thumbnail( get_the_ID() ) ) { $cardImgId = get_post_thumbnail_id( get_the_ID() ); }
	if ( get_field('card_image') ) { $cardImgId = get_field('card_image'); }

?>



<?php if ($shouldDisplay): ?>

<div class="card-wrap card-border article-card">

	<article class="card-wrap-inner">

		<div class="card-text">

			<div class="card-text-top">

				<?php get_template_part( 'template-parts/content-singleinfo' ); ?>

				<h2 class="card-title"><a href="<?php echo esc_url( get_permalink(get_the_ID()) );?>"><?php echo esc_html( $title ); ?></a></h2>
				
				<p class="card-description"><?php echo esc_html( $description ); ?></p>

				<a class="learn-more" href="<?php echo esc_url( get_permalink(get_the_ID()) );?>">Learn More</a>

			</div>

			<div class="card-text-bottom">

				<?php get_template_part( 'template-parts/content', 'authorby' ); ?>

				<a class="button purple card-button" href="<?php echo esc_html( get_permalink(get_the_ID()) );?>">Read More</a>

			</div>

		</div>

		<?php

			if ($cardImgId): 
				$cardImgUrlArray = wp_get_attachment_image_src($cardImgId, 'large', true);
				$cardImgUrl = $cardImgUrlArray[0];
			endif;

			$extraClass = "";
			if (get_field('video_in_post')) {
				$extraClass = " has-video ";	
			}
			
		?>

		<a href="<?php echo esc_url( get_permalink(get_the_ID()) );?>" class="card-image <?php echo $extraClass; ?>" <?php if ($cardImgId): ?>style="background-image: url('<?php echo esc_url( $cardImgUrl ); ?>')" <?php endif; ?>>
			&nbsp;
		</a>

	</article>

</div>

<? endif; ?>
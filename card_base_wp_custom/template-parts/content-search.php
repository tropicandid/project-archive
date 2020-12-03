<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

?>

<?
	$title = get_field('short_title') ? get_field('short_title'): get_the_title(); 
	$description = get_field('short_description') ? get_field('short_description'): get_the_excerpt();
	$cardImgId = 0;

	if ( has_post_thumbnail( $post_object->ID ) ) { $cardImgId = get_post_thumbnail_id($post_object->ID); }
	if ( get_field('card_image') ) { $cardImgId = get_field('card_image'); }
?>

<div class="card-wrap card-border">

	<article class="card-wrap-inner">

		<div class="card-text">

			<div class="card-text-top">

				<h2 class="card-title"><a href="<?php echo esc_url( get_permalink(get_the_ID()) );?>"><?php echo esc_html( $title ); ?></a></h2>

				<p class="card-description"><?php echo $description; ?></p>

			</div>

		</div>

		<?php
			$cardImgUrlArray = wp_get_attachment_image_src($cardImgId, 'large', true);
			$cardImgUrl = $cardImgUrlArray[0];
		?>

		<a href="<?php echo esc_url( get_permalink(get_the_ID()) );?>" class="card-image" style="background-image: url('<?php echo esc_url( $cardImgUrl ); ?>')">
			&nbsp;
		</a>

	</article>

</div>
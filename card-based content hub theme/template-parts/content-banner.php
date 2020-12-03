<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */
$articleSource = get_field('secondary_article_source'); 
$bannerImg = get_field('secondary_banner_background');
$bannerTitle = get_field('secondary_banner_text');
$bannerSubtext = get_field('secondary_banner_subtext');

?>

<div class="banner homepage__secondary-featured-banner" style="background-image: url(<?php echo esc_url( $bannerImg ); ?>)">

	<div class="container container-banner">

		<h2 class="banner-heading"><?php echo esc_html( $bannerTitle ); ?></h2>

		<p class="banner-subtext"><?php echo esc_html( $bannerSubtext ); ?></p>

	</div>

</div>
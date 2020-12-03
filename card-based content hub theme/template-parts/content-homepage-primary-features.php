<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

$GLOBALS['homepage-exclude'] = array();

$articleSource = get_field('primary_article_source');
$bannerTitle = get_field('primary_banner_text');
$bannerSubtext = get_field('primary_banner_subtext');
$banners = get_field('primary_banner_background_options');
$bannerImg = "";

$button = get_field('banner_button');
$button2 = get_field('second_banner_button');
$numButtons = 0;

if( $button ) { $numButtons++; }
if( $button2 ) { $numButtons++; }

if ($banners && count($banners) > 1 ) {
	$count = count($banners) -1;
	$index = rand(0, $count);
	$bannerImg = $banners[$index]['image'];


} elseif( count($banners) == 1 ) {
	$bannerImg = $banners[0]['image'];
}

if($bannerImg){
	$imgUrlDesktopArray = wp_get_attachment_image_src($bannerImg, 'full', true);
	$imgUrlDesktop = $imgUrlDesktopArray[0];
	$imgUrlMobileArray = wp_get_attachment_image_src($bannerImg, 'medium_large', true);
	$imgUrlMobile = $imgUrlMobileArray[0];
	?>

	<style scoped>
		.home-hero-banner-image {
		    background-image: url(<?php echo esc_url( $imgUrlMobile ); ?>); 
		}
		@media only screen and (min-width: 1200px) {
		    .home-hero-banner-image {   
		        background-image: url(<?php echo esc_url( $imgUrlDesktop ); ?>);
		    }
		}
	</style>

	<?php
}

if ( $bannerTitle ):?>

<div class="down-arrow-wrapper">

	<?php if( $numButtons == 1 ): ?>

		<?php if ($button):?>

		<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">

		<?php else: ?>

		<a href="<?php echo esc_url( $button2['url'] ); ?>" target="<?php echo esc_attr( $button2['target'] ); ?>">

		<?php endif; ?>

	<?php endif; ?>
		
	<div class="banner home-hero-banner home-hero-banner-image">	

		<?php if( get_field('primary_include_video_overlay') ): ?>

			<video id="video-1" class="mobile" src="/wp-content/themes/api/videos/API_WebLoop_Swimmer_1800x560.mp4" loop="loop" muted="muted"></video>

		<?php endif; ?>
	
		<div class="banner-inner">
		
			<div class="container container-banner">

				<h2><?php echo esc_html( $bannerTitle ); ?></h2>

				<?php if ( $bannerSubtext ): ?>

					<p><?php echo esc_html( $bannerSubtext ); ?></p>			
				<?php endif; ?>

				<?php if( $numButtons == 2 ): ?>
					<div class="buttons-wrapper">
				<?php endif; ?>

					<?php if ( $button ):?>

						<?php if($numButtons > 1 ): ?>

							<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="button dark-teal"><?php echo esc_attr( $button['title'] ); ?></a>

						<?php else: ?>

							<span class="button dark-teal"><?php echo esc_attr( $button['title'] ); ?></span>
							
						<?php endif;?>

					<?php endif; ?>


					<?php if ( $button2 ):?>

						<?php if($numButtons > 1 ): ?>

							<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="button dark-teal"><?php echo esc_attr( $button2['title'] ); ?></a>

						<?php else: ?>

							<span class="button dark-teal"><?php echo esc_attr( $button2['title'] ); ?></span>

						<?php endif;?>

					<?php endif; ?>

				

				<?php if( $numButtons == 2 ): ?>
					</div>
				<?php endif; ?>

			</div>

		</div>

	</div>

	<?php if( $numButtons =1 ): ?>
		</a>
	<?php endif; ?>

	<?php if( get_field('down_arrow') ): ?>
		<a href="#primary-featured" class="down-arrow"></a>
	<?php endif; ?>
	
</div>

<?php endif; ?>

<section id="primary-featured">
	<?php if( $articleSource === 'Custom'):?>
			
		<?php if( have_rows('primary_custom_articles') ): 
			$count = count(get_field('primary_custom_articles'));
			$i = 1;?>

			<section class="container homepage__primary-featured-articles featured-articles article-layout__<?php echo $count; ?>">
				
				<?php while( have_rows('primary_custom_articles') ): the_row(); 
					
					$article = get_sub_field('article');

					if ($article) {
						$post = $article;
						setup_postdata( $post );

						array_push( $GLOBALS['homepage-exclude'], get_the_ID() );
					}

					if ( $count == 3 && $i == 2 ) {
						echo "<div class=\"card-short\" >";
					}
					?>
					
					<div class="card-wrap card-border article-card card-<?php echo $i; ?>">
						<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
					</div>	

				<?php

					if ( $count == 3 && $i == 3 ) {
						echo "</div>";
					}

					$i++;
					wp_reset_postdata();

					endwhile; 
				?>

			</section>

		<?php endif; ?>

	<?php else:?>
		<!-- AUTOMATED -->

		<?php 
			$the_query = new WP_Query( array( 
				'post_type' 		=>  array('article','page','generation-energy'),
				'post_status'       => 'publish',
				'posts_per_page'    => 4,
				'orderby'           => 'ID',
	    		'order'             => 'DESC'
			) );

			$i = 1;

		if ( $the_query->have_posts() ) : 
			$count = $the_query->post_count; 
			?>

			<section class="container homepage__primary-featured-articles featured-articles article-layout__<?php echo $count; ?>">


				<?php while ( $the_query->have_posts() ) : $the_query->the_post();

					array_push( $GLOBALS['homepage-exclude'], get_the_ID() );

					if ( $count == 4 && $i == 2 ) {
						echo "<div class=\"card-short\" >";
					}
				?> 

					<div class="card-wrap card-border article-card card-<?php echo $i; ?>">
						<!-- Pass Data to Card Template -->
						<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
					</div>	

					<?php 
						if ( $count == 4 && $i == 4 ) {
							echo "</div>";
						}

						$i++; 
					?>

				<?php endwhile; wp_reset_query(); ?>

			</section>

		<?php endif; ?>

	<?php endif; ?>
</section>
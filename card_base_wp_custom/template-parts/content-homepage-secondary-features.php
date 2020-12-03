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

$button = get_field('secondary_banner_button');
$button2 = get_field('secondary_second_banner_button');
$numButtons = 0;

if( $button ) { $numButtons++; }
if( $button2 ) { $numButtons++; }

if ( $bannerTitle ):
?>
	
	<div class="banner secondary-banner" style="background-image: url(<?php echo esc_url( $bannerImg ); ?>)">
		
		<?php if( get_field('secondary_include_video_overlay') ): ?>
		
			<video id="mobile-second-banner" class="mobile" src="/wp-content/themes/api/videos/API_CarVideo_1800x560_v2.mp4" muted="muted" loop="loop"></video>

		<?php endif; ?>

		<div class="banner-inner">
			
			<div class="container container-banner">

				<h2><?php echo esc_html( $bannerTitle ); ?></h2>

				<?php if ( $bannerSubtext ): ?>

					<p><?php echo esc_html( $bannerSubtext ); ?></p>
					
				<?php endif; ?>

				<?php if($numButtons == 2 ): ?>
					<div class="buttons-wrapper">
				<?php endif; ?>

					<?php if ($button):?>
						<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>" class="button dark-teal"><?php echo esc_attr( $button['title'] ); ?></a>
					<?php endif; ?>

					<?php if ($button2):?>
						<a href="<?php echo esc_url( $button2['url'] ); ?>" target="<?php echo esc_attr( $button2['target'] ); ?>" class="button dark-teal"><?php echo esc_attr( $button2['title'] ); ?></a>
					<?php endif; ?>

				<?php if($numButtons == 2 ): ?>
					</div>
				<?php endif; ?>

				<?php if( get_field('second_down_arrow') ): ?>
					<a href="#secondary-featured" class="down-arrow"></a>
				<?php endif; ?>

			</div>
		</div>
	</div>

<?php endif; ?>

<section id="secondary-featured">
	<?php if( $articleSource === 'Custom'):?>
		<!-- CUSTOM SELECTED -->
		<?php if( have_rows('secondary_custom_articles') ): 
			$count = count(get_field('secondary_custom_articles'));
			$i = 1;?>

			<section class="container homepage__secondary-featured-articles featured-articles article-layout__<?php echo $count; ?>">
				<?php while( have_rows('secondary_custom_articles') ): the_row(); 
					$article = get_sub_field('secondary_article');

					if ($article) {
						$post = $article;
						setup_postdata( $post ); 
					}?>
					
					<div class="card-wrap card-border article-card card-<?php echo $i; ?>">
						<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
					</div>	
				<?php 
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
				'post_type' 		=> array('article','page','generation-energy'),
				'post_status'       => 'publish',
				'posts_per_page'    => 4,
				'post__not_in'      => $GLOBALS['homepage-exclude'],
				'orderby'           => 'ID',
	    		'order'             => 'DESC'
			) );
			$count = $the_query->post_count;
			$i = 1;

		if ( $the_query->have_posts() ) : ?>
			<section class="container homepage__secondary-featured-articles featured-articles article-layout__<?php echo $count; ?>">	
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

					<div class="card-wrap card-border article-card card-<?php echo $i; ?>">
						<!-- Pass Data to Card Template -->
						<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
					</div>	

					<?php $i++; ?>

				<?php endwhile; wp_reset_query(); ?>
			</section>
		<?php endif; ?>
	<?php endif; ?>
</section>
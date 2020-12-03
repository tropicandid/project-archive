<?php
/**
 * The template for displaying all single generation energy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sfig
 */

get_header();

$geName = get_field('ge_name');
$geImage = get_field('ge_image');
$geTitle = get_field('ge_title');
$geCompany = get_field('ge_company');
$geLocation = get_field('ge_location');
$geSummary = get_field('ge_summary');
?>
	

	<div class="content-area-background paper">

		<div class="content-area-background-content">

			<div class="container alt">

				<section class="single-content background-white border">
					

					<section class="profile-wrap">

						<section class="profile-top">

							<div class="profile-top-image">
								<div class="ge-card__img left">
									<?php 
										if ( $geImage ):
									?>
											<?php $geImageSize = 'thumbnail'; ?>
											<?php echo wp_get_attachment_image( $geImage, $geImageSize ); ?>
									<?php 
										endif;
									?>
								</div>
							</div>

							<div class="profile-top-text">

								<p class="profile-top-text-name"><?php echo esc_html( $geName ); ?></p>

								<p class="profile-top-text-info"><?php if ( $geTitle ): echo esc_html( $geTitle ); endif; ?><?php if ( $geTitle && $geCompany ): echo ', '; endif; ?><?php if ( $geCompany ): echo esc_html( $geCompany ); endif; ?></p>
								<p class="upper-sans-bold no-marg"><?php if ( $geLocation ): echo esc_html( $geLocation ); endif; ?></p>
								
							</div>

						</section>

						<section class="profile-bottom">

							<?php echo $geSummary; ?>

							

						</section>

					</section>
					

					<div class="single-content-bottom section-social-sticky">

						<div class="addthis-side-wrapper alt">
							<div class="addthis_inline_share_toolbox"></div>
						</div>
							
						<h1 class="purple"><?php echo get_the_title(); ?></h1>
					
						<div class="subtext">
							<?php echo get_field('subtext'); ?>
						</div>

						<?php
							if ( has_post_thumbnail() ) {
								echo the_post_thumbnail('large');
							}
						?>

						<?php get_template_part( 'template-parts/content-authorby' ); ?>

						<div class="single-date"><p class="upper-sans-bold no-marg"><?php the_time( 'F j, Y' ); ?></p></div>
					
						<?php the_content(); ?>
						
						<?php get_template_part( 'template-parts/content-authorimages' ); ?>

					</div>


				</section>

			</div>

		</div>

	</div>

	<?php get_template_part( 'template-parts/content-relatedarticles' ); ?>


<?php
get_footer(); ?>
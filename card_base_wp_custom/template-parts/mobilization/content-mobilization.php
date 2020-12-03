<?php
/**
 * Template part for displaying mobilization landing pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if( have_rows('mobilization_page_blocks') ):

		// Loop through rows.
		while ( have_rows('mobilization_page_blocks') ) : the_row();
		
			if( get_row_layout() == 'mobilization_long_form_text' ):
				
				get_template_part( 'template-parts/mobilization/mobilization-long-form-text' );

			elseif( get_row_layout() == 'mobilization_pull_quote' ):

				get_template_part( 'template-parts/mobilization/mobilization-pull-quote' );

			elseif( get_row_layout() == 'mobilization_basic_hero' ):

				get_template_part( 'template-parts/mobilization/mobilization-basic-hero' );

			elseif( get_row_layout() == 'mobilization_single_column_teaser' ):

				get_template_part( 'template-parts/mobilization/mobilization-single-column-teaser' );

			elseif( get_row_layout() == 'mobilization_two_column_teaser' ):

				get_template_part( 'template-parts/mobilization/mobilization-two-column-teaser' );

			elseif( get_row_layout() == 'mobilization_embedded_video' ):

				get_template_part( 'template-parts/mobilization/mobilization-embedded-video' );

			elseif( get_row_layout() == 'mobilization_video_teaser' ):

				get_template_part( 'template-parts/mobilization/mobilization-video-teaser' );

			elseif( get_row_layout() == 'mobilization_promo' ):

				get_template_part( 'template-parts/mobilization/mobilization-promo' );	
			
			elseif( get_row_layout() == 'mobilization_promo_form' ):

				get_template_part( 'template-parts/mobilization/mobilization-promo-form' );	

			elseif( get_row_layout() == 'mobilization_form' ):

				get_template_part( 'template-parts/mobilization/mobilization-form' );	

			elseif( get_row_layout() == 'mobilization_cards' ):

					get_template_part( 'template-parts/mobilization/mobilization-cards' );
					
			elseif( get_row_layout() == 'mobilization_related_content' ):

				get_template_part( 'template-parts/mobilization/mobilization-related-content' );				

			endif;		
		// End loop.
		endwhile;

	endif;  ?>

</article><!-- #post-<?php the_ID(); ?> -->

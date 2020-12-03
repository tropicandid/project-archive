<?php

/**
 * Template Name: Page Sections
 * Template Post Type: page
**/

get_header(); 

?>


<div id="primary" class="content-area">
		
	<main id="main" class="site-main">
		
		<div class="container">

			<section class="single-content background-white border">

				<div class="pagesections">

					<?php
						if ( has_post_thumbnail() ) {
							echo the_post_thumbnail('full');
						}
					?>

					<?php the_content(); ?>

					<?php
						$mainHeader = get_field('pagesec_main_header');
						$mainText = get_field('pagesec_main_text');
						$pageSections = get_field('pagesec_sections');
					?>

					<?php if ($mainHeader): ?>
						<h1 class="dark-teal upper weight700"><?php echo $mainHeader; ?></h1>
					<?php endif; ?>

					<?php if ($mainText): ?>
						<?php echo $mainText; ?>
					<?php endif; ?>

					<?php
						if( have_rows('pagesec_sections') ):
						    while ( have_rows('pagesec_sections') ) : the_row(); ?>

						    	<section class="pagesections-section">

						    		<?php
						    			$sectionHeader = get_sub_field('pagesec_sections_header');
										$sectionText = get_sub_field('pagesec_sections_text');
									?>

						    		<?php if ($sectionHeader): ?>
						    			<h2 class="large dark-teal"><?php echo $sectionHeader; ?></h2>
						    		<?php endif; ?>

						    		<?php if ($sectionText): ?>
						    			<?php echo $sectionText; ?>
						    		<?php endif; ?>

								</section>

						    <?php endwhile;
						endif;
					?>

					

				</div>

			</section>

		</div>

	</main>

</div>


<?php get_footer(); ?>
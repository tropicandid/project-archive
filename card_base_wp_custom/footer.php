<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package api
 */

?>

	</div><!-- #content -->

	<?php 
		$footerTop = get_field('footertop_section', 'option'); 

		if( get_field('homepage_footer_cta') ) {
			$footerTop = get_field('homepage_footer_cta'); 
		}
		

	// HAVE CONDITIONAL TO DETERMINE IF THE HOMEPAGE ONE SHOULD BE USED INSTEAD FOR ABOVE THE FOOTER.
	?>

    <?php
    	$footerTopImageId = $footerTop['footertop_image'];
		$footerTopImageUrlArray = wp_get_attachment_image_src($footerTopImageId, 'cta', true);
		$footerTopImageUrl = $footerTopImageUrlArray[0];

    	$footerTopHeader = $footerTop['footertop_header'];
        $footerTopText = $footerTop['footertop_text'];
        $footerTopButton = $footerTop['footertop_button'];
        $footerTopButton2 = $footerTop['second_button'];

        $numButtons = 0;

        if( $footerTopButton ) { $numButtons++; }
        if( $footerTopButton2 ) { $numButtons++; }
    ?>

    <div class="site-footer__banner" style="background-image: url(<?php echo $footerTopImageUrl; ?>);">
    	<div class="container">

    		<div class="site-footer__banner-text">

		    	<?php if ($footerTopHeader):?><h2><?php echo $footerTopHeader; ?></h2><?php endif; ?>

		    	<?php if ($footerTopText):?><p><?php echo $footerTopText; ?></p><?php endif; ?>
				
				<?php if($numButtons == 2 ): ?>
					<div class="buttons-wrapper">
				<?php endif; ?>

					<?php if ($footerTopButton):?>
						<a href="<?php echo esc_url( $footerTopButton['url'] ); ?>" target="<?php echo esc_attr( $footerTopButton['target'] ); ?>" class="button dark-teal"><?php echo esc_attr( $footerTopButton['title'] ); ?></a>
					<?php endif; ?>

					<?php if ($footerTopButton2):?>
						<a href="<?php echo esc_url( $footerTopButton2['url'] ); ?>" target="<?php echo esc_attr( $footerTopButton2['target'] ); ?>" class="button dark-teal"><?php echo esc_attr( $footerTopButton2['title'] ); ?></a>
					<?php endif; ?>

				<?php if($numButtons == 2 ): ?>
					</div>
				<?php endif; ?>

			</div>

		</div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="site-footer__subscribe">
				
				<?php $footerCta = get_field('footercta_section', 'option');
				
				if( $footerCta ): ?>

					    <?php
					        $footerCtaText = $footerCta['footercta_text'];
					        $footerCtaButton = $footerCta['footercta_button'];
					    ?>

					    
						<p><?php echo $footerCtaText; ?></p>
						<a href="<?php echo esc_url( $footerCtaButton['url'] ); ?>" target="<?php echo esc_attr( $footerCtaButton['target'] ); ?>" class="button white white-on-teal card-button"><?php echo esc_attr( $footerCtaButton['title'] ); ?></a>
						

				<?php endif; ?>

			</div>

			<div class="site-footer__middle-row">

				<nav id="site-footer__navigation" class="site-footer__navigation">	

					<?php
					wp_nav_menu( array(
						'menu'            => 'Footer Navigation',
						'menu_id'         => 'footer-menu',
						'container_class' => 'footer-navigation__items'
					) );
					?>
				</nav><!-- #site-navigation -->

				<div class="site-footer__branding">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/efp-logo.svg" alt="API logo with branding text"></a>
				</div><!-- .site-branding -->

				<div class="social-wrapper"> 

					<div class="site-header-menu-social global-social site-footer__social">
						<?php
							$globalTwitter = get_field('global_twitter', 'option');
							$globalFacebook = get_field('global_facebook', 'option');
							$globalYoutube = get_field('global_youtube', 'option');
							$globalLinkedin = get_field('global_linkedin', 'option');
						?>
						<?php if ($globalTwitter): ?>
							<a href="<?php echo $globalTwitter; ?>" class="global-social-icon twitter alt" target="_blank">Twitter</a>
						<?php endif; ?>
						<?php if ($globalFacebook): ?>
							<a href="<?php echo $globalFacebook; ?>" class="global-social-icon facebook alt" target="_blank">Facebook</a>
						<?php endif; ?>
						<?php if ($globalYoutube): ?>
							<a href="<?php echo $globalYoutube; ?>" class="global-social-icon youtube alt" target="_blank">Youtube</a>
						<?php endif; ?>
						<?php if ($globalLinkedin): ?>
							<a href="<?php echo $globalLinkedin; ?>" class="global-social-icon linkedin alt" target="_blank">LinkedIn</a>
						<?php endif; ?>
					</div><!-- .site-footer__social -->

				</div>

			</div>

			<div class="site-footer__legal">
				<a href="<?php echo get_field('footerapi_link', 'options'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/api-logo.png?2020" alt="API logo"></a>

				<div>

					<p class="copyright">&copy; Copyright <?php echo date("Y"); ?> - API. All Rights Reserved</p>

					<?php
					wp_nav_menu( array(
						'menu'            => 'Legal Menu',
						'menu_id'         => 'legal-menu',
						'container_class' => 'legal-navigation__items'
					) );
					?>
				</div>

			</div><!-- .site-footer__legal -->

		</div>
	</footer><!-- #colophon -->

	<div id="data-disclaimer" class="data-transparenty-layer hidden">
		<?php echo get_field('data_disclaimer_text','options'); ?>
		<a id="data-disclaimer-button" href="#!" class="button white-on-purple">accept</a>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

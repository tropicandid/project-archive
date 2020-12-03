<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package api
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!-- Hotjar Tracking Code for https://energyforprogress.org -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:1599403,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	
</head>

<body <?php body_class(); ?>>
	<!-- Google 
Tag Manager (noscript) -->

<noscript><iframe
src="https://www.googletagmanager.com/ns.html?id=GTM-PVM5ZFJ"

height="0"
width="0"
style="display:none;visibility:hidden"></iframe></noscript>

<!-- End 
Google Tag 
Manager (noscript) -->
<div id="page" class="site">

	<div class="brought-by__bar">
		<div class="container">

			<div class="site-header-menu-social global-social">
				<?php
					$globalTwitter = get_field('global_twitter', 'option');
					$globalFacebook = get_field('global_facebook', 'option');
					$globalYoutube = get_field('global_youtube', 'option');
					$globalLinkedin = get_field('global_linkedin', 'option');
				?>
				<?php if ($globalTwitter): ?>
					<a href="<?php echo $globalTwitter; ?>" class="global-social-icon twitter white" target="_blank">Twitter</a>
				<?php endif; ?>
				<?php if ($globalFacebook): ?>
					<a href="<?php echo $globalFacebook; ?>" class="global-social-icon facebook white" target="_blank">Facebook</a>
				<?php endif; ?>
				<?php if ($globalYoutube): ?>
					<a href="<?php echo $globalYoutube; ?>" class="global-social-icon youtube white" target="_blank">Youtube</a>
				<?php endif; ?>
				<?php if ($globalLinkedin): ?>
					<a href="<?php echo $globalLinkedin; ?>" class="global-social-icon linkedin white" target="_blank">LinkedIn</a>
				<?php endif; ?>
			</div>

			<?php if ( get_field('subscribe_cta', 'option') ): ?>
				<a href="<?php echo get_field('subscribe_cta', 'option')['url']; ?>" class="subscribe" target="_blank"><?php echo get_field('subscribe_cta', 'option')['title']; ?></a>
			<?php endif; ?>
		</div>
	</div>

	<header id="masthead" class="site-header">

		<div class="container">

			<a href="#" id="menu-toggle" class="site-header-menu-toggle">
				<div class="line-x-animation">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</a>

			<div class="site-header-logo">
				<a href="<?php echo get_home_url(); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/assets/icons/header-logo.svg" alt="API Logo">
				</a>
			</div><!-- .site-branding -->

			<?php if ( is_nav_menu('read-time-filter')): ?>

				<div id="read-time-toggle" class="site-header-read-time">
					<div id="read-time__menu" class="read-time__menu">
						<h3 class="title">Read Time</h3>

						<?php
							wp_nav_menu( array(
								'menu'            => 'Read Time Filter',
								'menu_id'         => 'read-time-menu'
							) );
						?>
					</div>
				</div>

			<?php endif;?>

			<div class="site-header-search search-overlay-toggle"></div><!-- .site-search -->

		</div>

		<div id="header-menu" class="site-header-menu">

			<div class="site-header-menu-inner">

				<div class="container">

					<div class="site-header-menu-top">

						<div class="site-header-menu-wrap">

							<nav class="site-header-menu-nav">

								<?php
									wp_nav_menu( array(
										'menu'            => 'Primary Navigation',
										'theme_location'  => 'menu-1',
										'menu_id'         => 'primary-menu',
										'container_class' => 'primary-menu'
									) );
								?>

								<div class="site-header-menu-social global-social global-social-dropdown">
									<?php
										$globalTwitter = get_field('global_twitter', 'option');
										$globalFacebook = get_field('global_facebook', 'option');
										$globalYoutube = get_field('global_youtube', 'option');
										$globalLinkedin = get_field('global_linkedin', 'option');
									?>
									<?php if ($globalTwitter): ?>
										<a href="<?php echo $globalTwitter; ?>" class="global-social-icon twitter teal" target="_blank">Twitter</a>
									<?php endif; ?>
									<?php if ($globalFacebook): ?>
										<a href="<?php echo $globalFacebook; ?>" class="global-social-icon facebook teal" target="_blank">Facebook</a>
									<?php endif; ?>
									<?php if ($globalYoutube): ?>
										<a href="<?php echo $globalYoutube; ?>" class="global-social-icon youtube teal" target="_blank">Youtube</a>
									<?php endif; ?>
									<?php if ($globalLinkedin): ?>
										<a href="<?php echo $globalLinkedin; ?>" class="global-social-icon linkedin teal" target="_blank">LinkedIn</a>
									<?php endif; ?>
								</div>

								<div class="subscribe-btn"><a class="button dark-teal" href="/subscribe">Subscribe</a></div>

							</nav>

							<div class="site-header-menu-feature">

								<?php

									$globalNavFeatured = get_field('global_nav_featured', 'option');

									if( $globalNavFeatured ): ?>
									    
									    <?php $navArticleSectionTitle = get_field('global_nav_featured_title', 'option'); ?>

										<?php if ($navArticleSectionTitle): ?><a href="<?php echo get_permalink(get_the_ID());?>" class="site-header-menu-feature-title"><?php echo $navArticleSectionTitle; ?></a><?php endif; ?>

									    <?php foreach( $globalNavFeatured as $post): // variable must be called $post (IMPORTANT) ?>
									        <?php setup_postdata($post); ?>
									        <div class="card-wrap card-border card-featured card-purple">
												<?php get_template_part( 'template-parts/content', 'card-stripped' ); ?>
											</div>
									    <?php endforeach; ?>

									    <?php wp_reset_postdata();?>

								<?php endif; ?>

							</div>

						</div>

					</div>

					<div class="site-header-menu-bottom">
						<div class="site-header-menu-details">
							<a href="<?php echo get_field('footerapi_link', 'options'); ?>" target="_blank">
								<img src="<?php bloginfo('template_directory'); ?>/assets/images/api-logo-small.png?2020" alt="API Logo">
							</a>
							<p>Brought to you by the American Petroleum Institute</p>
						</div>

						<div class="site-header-menu-social global-social gray">
							<?php
								$globalTwitter = get_field('global_twitter', 'option');
								$globalFacebook = get_field('global_facebook', 'option');
								$globalYoutube = get_field('global_youtube', 'option');
								$globalLinkedin = get_field('global_linkedin', 'option');
							?>
							<?php if ($globalTwitter): ?>
								<a href="<?php echo $globalTwitter; ?>" class="global-social-icon twitter" target="_blank">Twitter</a>
							<?php endif; ?>
							<?php if ($globalFacebook): ?>
								<a href="<?php echo $globalFacebook; ?>" class="global-social-icon facebook" target="_blank">Facebook</a>
							<?php endif; ?>
							<?php if ($globalYoutube): ?>
								<a href="<?php echo $globalYoutube; ?>" class="global-social-icon youtube" target="_blank">Youtube</a>
							<?php endif; ?>
							<?php if ($globalLinkedin): ?>
								<a href="<?php echo $globalLinkedin; ?>" class="global-social-icon linkedin" target="_blank">LinkedIn</a>
							<?php endif; ?>
						</div>
					</div>

				</div>

			</div>

		</div><!-- #site-navigation -->

	</header><!-- #masthead -->

	<section class="global-search">
		<div class="global-search-inner">
			<div class="global-search-close search-overlay-toggle"></div>
			<?php get_search_form(); ?>
		</div>
	</section>

	<div id="content" class="site-content">
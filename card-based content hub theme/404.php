<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package api
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<div class="single-background-wrap"></div>

		<section class="error-404 not-found container">
			<header class="text-center">
				<h1><?php esc_html_e( '404 That page can&rsquo;t be found.', 'api' ); ?></h1>
				<p><?php esc_html_e( 'Can\'t find what you are looking for? Take a look at some of our recent work here!', 'api' ); ?></p>
			</header><!-- .page-header -->

			<div class="page-content">
				
				<!-- Secondary Featured Article Block -->
				<?php get_template_part( 'template-parts/content', 'homepage-secondary-features' ); ?>
				
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

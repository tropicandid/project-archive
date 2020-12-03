<?php
/**
 * api functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package api
 */

if ( ! function_exists( 'api_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function api_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on api, use a find and replace
		 * to change 'api' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'api', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'api' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'api_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/* Options Page */

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> 'Theme General Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}
	}
endif;
add_action( 'after_setup_theme', 'api_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function api_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'api_content_width', 640 );
}
add_action( 'after_setup_theme', 'api_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function api_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'api' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'api' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'api_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function api_scripts() {

	wp_enqueue_style( 'typekit', '//use.typekit.net/lzy5aem.css', array(), null );
	wp_enqueue_style( 'typekit-update', '//use.typekit.net/wsx8qvx.css', array(), null );
	wp_enqueue_style( 'api-style', get_stylesheet_uri(), array(), '15961149049230', false );
	wp_enqueue_script( 'scroll-magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js' );
    wp_enqueue_script( 'scroll-magic-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js' );

    wp_enqueue_script( 'timeline-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.1/TimelineMax.min.js' );
    wp_enqueue_script( 'tween-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.1/TweenMax.min.js' );
    

	wp_enqueue_script( 'api-js', get_template_directory_uri() . '/assets/main.min.js', array(), filemtime( get_template_directory() . '/assets/main.min.js' ), true );

	wp_enqueue_script( 'api-vimeo', 'https://player.vimeo.com/api/player.js', true );

	wp_enqueue_script( 'api-navigation', get_template_directory_uri() . '/js/navigation.js', array(), filemtime( get_template_directory() . '/js/navigation.js' ), true );

	wp_enqueue_script( 'api-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular( array('article') ) || is_singular( array('external-article') ) || is_singular( array('generation-energy') ) ) {
		wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5db89402f8c58c40', array(), null );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'api_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


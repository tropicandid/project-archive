<?php
/**
*
* Custom ACF-based Timeline component 
*
**/


/* Enqueue styles and scripts needed */
function acf_enqueue_script() {   
	// JS
	wp_enqueue_script('slick-slider', plugin_dir_url(__FILE__) . '/inc/js/slick.min.js', array('jquery'));
	wp_enqueue_script('plugin-script', plugin_dir_url(__FILE__) . '/inc/js/script.js', array('jquery'), filemtime( plugin_dir_path(__FILE__) . '/inc/js/script.js' ) , true);

	// CSS
	wp_enqueue_style('slick-styles', plugin_dir_url(__FILE__) . '/inc/css/slick.css');
	wp_enqueue_style('plugin-styles', plugin_dir_url(__FILE__) . '/inc/style.css',array(), filemtime( plugin_dir_path(__FILE__) . '/inc/style.css' ), false);
}
add_action('wp_enqueue_scripts', 'acf_enqueue_script');



/* CONSTRUCT ACF */
require_once dirname( __FILE__ ) . '/inc/timeline-acf.php';

/* CONSTRUCT TIMELINE HTML */
require_once dirname( __FILE__ ) . '/inc/timeline-html.php';
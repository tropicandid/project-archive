<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package api
 */




$taxonomies = get_the_terms(get_the_ID(),'topic-tax');
$count = count($taxonomies);
if ( $taxonomies) {
	foreach ($taxonomies as $key => $value) { 
		echo "<a class=\"topic\" href=\"".get_home_url()."/topic/". esc_html( $value->slug )."\">". esc_html( $value->name )."</a>";

		if ( $key < ($count-1) ) {
			echo ", ";
		}
	}
}
?>
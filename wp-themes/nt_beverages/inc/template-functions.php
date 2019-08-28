<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package nt_beverages
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nt_beverages_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'nt_beverages_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function nt_beverages_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'nt_beverages_pingback_header' );

function change_menu_classes($css_classes) {
	$css_classes = str_replace("current-menu-item", "active", $css_classes);
	$css_classes = str_replace("current_page_item", "active", $css_classes);
    $css_classes = str_replace("current-menu-parent", "active", $css_classes);
	$css_classes = str_replace("current-menu-ancestor", "active", $css_classes);
	return $css_classes;
}
add_filter('nav_menu_css_class', 'change_menu_classes');

require_once('customepostitem.php');

//Add Image Size
add_image_size('media_thumb', 560, 318, true);

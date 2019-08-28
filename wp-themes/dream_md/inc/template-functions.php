<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package dream_md
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dream_md_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'dream_md_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dream_md_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'dream_md_pingback_header' );

function change_menu_classes($css_classes) {
	$css_classes = str_replace("current-menu-item", "active", $css_classes);
	$css_classes = str_replace("current_page_item", "active", $css_classes);
    $css_classes = str_replace("current-menu-parent", "active", $css_classes);
	$css_classes = str_replace("current-menu-ancestor", "active", $css_classes);
	return $css_classes;
}

add_filter('nav_menu_css_class', 'change_menu_classes');

function jh_get_department($post_id) {
	$cat_args = array(
		'taxonomy' => get_query_var('teams-cat')
	);
	$ignored_cats = array("Staff", "Doctors");

	$cats_string = strip_tags(get_the_term_list($post_id, 'teams-cat'));
	// var_dump(wp_get_post_categories($post_id, $cat_args));
	// var_dump(get_the_term_list($post_id, 'teams-cat'));
	return str_replace($ignored_cats, "", $cats_string );

}

require_once('customepostitem.php');
require_once('aq_resizer.php');
require_once('shortcodes.php');

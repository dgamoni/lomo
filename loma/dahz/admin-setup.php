<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * DahzFramework Setup.
 *
 * All functionality used for setting up the DahzFramework.
 *
 * @package WordPress
 * @subpackage  DahzFramework
 * @category  Core
 * @author  Dahz
 * @since  1.0.0
 *
 */

if ( ! function_exists( 'df_load_textdomain' ) ) {
/**
 * Load the theme's textdomain, as well as an optional child theme textdomain.
 * @since  1.0.0
 * @return void
 */
function df_load_textdomain () {
	load_theme_textdomain( 'dahztheme' );
	load_theme_textdomain( 'dahztheme', get_template_directory() . '/includes/assets/lang' );
	if ( function_exists( 'load_child_theme_textdomain' ) )
		load_child_theme_textdomain( 'dahztheme' );
} // End df_load_textdomain()
}

add_action( 'init', 'df_load_textdomain', 10 );


/**
 * Function for grabbing a WP nav menu theme location name.
 *
 * @since  1.1.0
 * @access public
 * @param  string  $location
 * @return string
 */
function dahz_get_menu_location_name( $location ) {

	$locations = get_registered_nav_menus();

	return $locations[ $location ];
}

/**
 * Function for grabbing a dynamic sidebar name.
 *
 * @since  1.1.0
 * @access public
 * @param  string  $sidebar_id
 * @return string
 */
function dahz_get_sidebar_name( $sidebar_id ) {
	global $wp_registered_sidebars;

	if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) )
		return $wp_registered_sidebars[ $sidebar_id ]['name'];
}

/**
 * Adds the default framework actions and filters.
 *
 * @since 1.1.0
 */
function df_default_filters() {
	/* Make text widgets and term descriptions shortcode aware. */
	add_filter( 'widget_text', 'do_shortcode' );
	add_filter( 'term_description', 'do_shortcode' );
	add_filter( 'the_excerpt', 'do_shortcode');
}
/* Initialize the framework's default actions and filters. */
add_action( 'after_setup_theme', 'df_default_filters', 3 );


if ( ! function_exists( 'dahz_comment_reply' ) ) {
/**
 * Enqueue the comment reply JavaScript on singular entry screens.
 * @since  1.0.0
 * @return void
 */
function dahz_comment_reply() {
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) wp_enqueue_script( 'comment-reply' );
} // End dahz_comment_reply()
}

add_action( 'wp_enqueue_scripts', 'dahz_comment_reply', 5 );


/* ----------------------------------------------------------------------------------- */
/* Convert Hex to RGBA                                                                  */
/* ----------------------------------------------------------------------------------- */
if (!function_exists('df_convert_rgba')) {

    function df_convert_rgba($color, $opacity) {
        $color = str_replace("#", "", $color);

        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
        $a = intval($opacity) / 100;

        return "rgba($r, $g, $b, $a)";
    }

}
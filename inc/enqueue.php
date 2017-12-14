<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-custom-styles', get_stylesheet_directory_uri() . '/css/font.css', array(), $the_theme->get( 'Version' ) );
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

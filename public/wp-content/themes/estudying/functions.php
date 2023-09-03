<?php
/**
 * Estudying Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package estudying
 */

add_action( 'wp_enqueue_scripts', 'astra_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function astra_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'astra-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style(
		'estudying-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'astra-style' )
	);
}

// Constants
define('ESTUDYING_DIR',trailingslashit(get_stylesheet_directory()));
define('ESTUDYING_DIR_URI',trailingslashit(get_stylesheet_directory_uri()));


// Init Carbon Fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once 'vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action('admin_enqueue_scripts','enqueue_admin_scripts');
function enqueue_admin_scripts(){
    wp_enqueue_style('admin-css-estudying',ESTUDYING_DIR_URI . 'admin-style.css');
}


// Require Custom Fields
require_once ESTUDYING_DIR . 'inc/custom-fields/course.php';
require_once ESTUDYING_DIR . 'inc/custom-fields/module.php';
require_once ESTUDYING_DIR . 'inc/custom-fields/speciality.php';

// Require Classes
require_once ESTUDYING_DIR . 'inc/classes/class-course.php';
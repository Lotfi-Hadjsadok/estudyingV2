<?php
/*
Plugin Name:    Estudying
Plugin URI:     https://www.facebook.com/lotfihadjsadok.dev
Description:    Estudying.
Author:         Lotfi Hadjsadok
Author URI:     https://www.facebook.com/lotfihadjsadok.dev
Version:        0.1.0
*/

// Constants
define( 'ESTUDYING_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'ESTUDYING_DIR_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );


// Init Carbon Fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once 'vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );
function enqueue_admin_scripts() {
	wp_enqueue_style( 'admin-css-estudying', ESTUDYING_DIR_URI . 'admin-style.css' );
}



// Require Custom Fields
require_once ESTUDYING_DIR . 'inc/custom-fields/course.php';
require_once ESTUDYING_DIR . 'inc/custom-fields/module.php';
require_once ESTUDYING_DIR . 'inc/custom-fields/speciality.php';

// Require Classes
require_once ESTUDYING_DIR . 'inc/classes/class-course.php';
require_once ESTUDYING_DIR . 'inc/classes/class-module.php';
require_once ESTUDYING_DIR . 'inc/classes/class-speciality.php';


// Routs
require_once ESTUDYING_DIR . 'inc/routing/routing.php';
require_once ESTUDYING_DIR . 'inc/routing/course.php';


// Custom Templates
add_action( 'template_include', 'post_types_templates' );
function post_types_templates( $template ) {
	if ( is_single() && in_array( get_post_type(), array( 'course', 'module', 'speciality' ) ) ) {
		$post_type = get_post_type();
		$template  = ESTUDYING_DIR . "single-$post_type.php";
	}
	return $template;
}



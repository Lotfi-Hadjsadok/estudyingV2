<?php
/**
 * Custom Rewrite Rules
 */

function custom_rewrite_rules() {
    // Course
	add_rewrite_rule(
		'^usthb/([^/]+)/([^/]+)/([^/]+)/([^/]+)?$',
		'index.php?post_type=course&speciality_var=$matches[1]&semester_var=$matches[2]&module_var=$matches[3]&name=$matches[4]',
		'top'
	);

    // Module
	add_rewrite_rule(
		'^usthb/([^/]+)/([^/]+)/([^/]+)?$',
		'index.php?post_type=module&speciality_var=$matches[1]&semester_var=$matches[2]&name=$matches[3]',
		'top'
	);

    // Speciality & Semester
	add_rewrite_rule(
		'^usthb/([^/]+)/([^/]+)?$',
		'index.php?post_type=speciality_var&name=$matches[1]&semester_var=$matches[2]',
		'top'
	);

	// Speciality
	add_rewrite_rule(
		'^usthb/([^/]+)/?$',
		'index.php?post_type=speciality&name=$matches[1]',
		'top'
	);
	
}
add_action( 'init', 'custom_rewrite_rules' );


function custom_query_vars( $query_vars ) {
	$query_vars[] = 'module_var';
	$query_vars[] = 'semester_var';
	$query_vars[] = 'speciality_var';
	return $query_vars;
}
add_filter( 'query_vars', 'custom_query_vars' );
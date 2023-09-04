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





function custom_permalinks( $permalink, $post ) {
	if ( $post->post_type == 'course' ) {
		$course = new Course( $post->ID );
        $module_slug = $course->get_module()->get_slug();
        $speciality_slug = $course->get_module()->get_speciality()->get_slug();
        $semester = $course->get_module()->get_semester();
        $course_slug = $course->get_slug();
		$permalink = trailingslashit( home_url( "usthb/$speciality_slug/$semester/$module_slug/$course_slug" ) );
	}
	return $permalink;
}
add_filter( 'post_type_link', 'custom_permalinks', 10, 2 );

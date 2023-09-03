<?php

function flush_rewrite_rules_custom() {
	flush_rewrite_rules();
}
add_action( 'init', 'flush_rewrite_rules_custom' );


function custom_rewrite_rules() {
	add_rewrite_rule(
		'^course/([^/]+)/author/([^/]+)/?$',
		'index.php?post_type=book&book_title=$matches[1]&author_name=$matches[2]',
		'top'
	);
}
add_action( 'init', 'custom_rewrite_rules' );

function custom_query_vars( $query_vars ) {
	$query_vars[] = 'book_title';
	$query_vars[] = 'author_name';
	return $query_vars;
}
add_filter( 'query_vars', 'custom_query_vars' );



function custom_product_permalink( $permalink, $post ) {
	$course = new Course( $post->ID );
	if ( $post->post_type == 'course' ) {
		$permalink = trailingslashit( home_url( "course/{$course->get_module()->get_slug()}/$post->post_name" ) );
	}
	return $permalink;
}
add_filter( 'post_type_link', 'custom_product_permalink', 10, 2 );

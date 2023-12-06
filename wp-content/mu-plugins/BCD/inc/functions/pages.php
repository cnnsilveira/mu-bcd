<?php

add_action( 'init', 'custom_page_rewrite_rules' );
function custom_page_rewrite_rules() {
	add_rewrite_rule( '^dashboard/?', 'index.php?custom_page=1', 'top' );
	// Add more rules if needed
	flush_rewrite_rules();
}

add_filter( 'query_vars', 'custom_page_query_vars' );
function custom_page_query_vars( $vars ) {
	$vars[] = 'custom_page';
	return $vars;
}

add_action( 'template_include', 'custom_page_template' );
function custom_page_template( $template ) {
	if ( get_query_var( 'custom_page' ) ) {
		$template = BCD__TEMPLATES . 'dash-home.php';
	}
	return $template;
}

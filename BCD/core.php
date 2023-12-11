<?php
/**
 * This is the root file for our custom CRM.
 *
 * @package BCD
 */

/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Includes plugin's functionalities if the user is on the dashboard.
 *
 *   ----------------------------------------------------------------------------------------
 */
$request_parts = explode( '/', BCD__REQUEST_URI );
if ( 2 <= count( $request_parts ) && BCD__HOME_SLUG === $request_parts[1] ) {
	require_once BCD__FUNCTIONS . '/helper.inc.php';
	require_once BCD__CLASSES . '/Reset.class.php';
	require_once BCD__CLASSES . '/Template.class.php';
}
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Rewrite rules for the dashboard slugs.
 *
 *   ----------------------------------------------------------------------------------------
 */
add_action( 'init', 'bcd__rewrite_rules' );
function bcd__rewrite_rules() {
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__NEW_PROP_SLUG . '/?', 'index.php?bcd__page=new_prop', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__FAVORITES_SLUG . '/?', 'index.php?bcd__page=favorite', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__SAVED_SEARCHES_SLUG . '/?', 'index.php?bcd__page=saved_searches', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/?', 'index.php?bcd__page=props', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__PROFILE_SLUG . '/?', 'index.php?bcd__page=profile', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__USERS_SLUG . '/?', 'index.php?bcd__page=users', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/' . BCD__DEFINITIONS_SLUG . '/?', 'index.php?bcd__page=definitions', 'top' );
	add_rewrite_rule( '^' . BCD__HOME_SLUG . '/?', 'index.php?bcd__page=home', 'top' );

	if ( ! get_option( 'bcd' ) ) {
		add_option( 'bcd', true );
		flush_rewrite_rules();
	}
}

add_filter( 'query_vars', 'bcd__query_vars' );
function bcd__query_vars( $vars ) {
	$vars[] = 'bcd__page';
	return $vars;
}

add_action( 'template_include', 'bcd__template' );
function bcd__template( $template ) {
	if ( get_query_var( 'bcd__page' ) ) {
		$template = BCD__TEMPLATES . 'dash-' . get_query_var( 'bcd__page' ) . '.php';
	}
	return $template;
}

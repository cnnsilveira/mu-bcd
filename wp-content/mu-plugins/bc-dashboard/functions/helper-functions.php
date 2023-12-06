<?php
/**
 * This file handles the logic for the plugin helper functions.
 *
 * @package bc_dash
 */

if ( ! function_exists( 'bcd__allowed_user' ) ) {
	/**
	 * Tells if the current user is allowed to see the dashboard.
	 *
	 * @package bc_dash
	 */
	function bcd__allowed_user() {
		return current_user_can( 'administrator' );
	}
}

if ( ! function_exists( 'bcd__restricted_access' ) ) {
	/**
	 * Redirects the user to the front page if not allowed.
	 *
	 * Check `bcd__allowed_user()` to see allowed users logic.
	 *
	 * @package bc_dash
	 */
	function bcd__restricted_access() {
		if ( bcd__allowed_user() ) {
			return;
		}
		wp_safe_redirect( home_url() );
	}
}

function bcd__get_partial( $file_name ) {
}

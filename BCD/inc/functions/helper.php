<?php
/**
 * This file handles the logic for the plugin helper functions.
 *
 * @package BCD
 */

if ( ! function_exists( 'bcd__allowed_user' ) ) {
	/**
	 * Tells if the current user is allowed to see the dashboard.
	 *
	 * @package BCD
	 */
	function bcd__allowed_user() {
		return current_user_can( 'administrator' );
	}
}

function bcd__page_url( string $page ) {
	return home_url( 'index' === $page ? '/dashboard/' : '/dashboard/' . $page );
}
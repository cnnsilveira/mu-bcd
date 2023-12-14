<?php
/**
 * This file handles the logic for the plugin helper functions.
 *
 * @package BCD Platform
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'bcd__allowed_user' ) ) {
	/**
	 * Tells if the current user is allowed to see the dashboard.
	 *
	 * @package BCD Platform
	 */
	function bcd__allowed_user(): bool {
		return current_user_can( 'administrator' );
	}
}

function bcd__brl_value( string $value ) {
	$fmt = numfmt_create( 'pt_BR', NumberFormatter::CURRENCY );
	return numfmt_format_currency( $fmt, $value, 'BRL' );
}


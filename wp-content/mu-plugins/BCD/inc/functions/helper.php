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

if ( ! function_exists( 'bcd__restricted_access' ) ) {
	/**
	 * Redirects the user to the front page if not allowed.
	 *
	 * Check `bcd__allowed_user()` to see allowed users logic.
	 *
	 * @package BCD
	 */
	function bcd__restricted_access() {
		if ( bcd__allowed_user() ) {
			return;
		}
		wp_safe_redirect( home_url() );
	}
}

function bcd__remove_admin_bar() {
	add_filter( 'show_admin_bar', '__return_false' );
}

function bcd__enqueues() {
	add_action(
		'wp_enqueue_scripts',
		function () {
			// Remove default WP CSS variables.
			wp_dequeue_style( 'classic-theme-styles' );
			wp_dequeue_style( 'global-styles' );
			// Remove block library CSS.
			wp_dequeue_style( 'wp-block-library' );
			// Remove comment reply JS.
			wp_dequeue_script( 'comment-reply' );
			// Remove embedded links.
			wp_dequeue_script( 'wp-embed' );
			// Remove admin bar.
			wp_dequeue_script( 'admin-bar' );
			wp_dequeue_style( 'admin-bar' );
			// Remove Dashicons.
			wp_dequeue_style( 'dashicons' );

			// Includes plugin CSS and JS.
			$bcd__js_path  = BCD__MINIFIED ? 'inc/assets/min/app.min.js' : 'build/index.js';
			$bcd__css_path = BCD__MINIFIED ? 'inc/assets/min/style.min.css' : 'build/index.css';

			wp_enqueue_style( 'bcd', BCD__URI . $bcd__css_path, array(), false );
			wp_enqueue_script( 'bcd', BCD__URI . $bcd__js_path, array( 'jquery' ), false, true );

			// Include custom font.
			wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', array(), false );
			// Include Font Awesome kit.
			wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/13ca972e4c.js', array(), false, true );
		}
	);

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

function bcd__invalid_page_redirect() {
	$url_parts   = explode( '/', $_SERVER['REQUEST_URI'] );
	$valid_slugs = array(
		'imoveis',
		'meu-perfil',
		'usuarios',
		'definicoes',
	);

	if ( 4 <= count( $url_parts ) && ! in_array( $url_parts[2], $valid_slugs ) ) {
		wp_safe_redirect( home_url( '/dashboard/' ) );
	}
}

function bcd__page_url( string $page ) {
	return home_url( 'index' === $page ? '/dashboard/' : '/dashboard/' . $page );
}

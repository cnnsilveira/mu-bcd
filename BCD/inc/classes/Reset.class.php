<?php

defined( 'ABSPATH' ) || exit;

class BCD__Reset {
	public function __construct() {
		$this->bcd__invalid_page_redirect();
		$this->bcd__restricted_access();
		$this->bcd__remove_admin_bar();
		$this->bcd__clear_trash();
		$this->bcd__enqueues();
	}

	private function bcd__invalid_page_redirect() {
		$url_parts   = array_filter( explode( '/', BCD__REQUEST_URI ) );
		$valid_slugs = array(
			'imoveis',
			'meu-perfil',
			'usuarios',
			'definicoes',
		);

		if ( 2 === count( $url_parts ) && ! in_array( $url_parts[2], $valid_slugs ) ) {
			wp_safe_redirect( home_url( '/dashboard/' ) );
		}
	}
	/**
	 * Redirects the user to the front page if not allowed.
	 *
	 * Check `bcd__allowed_user()` to see allowed users logic.
	 *
	 * @package BCD Platform
	 */
	private function bcd__restricted_access() {
		if ( bcd__allowed_user() ) {
			return;
		}
		wp_safe_redirect( is_user_logged_in() ? home_url() : wp_login_url() );
	}

	private function bcd__remove_admin_bar() {
		add_filter( 'show_admin_bar', '__return_false' );
	}

	private function bcd__clear_trash() {
		add_action(
			'body_class',
			function() {
				return array( 'bcd' );
			},
			PHP_INT_MAX
		);

		add_action(
			'wp_enqueue_scripts',
			function() {
				global $wp_styles, $wp_scripts;

				$styles_whitelist  = array(
					'bcd',
					'bcd__google-fonts',
				);
				$scripts_whitelist = array(
					'jquery',
					'jquery-ui-core',
					'wp-util',
					'wp-a11y',
					'underscore',
					'wp-api',
					'customize-base',
					'heartbeat',
					'bcd',
					'bcd__font-awesome',
				);
				foreach ( $wp_styles->queue as $style ) {
					if ( ! in_array( $style, $styles_whitelist ) ) {
						wp_dequeue_style( $style );
						wp_deregister_style( $style );
					}
				}
				foreach ( $wp_scripts->queue as $script ) {
					if ( ! in_array( $script, $scripts_whitelist ) ) {
						// wp_dequeue_script( $script );
						// wp_deregister_script( $script );
					}
				}
			},
			PHP_INT_MAX
		);

		add_action(
			'init',
			function () {
				remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
				remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
				remove_action( 'wp_print_styles', 'print_emoji_styles' );
				remove_action( 'admin_print_styles', 'print_emoji_styles' );
				remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
				remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
				remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
				add_filter( 'emoji_svg_url', '__return_false' );
				remove_action( 'wp_head', 'wp_shortlink_wp_head' );
				remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
				remove_action( 'wp_head', 'feed_links', 2 );
				remove_action( 'wp_head', 'feed_links_extra', 3 );
			},
			PHP_INT_MAX
		);
		remove_action( 'wp_head', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}

	private function bcd__enqueues() {
		add_action(
			'wp_enqueue_scripts',
			function () {
				// Includes plugin CSS and JS.
				$bcd__js_path  = BCD__MINIFIED ? 'inc/assets/min/app.min.js' : 'build/index.js';
				$bcd__css_path = BCD__MINIFIED ? 'inc/assets/min/style.min.css' : 'build/index.css';
				wp_enqueue_style( 'bcd', BCD__URI . $bcd__css_path, array(), false );
				wp_enqueue_script( 'bcd', BCD__URI . $bcd__js_path, array( 'jquery' ), false, true );

				// Includes Chart.JS
				wp_enqueue_script( 'bcd__chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js', array( 'jquery' ), false, true );
				// Includes custom font.
				wp_enqueue_style( 'bcd__google-fonts', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', array(), false );
				// Includes Font Awesome kit.
				wp_enqueue_script( 'bcd__font-awesome', 'https://kit.fontawesome.com/13ca972e4c.js', array(), false, true );
			}
		);
	}
}

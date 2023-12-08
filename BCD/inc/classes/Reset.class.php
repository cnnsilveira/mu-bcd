<?php
class BCD__Reset {
	public function __construct() {
		$this->bcd__invalid_page_redirect();
		$this->bcd__restricted_access();
		$this->bcd__remove_admin_bar();
		$this->bcd__clear_trash();
		$this->bcd__enqueues();
	}

	private function bcd__invalid_page_redirect() {
		$url_parts   = array_filter(explode( '/', BCD__REQUEST_URI ));
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
	 * @package BCD
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
				return array('bcd');
			},
			PHP_INT_MAX
		);
	
		add_action(
			'wp_enqueue_scripts',
			function() {
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
				// Remove theme/plugins styles.
				wp_dequeue_style( 'bootstrap' );
				wp_dequeue_style( 'bootstrap-select' );
				wp_dequeue_style( 'bootstrap-datepicker' );
				wp_dequeue_style( 'font-awesome-5-all' );
				wp_dequeue_style( 'slick-min' );
				wp_dequeue_style( 'slick-theme-min' );
				wp_dequeue_style( 'jquery-ui' );
				wp_dequeue_style( 'houzez-icons' );
				wp_dequeue_style( 'houzez-main' );
				wp_dequeue_style( 'houzez-styling-options' );
				wp_dequeue_style( 'houzez-style' );
				wp_dequeue_style( 'redux-extendify-styles' );
				wp_dequeue_style( 'bi-front' );
				wp_dequeue_style( 'bi-cities-options' );
				// Remove theme/plugins scripts.
				wp_dequeue_script( 'bootstrap' );
				wp_dequeue_script( 'bootstrap-select' );
				wp_dequeue_script( 'slick' );
				wp_dequeue_script( 'modernizr' );
				wp_dequeue_script( 'slideout' );
				wp_dequeue_script( 'theia-sticky-sidebar' );
				wp_dequeue_script( 'houzez-custom' );
				wp_dequeue_script( 'bi-custom' );
				wp_dequeue_script( 'bi-cities-options' );
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
	
				// Include custom font.
				wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', array(), false );
				// Include Font Awesome kit.
				wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/13ca972e4c.js', array(), false, true );
			}
		);
	}
}
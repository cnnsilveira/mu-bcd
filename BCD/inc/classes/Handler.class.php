<?php

defined( 'ABSPATH' ) || exit;

class BCD__Handler {

	private $sanitized_data;

	public function __construct() {
		$this->sanity_check();
		$this->sanitize_data();
		$this->action();
	}

	private function sanity_check() {
		isset( $_POST['bcd__action'] ) || $this->get_off();
	}

	private function sanitize_data() {
		foreach ( $_POST as $id => $data ) {
			$this->sanitized_data[ $id ] = sanitize_text_field( $data );
		}
	}

	private static function sanitize_data_static() {
		foreach ( $_POST as $id => $data ) {
			$sanitized_data[ $id ] = sanitize_text_field( $data );
		}

		return $sanitized_data;
	}

	private function action() {
		switch ( $this->sanitized_data['action_scope'] ) {
			// Terms action.
			case 'term':
				$func = 'term_crud';
				break;
			// Just in case.
			default:
				$func = false;
				break;
		}

		$func || $this->get_off();

		add_action( 'init', array( __CLASS__, $func ), PHP_INT_MAX );
	}

	public static function term_crud() {
		$sanitized_data = self::sanitize_data_static();

		// Operations.
		switch ( $sanitized_data['bcd__action'] ) {
			// Update.
			case 'update':
				$operation = wp_update_term(
					$sanitized_data['term_id'],
					$sanitized_data['taxonomy'],
					array(
						'name' => $sanitized_data['new_name'],
					)
				);
				break;
			// Just in case.
			default:
				self::get_off();
		}

		// Redirect.
		if ( is_wp_error( $operation ) ) {
			bi_fire_term_error( $operation );
		} else {
			self::get_off();
		}
	}

	private static function get_off() {
		wp_safe_redirect( $_SERVER['HTTP_REFERER'] );
		exit;
	}
}

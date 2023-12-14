<?php
/**
 * This file generates the markup for the prop edit page.
 *
 * @package BCD Platform
 */

defined( 'ABSPATH' ) || exit;

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Edit_Prop = new class() extends BCD__Template {
	public function __construct() {
		$this->page_name = 'Editar imóvel';

		$this->bcd__check_get();
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página de edição do imóvel.' );
		$this->bcd__end();
	}

	private function bcd__check_get() {
		if ( ! bcd__allowed_user() || ! isset( $_GET['imovel'] ) ) {
			wp_safe_redirect( home_url( bcd__urls( 'props' ) ) );
			exit;
		}
	}
};

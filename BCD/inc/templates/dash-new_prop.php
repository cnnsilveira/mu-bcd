<?php
/**
 * This file generates the markup for the property register page.
 *
 * @package BCD Platform
 */

defined( 'ABSPATH' ) || exit;

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__New_Prop = new class() extends BCD__Template {
	public function __construct() {
		$this->page_name = 'Novo imóvel';

		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página de cadastro do imóvel', '' );
		$this->bcd__end();
	}

	private function bcd__description_block() {
	}
};

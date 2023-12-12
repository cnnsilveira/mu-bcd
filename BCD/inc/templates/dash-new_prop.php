<?php
/**
 * This file generates the markup for the property register page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__New_Prop = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página de cadastro do imóvel', '' );
		$this->bcd__end();
	}

	private $page_name = 'Novo imóvel';

	private function bcd__description_block() {
	}
};

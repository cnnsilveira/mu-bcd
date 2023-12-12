<?php
/**
 * This file generates the markup for the definitions page.
 *
 * @package BCD Platform
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Profile = new class() extends BCD__Template {
	public function __construct() {
		$this->page_name = 'Definições';
		
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página de definições do imóvel', '' );
		$this->bcd__end();
	}
};

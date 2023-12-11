<?php
/**
 * This file generates the markup for the saved searches page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Saved_Searches = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página de pesquisas salvas', '' );
		$this->bcd__end();
	}

	private $page_name = 'Pesquisas salvas';
};

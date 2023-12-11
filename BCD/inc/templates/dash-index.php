<?php
/**
 * This file generates the markup for the index page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Home = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página principal da dashboard', 'small' );
		$this->bcd__end();
	}

	private $page_name = 'Dashboard';
};

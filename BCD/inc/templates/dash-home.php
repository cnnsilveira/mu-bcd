<?php
/**
 * This file generates the markup for the index page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Home = new BCD__Reset();

// Content.
$BCD__Home = new class extends BCD__Template {
	public function __construct() {
		parent::bcd__start( $this->page_name );
		parent::bcd__block( 'Test', '');
		parent::bcd__end();
	}
	
	private $page_name = 'Dashboard';
};
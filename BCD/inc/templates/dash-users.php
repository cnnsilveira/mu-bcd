<?php
/**
 * This file generates the markup for the users management page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Users = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página de controle de usuários', '' );
		$this->bcd__end();
	}

	private $page_name = 'Usuários';
};

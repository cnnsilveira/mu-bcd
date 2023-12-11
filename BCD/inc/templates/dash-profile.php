<?php
/**
 * This file generates the markup for the index page of the dashboard.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Profile = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página do perfil do usuário', '' );
		$this->bcd__end();
	}

	private $page_name = 'Meu perfil';
};

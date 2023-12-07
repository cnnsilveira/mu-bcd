<?php
/**
 * This is the root file for our custom CRM.
 *
 * @package BCD
 */

/**
*   ----------------------------------------------------------------------------------------
*
*   Defines plugin's constants.
*
*   ----------------------------------------------------------------------------------------
*/
define( 'BCD__FUNCTIONS', plugin_dir_path( __FILE__ ) . '/inc/functions/' );
define( 'BCD__TEMPLATES', plugin_dir_path( __FILE__ ) . '/inc/templates/' );
define( 'BCD__URI', plugin_dir_url( __FILE__ ) );
define( 'BCD__REQUEST_URI', $_SERVER['REQUEST_URI'] );

/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Includes plugin's functionalities.
 *
 *   ----------------------------------------------------------------------------------------
 */
require_once BCD__FUNCTIONS . '/pages.php';

function bcd__available_pages() {

	$pages = array(
		'index'   => array(
			'title' => 'Dashboard',
			'slug'  => 'dashboard/',
			'id'    => 'index',
		),
		'profile' => array(
			'title' => 'Meu perfil',
			'slug'  => 'dashboard/meu-perfil/',
			'id'    => 'profile',
		),
		'props'   => array(
			'title' => 'Imóveis',
			'slug'  => 'dashboard/imoveis/',
			'id'    => 'props',
		),
		'home'    => array(
			'title' => '',
			'slug'  => 'dashboard/',
			'id'    => 'index',
		),
		'home'    => array(
			'title' => 'Dashboard',
			'slug'  => 'dashboard/',
			'id'    => 'index',
		),
		'home'    => array(
			'title' => 'Dashboard',
			'slug'  => 'dashboard/',
			'id'    => 'index',
		),
	);
}

function bcd__require_functions() {
	require_once BCD__FUNCTIONS . '/helper.php';
	require_once BCD__FUNCTIONS . '/markup.php';
}

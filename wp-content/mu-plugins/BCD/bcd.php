<?php
/**
 * This is the root file for our custom CRM.
 *
 * @package BCD
 */

/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Controls whether to enqueue minified or normal CSS and JS files.
 *
 *   ----------------------------------------------------------------------------------------
 */
define( 'BCD__MINIFIED', true );

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

/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Includes plugin's functionalities.
 *
 *   ----------------------------------------------------------------------------------------
 */
function bcd__require_functions() {
	require_once BCD__FUNCTIONS . '/helper.php';
	require_once BCD__FUNCTIONS . '/markup.php';
}

require_once BCD__FUNCTIONS . '/pages.php';

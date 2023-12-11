<?php

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
 *   Defines plugin constants.
 *
 *   ----------------------------------------------------------------------------------------
 */
define( 'BCD__URI', plugin_dir_url( __FILE__ ) );
define( 'BCD__PATH', plugin_dir_path( __FILE__ ) );
define( 'BCD__CLASSES', BCD__PATH . 'inc/classes/' );
define( 'BCD__FUNCTIONS', BCD__PATH . 'inc/functions/' );
define( 'BCD__TEMPLATES', BCD__PATH . 'inc/templates/' );
define( 'BCD__REQUEST_URI', $_SERVER['REQUEST_URI'] );
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Defines pages slugs.
 *
 *   ----------------------------------------------------------------------------------------
 */
// Home.
define( 'BCD__HOME_SLUG', 'dashboard' );

// Profile.
define( 'BCD__PROFILE_SLUG', 'meu-perfil' );

// Properties.
define( 'BCD__PROPS_SLUG', 'imoveis' );

// New Property.
define( 'BCD__NEW_PROP_SLUG', 'cadastro' );

// Favorites.
define( 'BCD__FAVORITES_SLUG', 'favoritos' );

// Saved Searches.
define( 'BCD__SAVED_SEARCHES_SLUG', 'pesquisas' );

// Users.
define( 'BCD__USERS_SLUG', 'usuarios' );

// Definitions.
define( 'BCD__DEFINITIONS_SLUG', 'definicoes' );

// Urls function.
if ( ! function_exists( 'bcd__urls' ) ) {
	/**
	 * Generates links for the dashboard pages.
	 *
	 * @param string $page    Optional. Specific page link.
	 *
	 * @return string|array URL string if $page is set, links array otherwise.
	 */
	function bcd__urls( string $page = null, bool $slug_only = false ): mixed {
		$urls = array(
			'new_prop'       => '/' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__NEW_PROP_SLUG . '/',
			'favorite'       => '/' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__FAVORITES_SLUG . '/',
			'saved_searches' => '/' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__SAVED_SEARCHES_SLUG . '/',
			'props'          => '/' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/',
			'profile'        => '/' . BCD__HOME_SLUG . '/' . BCD__PROFILE_SLUG . '/',
			'users'          => '/' . BCD__HOME_SLUG . '/' . BCD__USERS_SLUG . '/',
			'definitions'    => '/' . BCD__HOME_SLUG . '/' . BCD__DEFINITIONS_SLUG . '/',
			'index'          => '/' . BCD__HOME_SLUG . '/',
		);

		return null !== $page ? $urls[ $page ] : $urls;
	}
}

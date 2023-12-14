<?php
/**
 * This is the root file for our custom CRM.
 *
 * @package BCD Platform
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'BCD_Platform' ) ) {

	final class BCD_Platform {

        protected static $_instance;

		public function __construct() {
			self::constants();
			self::files();
			self::actions();

			if ( isset( $_POST['bcd__action'] ) ) {
				new BCD__Handler();
			}
		}

		public static function init() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

		public function constants() {
			/**
			 *   ----------------------------------------------------------------------------------------
			 *
			 *   Path constants.
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
			 *   Controls whether to enqueue minified or normal CSS and JS files.
			 *
			 *   ----------------------------------------------------------------------------------------
			 */
			define( 'BCD__MINIFIED', true );
			/**
			 *   ----------------------------------------------------------------------------------------
			 *
			 *   Pages slugs.
			 *
			 *   ----------------------------------------------------------------------------------------
			 */
			define( 'BCD__HOME_SLUG', 'dashboard' );
			define( 'BCD__PROFILE_SLUG', 'meu-perfil' );
			define( 'BCD__PROPS_SLUG', 'imoveis' );
			define( 'BCD__NEW_PROP_SLUG', 'cadastro' );
			define( 'BCD__EDIT_PROP_SLUG', 'editar' );
			define( 'BCD__FAVORITES_SLUG', 'favoritos' );
			define( 'BCD__SAVED_SEARCHES_SLUG', 'pesquisas' );
			define( 'BCD__USERS_SLUG', 'usuarios' );
			define( 'BCD__DEFINITIONS_SLUG', 'definicoes' );
		}

		public function files() {
			$request_parts = explode( '/', BCD__REQUEST_URI );
			if ( 2 <= count( $request_parts ) && BCD__HOME_SLUG === $request_parts[1] ) {
				require_once BCD__FUNCTIONS . '/helper.inc.php';
				require_once BCD__CLASSES . '/Reset.class.php';
				require_once BCD__CLASSES . '/Template.class.php';
				require_once BCD__CLASSES . '/Handler.class.php';
			}
		}

		public function actions() {
			add_action( 'init', array( __CLASS__, 'bcd__rewrite_rules' ) );
			add_action( 'query_vars', array( __CLASS__, 'bcd__query_vars' ) );
			add_action( 'template_include', array( __CLASS__, 'bcd__template' ) );
			add_action( 'after_setup_theme', array( __CLASS__, 'bcd__image_size' ) );
		}

		public static function bcd__image_size() {
			add_image_size( 'bcd__prop_thumb', 50, 50, true );
		}

		public static function bcd__rewrite_rules() {
			foreach ( bcd__urls() as $id => $url ) {
				add_rewrite_rule( '^' . substr( $url, 1 ) . '?', 'index.php?bcd__page=' . $id, 'top' );
			}
		
			if ( ! get_option( 'bcd' ) ) {
				add_option( 'bcd', true );
				flush_rewrite_rules();
			}
		}

		public static function bcd__query_vars( $vars ) {
			$vars[] = 'bcd__page';
			$vars[] = 'paged';
			return $vars;
		}

		public static function bcd__template( $template ) {
			if ( get_query_var( 'bcd__page' ) ) {
				$template = BCD__TEMPLATES . 'dash-' . get_query_var( 'bcd__page' ) . '.php';
			}
			return $template;
		}
	}
}

if ( ! function_exists( 'bcd__urls' ) ) {
	/**
	 * Generates slugs for the dashboard pages.
	 *
	 * @param string $page    Optional. Specific page link.
	 *
	 * @return string|array URL string if $page is set, slugs array otherwise.
	 */
	function bcd__urls( string $page = null ): mixed {
		$urls = array(
			'edit_prop'      => '/' . BCD__HOME_SLUG . '/' . BCD__PROPS_SLUG . '/' . BCD__EDIT_PROP_SLUG . '/',
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
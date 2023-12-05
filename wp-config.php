<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('AUTH_KEY',         'l7GeeyrHeoWe/IVqoV0fIQp6tb3/vB4svxzr2ftXO3R6bl+X/jePBxase3iYA1XAmwephSe/E+3SxpJewXc1tg==');
define('SECURE_AUTH_KEY',  'ng/kCJtmr4oHJuZ+xFZ/bQGOvgfdX/pVhk1oUdECENWjCS1hm60rpCZvIkB+Hizp6CvMlMvzpERhTwfYRd+4kg==');
define('LOGGED_IN_KEY',    'CKg5Ux5v+3UYCrn7YA0aZxyEv3eXcuToa7jcKrk31Xr3fJl9EsXHGHPnyRVgv+Ry+DDovy2EpZ57IUe+axWyEw==');
define('NONCE_KEY',        'BuiEV8GQYE+BjJsLRyvZdUDnPyd7cw0Bvs0r6VqS2gu7iZRBDXdBrdcOHoPliQTzLUcg1TgHw14lDNkL3h/HlA==');
define('AUTH_SALT',        'syRTJ/BUCw59fkVAh32tfjUVif3NHE1AHnqK3PgkiU3IShJ++/OzVLD2X/1WklJflczbwU3NBbWHc9kZCKODyQ==');
define('SECURE_AUTH_SALT', 'MnMUuxmwZqXMjK+ywxkEvIIHBcCftFgbAhbaCR0o4TL3eU075cCIbalreXDloKQheFeSGkS7Pf0ymLWRIZJ9Kw==');
define('LOGGED_IN_SALT',   'xygg7/5FvCWPYKXaTusV2spSIi1M3vgZwIVodO60a+HQzi+MoOUMAFN6ofw073kEHbd/d2CdZNuv86Jfwzi7VA==');
define('NONCE_SALT',       'wl3Tk2JSPktLT0OAz1I+S/vq2Zb/FECOmw4fEuyzWAgbwwl47lXbk5Li9xHMJQmjS/tz0e8biDgVUudg1SkMew==');
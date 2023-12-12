<?php
/**
 * Plugin Name:         BCD Platform
 * Plugin URI:          https://github.com/cnnsilveira/mu-bcd
 * GitHub URI:          https://github.com/cnnsilveira/mu-bcd
 * Description:         A fast, modern, responsive and objective Real State CRM.
 * Version:             1.0.0
 * Requires at least:   6.3
 * Requires PHP:        8.1
 * Author:              Caio Nunes and Bruno Berger
 * License:             GPLv3 or later
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:         bcd-platform
 * Provides:            BCD Platform
 *
 * @package             BCD Platform
 * @author              Caio Nunes and Bruno Berger
 * @license             GNU General Public License, version 3
 * @copyright           2023 BCD Platform
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Includes Redux Framework.
 *
 *   ----------------------------------------------------------------------------------------
 */
require_once __DIR__ . '/BCD-fave/redux-framework/redux-framework.php';
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Includes Favethemes functionality files.
 *
 *   ----------------------------------------------------------------------------------------
 */
require_once __DIR__ . '/BCD-fave/fave-functionality/fave-functionality.php';
require_once __DIR__ . '/BCD-fave/fave-insights/fave-insights.php';
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Includes BCD functionality files.
 *
 *   ----------------------------------------------------------------------------------------
 */
require_once __DIR__ . '/BCD/core.php';
/**
 *   ----------------------------------------------------------------------------------------
 *
 *   Platform init.
 *
 *   ----------------------------------------------------------------------------------------
 */
BCD_Platform::init();
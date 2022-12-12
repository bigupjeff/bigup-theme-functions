<?php
namespace Bigup\Theme_Functions;

/**
 * Plugin Name: Bigup Web: Theme Functions
 * Plugin URI: https://jeffersonreal.uk
 * Description: Enables the easy addition of theme functions.
 * Version: 0.0.1
 * Author: Jefferson Real
 * Author URI: https://jeffersonreal.uk
 * License: GPL2
 *
 * @package bigup_theme_functions
 * @version 0.5.0
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2022, Jefferson Real
 * @license GPL2+
 * @link https://jeffersonreal.uk
 */

/**
 * Set this plugin's base URL constant for use throughout the plugin.
 * 
 * There is no in-built WP function to get the base URL for a plugin, so this constant allows us to
 * write relative file references, making code portable.
 */
$url = plugin_dir_url( __FILE__ );
define( 'bigup_theme_functions_PLUGIN_URL', $url );
$path = plugin_dir_path( __FILE__ );
define( 'bigup_theme_functions_PLUGIN_PATH', $path );

/**
 * Load PHP autoloader to ready the classes.
 */
require_once( plugin_dir_path( __FILE__ ) . 'classes/autoload.php');

/**
 * Init class which in turn calls all plugin dependencies.
 */
new Init();

/**
 * If the user is on admin page, process the admin settings menu.
 */
if ( is_admin() ){
    new Admin_Settings();
}

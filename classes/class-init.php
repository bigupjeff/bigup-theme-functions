<?php
namespace Bigup\Theme_Functions;

/**
 * Bigup Theme Functions - Initialisation.
 *
 * Setup styles and helper functions for this plugin.
 *
 * @package bigup_theme_functions
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2021, Jefferson Real
 * @license GPL2+
 * @link https://jeffersonreal.uk
 * 
 */

class Init {

	private $php_code;

    /**
     * Use this function to initialise all dependencies for the plugin.
     */
    public function __construct() {

		add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_scripts_and_styles' ] );

		$this->php_code = get_option('bigup_functions');

		if ( true === !! $this->php_code ) {
			add_action( 'after_setup_theme', array( $this, 'dangerously_run_user_code' ) );
		}
	}


	/**
	 * Dangerously run user code.
	 */
	public function dangerously_run_user_code() {
		eval( $this->php_code );
	}


	/**
	 * Register admin scripts and styles.
	 */
	public function register_admin_scripts_and_styles() {

		// Add syntax highlighting.
		//wp_enqueue_script( 'bigup_theme_functions_highlight_js', BIGUP_THEME_FUNCTIONS_PLUGIN_URL . 'node_modules/highlight.js/lib/core.js', array(), filemtime( BIGUP_THEME_FUNCTIONS_PLUGIN_PATH . 'node_modules/highlight.js/lib/core.js' ), false );
        //wp_enqueue_script( 'bigup_theme_functions_highlight_js_php', BIGUP_THEME_FUNCTIONS_PLUGIN_URL . 'node_modules/highlight.js/lib/languages/php.js', array( 'bigup_theme_functions_highlight_js' ), filemtime( BIGUP_THEME_FUNCTIONS_PLUGIN_PATH . 'node_modules/highlight.js/lib/languages/php.js' ), false );

        wp_enqueue_style( 'bigup_theme_functions_admin_css', BIGUP_THEME_FUNCTIONS_PLUGIN_URL . 'css/admin.css', array(), filemtime( BIGUP_THEME_FUNCTIONS_PLUGIN_PATH . 'css/admin.css' ), 'all' );
        wp_enqueue_script( 'bigup_theme_functions_admin_js', BIGUP_THEME_FUNCTIONS_PLUGIN_URL . 'js/admin.js', array(), filemtime( BIGUP_THEME_FUNCTIONS_PLUGIN_PATH . 'js/admin.js' ), false );

		if ( ! wp_script_is( 'bigup_icons', 'registered' ) ) {
			wp_register_style( 'bigup_icons', BIGUP_THEME_FUNCTIONS_PLUGIN_URL . 'dashicons/css/bigup-icons.css', array(), filemtime( BIGUP_CONTACT_FORM_PLUGIN_PATH . 'dashicons/css/bigup-icons.css' ), 'all' );
		}
		if ( ! wp_script_is( 'bigup_icons', 'enqueued' ) ) {
			wp_enqueue_style( 'bigup_icons' );
		}
	}

}// Class end
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

    /**
     * Use this function to initialise all dependencies for the plugin.
     * 
     */
    public function __construct() {

		$php_code = get_option('bigup_functions');
		if ( true === !! $php_code ) {
			// Do something like this
			//include $php_code;

			var_dump( $php_code );
		}
	}

}// Class end
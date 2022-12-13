/**
 * Bigup Theme Functions - Admin JavaScript.
 * 
 * @package bigup_theme_functions
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2021, Jefferson Real
 * @license GPL2+
 * @link https://jeffersonreal.uk
 */

const admin = (() => {


    /**
     * Initialise.
     *
	 */
    function init() {

		/* Add syntax highlighting.
		document.querySelectorAll( '.codeHighlight' ).forEach( ( input ) => {
			hljs.highlightElement( input, { language: 'php' } );
		} );
		*/
		
    };


    /**
     * Fire form_init() on 'doc ready'.
     */
    let doc_ready = setInterval( () => {
        if ( document.readyState === 'complete' ) {
            clearInterval( doc_ready );
            init();
        }
    }, 250);

})();
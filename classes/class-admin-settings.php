<?php
namespace Bigup\Theme_Functions;

/**
 * Bigup Theme Functions - Admin Settings.
 *
 * Hook into the WP admin area and add menu options and settings
 * pages.
 *
 * @package bigup_theme_functions
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2022, Jefferson Real
 * @license GPL2+
 * @link https://jeffersonreal.uk
 */

// WordPress dependencies.
use function menu_page_url;


class Admin_Settings {


    /**
     * Settings page slug to add with add_submenu_page().
     */
    public $admin_label = 'Theme Functions';


    /**
     * Settings page slug to add with add_submenu_page().
     */
    public $page_slug = 'bigup-web-theme-functions';


    /**
     * Settings group name called by settings_fields().
	 * 
	 * To add multiple sections to the same settings page, all settings
	 * registered for that page MUST BE IN THE SAME 'OPTION GROUP'.
     */
    public $group_name = 'group_theme_functions_settings';


    /**
     * base64 uri svg icon used next to page title.
     */
    public $icon = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMzIiIGhlaWdodD0iMTMyIj48cGF0aCBmaWxsPSJjdXJyZW50Q29sb3IiIGQ9Ik0wIDB2MTMyaDM1LjRWODcuMmMwLTUuNiAwLTExLjYgMS43LTE2LjcuOC0yLjUgNC40LTMuNyA3LjEtMy43aDM0LjVjMy4yIDAgNi45LjEgOC4yIDEuMiAyLjMgMS44IDEuOSA3LjIgMi4xIDEwLjUuNCA0LjkgMSAxNC4yLS41IDE1LjYtMy4zIDMuNC0yLjggNC05LjIgMTAuMS0xLjggMS40LTYtLjktNS4zLTQuNC43LTMuNiAzLjQtOS43IDMuNC0xMS40IDAtMS43LTIgLjgtMi44IDAtLjMtLjQtLjYtLjktLjgtMS42LS43LTIuNCA0LjgtNy43IDQuMi04LjgtLjktMS4zLTQuMyA3LTYuNCA1LS42LS41LTIuMS00LjktMi44LTUtMSAwIDEuOCA0LjguOCA3LjktLjcgMi0zLjIgMi44LTUuMiAzLTIuNi41LTEzLjMtMTAuMS0xNC05LjUtLjguNyAxMC44IDEwLjcgMTIuNCAxNCAxLjMgMi4xIDIuMyA3LjUgMS43IDguMS0uNi43LTEwLjktNC05LjItMS41IDEuOCAyLjYgMTAgMy4yIDEzLjYgMy44IDEuMS4yIDMgLjEgNC42IDIuNS4zLjQtMi42LS40LTUuMy0xLTIuNi0uMy01LjQtMS01LjktLjgtLjcuNSAyIDMuMiAyLjggMy40IDEuMS40IDExLjUtLjUgMTIuMi0uNyAyLjgtMSAzLjktMS42IDQuMy0yIDUuOC02LjcgOS40LTkgOS42LTEyLjEuMi0zLjEtLjQtMTMgMi4zLTE0LjggMi42LTEuOCA1LjMuMSA2LjUgNS44IDEuMiA1LjcgMy40IDUuNiA0LjQgMTAuOCAxIDUuMi0zLjMgMTUuOS01LjYgMjEuOS0yLjIgNi03LjQgNy42LTEwLjYgOS42LTMuMyAyLTYuNyAzLjUtMTAuOCA0LjMtMi45LjYtNy41IDEuMS05LjkgMS4zSDEzMlYwSDY2czcuNC41IDExLjQgMS4zUzg1IDMuNyA4OC4yIDUuN2MzLjIgMiA4LjQgMy42IDEwLjYgOS42IDIuMyA2IDYuNyAxNi42IDUuNiAyMS44LTEgNS4zLTMuMiA1LjEtNC40IDEwLjgtMS4yIDUuNy0zLjkgNy43LTYuNSA1LjktMi43LTEuOS0yLjEtMTEuOC0yLjMtMTQuOC0uMi0zLjEtMy44LTUuNS05LjYtMTIuMS0uNC0uNS0xLjUtMS4xLTQuMy0yLS43LS4yLTExLTEuMi0xMi4yLS44LS44LjItMy41IDMtMi44IDMuNC41LjMgMy4zLS40IDUuOS0uOSAyLjctLjQgNS42LTEuMyA1LjMtLjlDNzIgMjguMSA3MCAyOCA2OSAyOC4yYy0zLjUuNi0xMS44IDEuMi0xMy42IDMuOC0xLjcgMi42IDguNi0yLjIgOS4yLTEuNS42LjctLjQgNi0xLjcgOC4yLTEuNiAzLjMtMTMuMiAxMy4yLTEyLjQgMTMuOS43LjcgMTEuNC0xMCAxNC05LjUgMiAuMyA0LjUgMSA1LjIgMyAxIDMuMS0xLjcgOC0uOCA3LjguNyAwIDIuMi00LjQgMi44LTUgMi0yIDUuNSA2LjQgNi40IDUgLjYtMS00LjktNi4zLTQuMi04LjcuMi0uNy41LTEuMi44LTEuNS44LTEgMi44IDEuNiAyLjggMCAwLTEuOC0yLjctNy44LTMuNC0xMS40LS43LTMuNiAzLjUtNS45IDUuMy00LjUgNi40IDYgNiA2LjggOS4yIDEwLjEgMS40IDEuNSAxIDEwLjcuNSAxNS43LS4yIDMuMi4yIDguNi0yLjEgMTAuNS0yIDEuNS04LjggMS4xLTEyIDEuMUg0NC4yYy0yLjcgMC02LjMtMS4xLTcuMS0zLjctMS43LTUtMS43LTExLTEuNy0xNi43VjBaIi8+PC9zdmc+Cg==';


    /**
     * Init the class by hooking into the admin interface.
     */
    public function __construct() {
		add_action( 'bigup_below_parent_settings_page_heading', [ &$this, 'echo_plugin_settings_link' ] );
		new Admin_Settings_Parent();
        add_action( 'admin_menu', [ &$this, 'register_admin_menu' ], 99 );
        add_action( 'admin_init', [ &$this, 'register_settings' ] );
    }


    /**
     * Add admin menu option to sidebar
     */
    public function register_admin_menu() {

        add_submenu_page(
            Admin_Settings_Parent::$page_slug,  //parent_slug
            $this->admin_label . ' Settings',   //page_title
            $this->admin_label,                 //menu_title
            'manage_options',                   //capability
            $this->page_slug,                   //menu_slug
            [ &$this, 'create_settings_page' ], //function
            null,                               //position
        );

    }


    /**
     * Echo a link to this plugin's settings page.
     */
    public function echo_plugin_settings_link() {
		?>

		<a href="/wp-admin/admin.php?page=<?php echo $this->page_slug ?>">
			Go to <?php echo $this->admin_label ?> settings
		</a>
		<br>

		<?php
	}


    /**
     * Create Theme Functions Settings Page
     */
    public function create_settings_page() {
    	?>

		<div class="wrap">

			<h1>
				<span class="dashicons-bigup-logo" style="font-size: 2em; margin-right: 0.2em;"></span>
				Bigup Web Theme Functions
			</h1>

			<h2>
				Usage
			</h2>
			<p>
				Add PHP snippets to the text field below and these will be attached to hook
				‘after_setup_theme’. This allows you to set theme modifications on any theme without
				having to modify the theme files. Please note: you can easily break stuff with this.
			</p>
			<p>
				This field isn't validated or sanitized and shouldn't be used unless you know what
				you're doing. Not recommended for production use where a published theme including
				required functionality should be appropriately installed.
			</p>

            <form method="post" action="options.php">

                <?php
                    /* Setup hidden input functionality */
                    settings_fields( $this->group_name );

                    /* Print the input fields */
                    do_settings_sections( $this->page_slug );

                    /* Print the submit button */
                    submit_button( 'Save' );
                ?>

            </form>

        </div>

    	<?php
    }


    /**
     * Output Form Fields - SMTP Account Settings
     */
    public function echo_field_bigup_functions() {
        echo '<textarea class="pre code codeHighlight" rows="15" cols="100" name="bigup_functions" id="bigup_functions" value="' . get_option('bigup_functions') . '">' . get_option('bigup_functions') . '</textarea>';
    }

    /**
     * Register all settings fields and call their functions to build the page.
     * 
     * add_settings_section( $id, $title, $callback, $page )
     * add_settings_field( $id, $title, $callback, $page, $section, $args )
     * register_setting( $option_group, $option_name, $sanitize_callback )
     */
    public function register_settings() {

        $group = $this->group_name;
        $page = $this->page_slug;

        /**
         * Register section and fields - SMTP Account Settings
         */
        $section = 'section_functions';
        add_settings_section( $section, 'Theme Functions', null, $page );

		add_settings_field( 'bigup_functions', 'Functions', [ &$this, 'echo_field_bigup_functions' ], $page, $section );
		register_setting( $group, 'bigup_functions', [ &$this, 'validate_php' ] );
    }


    /**
     * Validate a text field.
     */
    function validate_php( $php ) {
 
		// No validation is taking place atm.
        return $php;
    }

}// Class end

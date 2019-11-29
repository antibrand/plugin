<?php
/**
 * The core plugin class
 *
 * @package    Plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 */

namespace Plugin\Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Get plugins path to check for active plugins.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Define the core functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
final class Init {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Get class dependencies.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access private
	 * @return self
	 */
	private function __construct() {

		// Load classes for plugin support.
		add_action( 'init', [ $this, 'plugin_support' ] );

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// Plugin settings class.
		require_once ABP_PATH . 'includes/class-settings.php';

		// Admin/backend functionality, scripts and styles.
		require_once ABP_PATH . 'admin/class-admin.php';

		// Frontend functionality, scripts and styles.
		require_once ABP_PATH . 'frontend/class-frontend.php';

		// Translation functionality.
		require_once ABP_PATH . 'includes/class-i18n.php';

	}

	/**
	 * Load classes for plugin support
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function plugin_support() {

		// Get plugin support files.

	}

}

/**
 * Put an instance of the class into a function
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function abp_init() {

	return Init::instance();

}

// Run an instance of the class.
abp_init();

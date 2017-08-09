<?php
/**
 * The file that contains the class for internationalization
 *
 * @since   1.0.0
 * @package Dashboard_Columns
 */





/**
 * Define the internationalization functionality.
 *
 * Load and define the internationalization files making the plugin ready for
 * translation.
 *
 * @since 1.0.0
 */
class Dashboard_Columns_i18n {

	/**
	 * Initialize the class and get things started.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// Nothing yet.
	}





	/**
	 * Load plugin text-domain.
	 *
	 * Load the plugin text-domain for translation from:
	 *
	 * - Global languages folder: wp-content/languages/plugins/dashboard-columns/dashboard-columns-en_US.mo
	 * - Local languages folder: wp-content/plugins/dashboard-columns/languages/dashboard-columns-en_US.mo
	 *
	 * If no files are found in the global languages folder the plugin uses the files available in the
	 * local folder.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), DASHBOARD_COLUMNS_NAME );

		// Load textdomain from the global languages folder.
		load_textdomain( DASHBOARD_COLUMNS_NAME, trailingslashit( WP_LANG_DIR ) . 'plugins/' . DASHBOARD_COLUMNS_NAME . '/' . DASHBOARD_COLUMNS_NAME . '-' . $locale . '.mo' );

		// Load textdomain from the local languages folder.
		load_plugin_textdomain( DASHBOARD_COLUMNS_NAME, false, plugin_basename( DASHBOARD_COLUMNS_DIR_PATH ) . '/languages/' );
	}
}

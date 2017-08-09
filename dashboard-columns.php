<?php
/**
 * Plugin Name: Dashboard Columns
 * Plugin URI: https://wordpress.org/plugins/dashboard-columns
 * Description: Easily change the number of dashboard columns from Screen Options.
 * Version: 1.0.0
 * Author: Polygon Themes
 * Author URI: https://polygonthemes.com
 * Text Domain: dashboard-columns
 * Domain Path: /languages/
 * License: GNU General Public License version 3.0
 *
 * This is the bootstrap file read by WordPress that generates the information displayed
 * in the admin area. It also includes al dependencies used by the plugin, it registers
 * the activation and deactivation hooks and it defines a function that starts the plugin.
 *
 * @since   1.0.0
 * @package Dashboard_Columns
 */





/**
 * Abort if this file is called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}





/**
 * Define plugin constants.
 */
define( 'DASHBOARD_COLUMNS_VERSION', '1.0.0' );                         // Current plugin version.
define( 'DASHBOARD_COLUMNS_NAME', 'dashboard-columns' );                // Unique plugin identifier.

define( 'DASHBOARD_COLUMNS_MAIN_FILE', __FILE__ );                      // Path to main plugin file.
define( 'DASHBOARD_COLUMNS_DIR_PATH', plugin_dir_path( __FILE__ ) );    // Path to plugin directory.
define( 'DASHBOARD_COLUMNS_DIR_URL', plugin_dir_url( __FILE__ ) );      // URL to plugin directory.





/**
 * Activate Dashboard Columns.
 *
 * Code that runs during the plugin activation.
 *
 * @since 1.0.0
 * @param bool $network_wide Boolean value with the network-wide activation status.
 */
function activate_dashboard_columns( $network_wide ) {
	require_once( DASHBOARD_COLUMNS_DIR_PATH . 'includes/class-dashboard-columns-activator.php' );
	Dashboard_Columns_Activator::activate( $network_wide );
}





/**
 * Deactivate Dashboard Columns.
 *
 * Code that runs during the plugin deactivation.
 *
 * @since 1.0.0
 * @param bool $network_wide Boolean value with the network-wide activation status.
 */
function deactivate_dashboard_columns( $network_wide ) {
	require_once( DASHBOARD_COLUMNS_DIR_PATH . 'includes/class-dashboard-columns-deactivator.php' );
	Dashboard_Columns_Deactivator::deactivate( $network_wide );
}





/**
 * Register activation and deactivation hooks.
 */
register_activation_hook( DASHBOARD_COLUMNS_MAIN_FILE, 'activate_dashboard_columns' );
register_deactivation_hook( DASHBOARD_COLUMNS_MAIN_FILE, 'deactivate_dashboard_columns' );





/**
 * Load and execute plugin.
 *
 * Begin execution of the plugin if the server is not running an outdated version of PHP
 * or display a warning otherwise.
 *
 * @since 1.0.0
 */
function run_dashboard_columns() {
	require_once( DASHBOARD_COLUMNS_DIR_PATH . 'includes/class-dashboard-columns-update-php.php' );
	$php = new Dashboard_Columns_Update_PHP();

	if ( $php->check() ) {
		require_once( DASHBOARD_COLUMNS_DIR_PATH . 'includes/class-dashboard-columns.php' );
		$plugin = new Dashboard_Columns();
		$plugin->run();
	}
}
run_dashboard_columns();

<?php
/**
 * Remove all options on uninstall
 *
 * @since   1.0.0
 * @package Dashboard_Columns
 */





/**
 * Exit if uninstall not called from WordPress.
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}





/**
 * Remove plugin options.
 */
if ( is_multisite() ) {
	// Global variables.
	global $wpdb;

	// Variables.
	$blogs = $wpdb->get_results( "SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A );

	if ( $blogs ) {
		foreach ( $blogs as $blog ) {
			switch_to_blog( $blog['blog_id'] );

			delete_option( 'dashboard_columns' );
		}
		restore_current_blog();
	}
} else {
	delete_option( 'dashboard_columns' );
}

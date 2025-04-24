<?php
/**
 * Trigger this file on plugin uninstall.
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Cleanup plugin options stored in the WordPress options table
delete_option( 'api_key' );  
delete_option( 'api_id' );   

// Clean up any transient data that might have been stored (temporary data)
delete_transient( 'products_data' );

// If you have any scheduled cron jobs, clear them here (optional)
if ( wp_next_scheduled( 'ecommerce_cron_job' ) ) {
    wp_clear_scheduled_hook( 'ecommerce_cron_job' );
}



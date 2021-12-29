<?php

/*
Plugin Name:       TweakPress: Debug Log Multisite
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       If the WordPress is multisite and log to file enabled, create log file for each site in the network based on the site ID.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.1
Requires at least: 4.9
Tested up to:      5.9
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( WP_DEBUG && is_multisite() ) {
	if ( in_array( strtolower( (string) WP_DEBUG_LOG ), array( 'true', '1' ), true ) ) {
		$log_path = WP_CONTENT_DIR . '/debug-' . get_current_blog_id() . '.log';

		ini_set( 'error_log', $log_path );
	}
}

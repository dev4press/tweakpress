<?php

/**
 * Plugin Name:       TweakPress: Disable Large Count Check
 * Plugin URI:        https://github.com/dev4press/tweakpress
 * Description:       Always return `FALSE` when checking for the large users count or network size (for Multisite installations).
 * Author:            Milan Petrovic - Dev4Press
 * Author URI:        https://www.dev4press.com/
 * Version:           1.0
 * Requires at least: 5.0
 * Tested up to:      6.6
 * Requires PHP:      7.4
 * License:           GNU GeneralPublic License v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

add_filter( 'wp_is_large_user_count', '__return_false' );

add_filter( 'wp_is_large_network', '__return_false' );

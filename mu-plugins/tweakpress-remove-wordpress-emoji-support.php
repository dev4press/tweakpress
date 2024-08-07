<?php

/**
 * Plugin Name:       TweakPress: Remove WordPress Emoji Support
 * Plugin URI:        https://github.com/dev4press/tweakpress
 * Description:       For old and outdated browsers, WordPress includes support for Emoji's that is added in the page header including JavaScript.
 * Author:            Milan Petrovic - Dev4Press
 * Author URI:        https://www.dev4press.com/
 * Version:           1.2
 * Requires at least: 5.0
 * Tested up to:      6.6
 * Requires PHP:      7.4
 * License:           GNU GeneralPublic License v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! is_admin() ) {
	add_action( 'plugins_loaded', 'tweakpress__remove_wp_emoji_support' );
}

function tweakpress__remove_wp_emoji_support() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'emoji_svg_url', '__return_false', 100 );

	add_filter( 'tiny_mce_plugins', 'tweakpress__remove_wp_emoji_support__disable_tinymce_plugin' );
}

function tweakpress__remove_wp_emoji_support__disable_tinymce_plugin( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}

	return array();
}

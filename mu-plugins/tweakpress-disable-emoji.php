<?php

/*
Plugin Name:       TweakPress: Disable Emoji
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       Disable Emoji replacement with images for old browsers compatibility. Works with the WordPress 4.2 or newer.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 4.2
Tested up to:      6.0
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action( 'init', 'tweakpress__disable_emojis' );

function tweakpress__disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'emoji_svg_url', '__return_false', 100 );

	add_filter( 'tiny_mce_plugins', 'tweakpress__disable_emojis_tinymce' );
}

function tweakpress__disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

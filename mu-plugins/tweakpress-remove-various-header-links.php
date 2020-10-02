<?php

/*
Plugin Name:       TweakPress: Remove Various Header Links
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       WordPress adds many links into page HEAD (RSS, Adjacent Posts, RSD, WLManifest...). If you don't need or want many of these links, you can use this plugin to disable them.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 4.9
Tested up to:      5.5
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! is_admin() ) {
	add_action( 'plugins_loaded', 'tweakpress__remove_header_links' );
}

function tweakpress__remove_header_links() {
	/* Remove auto generated shortlink */
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'template_redirect', 'wp_shortlink_header', 11 );

	/* Remove basic RSS feed links */
	remove_action( 'wp_head', 'feed_links', 2 );

	/* Remove extra RSS feed links */
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	/* Remove adjacent post links */
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );

	/* Remove canonical link */
	remove_action( 'wp_head', 'rel_canonical' );

	/* Remove RSD link */
	remove_action( 'wp_head', 'rsd_link' );

	/* Remove Windows Live Writer Manifest link */
	remove_action( 'wp_head', 'wlwmanifest_link' );
}

<?php

/*
Plugin Name:       TweakPress: Dequeue WooCommerce Cart Fragments
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       Dequeue WooCommerce Cart Fragments script for the pages where it is not used.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.1
Requires at least: 4.9
Tested up to:      5.9
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action( 'wp_enqueue_scripts', 'tweakpress__dequeue_woo_cart_fragments', 20 );

function tweakpress__dequeue_woo_cart_fragments() {
	if ( ! is_post_type_archive('product') && ! is_singular('product') ) {
		wp_dequeue_script( 'wc-cart-fragments' );
	}
}

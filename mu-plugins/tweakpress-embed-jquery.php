<?php

/*
Plugin Name:       TweakPress: Embed jQuery
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       Embed jQuery inside of the page HEAD for better cache performance. Works with the WordPress 4.9 or newer.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.1
Requires at least: 4.9
Tested up to:      5.9
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! is_admin() ) {
	add_action( 'wp_head', 'tweakpress__embed_jquery', 0 );
	function tweakpress__embed_jquery() {
		$path = ABSPATH . 'wp-includes/js/jquery/jquery.min.js';
		$file = file_get_contents( $path );

		?>

        <script id="embedded-jquery-core" type="text/javascript"><?php echo $file; ?></script>

		<?php
	}

	add_action( 'wp_default_scripts', 'tweakpress__replace_jquery', 10 );
	function tweakpress__replace_jquery( $scripts ) {
		$script = $scripts->query( 'jquery-core', 'registered' );

		if ( $script ) {
			tweakpress__set_script( $scripts, 'jquery-core', '', array(), $script->ver );
		}
	}

	function tweakpress__set_script( $scripts, $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
		$script = $scripts->query( $handle, 'registered' );

		if ( $script ) {
			$script->src  = $src;
			$script->deps = $deps;
			$script->ver  = $ver;
			$script->args = $in_footer;

			unset( $script->extra['group'] );

			if ( $in_footer ) {
				$script->add_data( 'group', 1 );
			}
		} else {
			if ( $in_footer ) {
				$scripts->add( $handle, $src, $deps, $ver, 1 );
			} else {
				$scripts->add( $handle, $src, $deps, $ver );
			}
		}
	}
}

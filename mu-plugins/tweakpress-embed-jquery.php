<?php

/**
 * Plugin Name:       TweakPress: Embed jQuery
 * Plugin URI:        https://github.com/dev4press/tweakpress
 * Description:       Embed jQuery inside the page HEAD for better cache performance.
 * Author:            Milan Petrovic - Dev4Press
 * Author URI:        https://www.dev4press.com/
 * Version:           1.4
 * Requires at least: 5.0
 * Tested up to:      6.6
 * Requires PHP:      7.4
 * License:           GNU GeneralPublic License v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! is_admin() ) {
	add_action( 'wp_head', 'tweakpress__embed_jquery', 0 );
	add_action( 'login_head', 'tweakpress__embed_jquery', 0 );
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
}

if ( ! function_exists( 'tweakpress__set_script' ) ) {
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

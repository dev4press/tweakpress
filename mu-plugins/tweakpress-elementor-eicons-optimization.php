<?php

/*
Plugin Name:       TweakPress: Elementor Eicons Optimization
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       Embed Elementor EICONS font into page head, and add font-display:auto to font registration, eliminating render-blocking problem for this font.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 4.9
Tested up to:      5.5
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action( 'elementor/frontend/after_register_styles', 'tweakpress__elementor_dequeue_eicons_css');

function tweakpress__elementor_dequeue_eicons_css() {
	wp_dequeue_style( 'elementor-icons' );
}

add_action( 'wp_head', 'tweakpress__elementor_embed_eicons' );

function tweakpress__elementor_embed_eicons() {
	if ( defined( 'ELEMENTOR_PATH' ) && defined( 'ELEMENTOR_URL' ) ) {
		$path = ELEMENTOR_PATH . 'assets/lib/eicons/css/elementor-icons.min.css';

		if ( file_exists( $path ) ) {
			$font_base = ELEMENTOR_URL . 'assets/lib/eicons/fonts/eicons';
			$font_find = '../fonts/eicons';

			$file = file_get_contents( $path );
			$file = str_replace( $font_find, $font_base, $file );
			$file = str_replace( '@font-face{', '@font-face{font-display:auto;', $file );

			?>

            <style id="embedded-elementor-eicons" type="text/css"><?php echo $file; ?></style>

			<?php
		}
	}
}

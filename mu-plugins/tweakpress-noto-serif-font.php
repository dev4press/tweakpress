<?php

/*
Plugin Name:       TweakPress: Disable Noto Serif Font
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       This font is loaded from Google Fonts, and if you don't need it, disable it with this tweak.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 5.0
Tested up to:      6.1
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

add_filter( 'gettext_with_context', 'tweakpress_disable_noto_font', 10, 2 );
function tweakpress_disable_noto_font( $translation, $text ) {
	if ( $text == 'Noto Serif:400,400i,700,700i' ) {
		$translation = 'off';
	}

	return $translation;
}

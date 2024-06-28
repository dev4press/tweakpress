<?php

/**
 * Plugin Name:       TweakPress: Disable Block Widgets Panel
 * Plugin URI:        https://github.com/dev4press/tweakpress
 * Description:       If the legacy widgets you need to use don't work properly with the Blocks Widgets, this will disable the Blocks Widgets and go back to Classic Widgets.
 * Author:            Milan Petrovic - Dev4Press
 * Author URI:        https://www.dev4press.com/
 * Version:           1.2
 * Requires at least: 5.0
 * Tested up to:      6.6
 * Requires PHP:      7.4
 * License:           GNU GeneralPublic License v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

<?php

/*
Plugin Name:       TweakPress: Disable Block Widgets Panel
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       If the legacy widgets you need to use don't work properly with the Blocks Widgets panel, this will disable the Blocks Widget and go back to Classic Widgets Panel.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.1
Requires at least: 4.9
Tested up to:      5.9
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

<?php

/*
Plugin Name:       TweakPress: Disable Block Editor
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       If you don't need to use Block editor, and want to revert back to Classic editor, this tweak will do just that.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 5.0
Tested up to:      6.1
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

add_filter('use_block_editor_for_post', '__return_false');
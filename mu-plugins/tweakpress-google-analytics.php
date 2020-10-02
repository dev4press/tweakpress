<?php

/*
Plugin Name:       TweakPress: Google Analytics
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       Add Google Analytics tracking code into page HEAD without the use of plugins or Google Tag Manager.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 4.9
Tested up to:      5.5
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'WPMU_GOOGLE_ANALYTICS_TRACKING_CODE' ) ) {
	define( 'WPMU_GOOGLE_ANALYTICS_TRACKING_CODE', 'UA-XXXXX-Y' );
}

if ( ! is_admin() ) {
	add_action( 'wp_head', 'tweakpress__google_analytics', 1 );
	function tweakpress__google_analytics() {
		$_show = apply_filters( 'dev4press-wpmu-google-analytics-show', ! is_super_admin() );
		$_code = apply_filters( 'dev4press-wpmu-google-analytics-tracking-code', WPMU_GOOGLE_ANALYTICS_TRACKING_CODE );

		if ( $_show ) {
			$_items = array(
				"ga('create', '" . $_code . "', 'auto');",
				"ga('set', 'anonymizeIp', true);",
				"ga('set', 'forceSSL', true);",
				"ga('require', 'displayfeatures');",
				"ga('require', 'linkid');",
				"ga('send', 'pageview');"
			);

			$_items = apply_filters( 'dev4press-wpmu-google-analytics-tracking-items', $_items );

			?>

<script id="google-analytics-loader" type="text/javascript">
window.ga = window.ga || function() {
    (ga.q = ga.q || []).push(arguments)
};
ga.l = +new Date;

<?php echo join( PHP_EOL, $_items ); ?>

</script>
<script id="google-analytics-script" src="https://www.google-analytics.com/analytics.js" async></script>

			<?php
		}
	}
}

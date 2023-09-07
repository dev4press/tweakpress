<?php

/*
Plugin Name:       TweakPress: Google Analytics 4
Plugin URI:        https://github.com/dev4press/tweakpress
Description:       Add Google Analytics 4 tracking code into page HEAD without the use of plugins.
Author:            Milan Petrovic - Dev4Press
Author URI:        https://www.dev4press.com/
Version:           1.0
Requires at least: 4.9
Tested up to:      5.9
Requires PHP:      5.6
License:           GNU GeneralPublic License v3 or later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'WPMU_GOOGLE_ANALYTICS_4_TRACKING_CODE' ) ) {
	define( 'WPMU_GOOGLE_ANALYTICS_4_TRACKING_CODE', 'G-A12B3C4DE5' );
}

if ( ! is_admin() ) {
	add_action( 'wp_head', 'tweakpress__google_analytics', 1 );
	function tweakpress__google_analytics() {
		$_show = apply_filters( 'dev4press-wpmu-google-analytics-4-show', ! is_super_admin() );
		$_code = apply_filters( 'dev4press-wpmu-google-analytics-4-tracking-code', WPMU_GOOGLE_ANALYTICS_4_TRACKING_CODE );

		if ( $_show ) {
			
			?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($_code); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo esc_html($_code); ?>');
</script>

			<?php
		}
	}
}

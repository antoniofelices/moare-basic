<?php
/**
 * Load Tracking Systems.
 *
 * @package moare/moare-basic
 */

namespace Moare_Basic\Load_Tracking_Systems;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load Google, Meta codes.
 */
function codes_head() {

	?>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=XXX"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'XXX');
	</script>
	<!-- End Google tag (gtag.js) -->

	<!-- Meta Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', 'XXX');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=XXX&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Meta Pixel Code -->

	<?php

}
add_action( 'wp_head', __NAMESPACE__ . '\codes_head', 200 );

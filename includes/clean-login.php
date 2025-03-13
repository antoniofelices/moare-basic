<?php
/**
 * Remove sections login.
 *
 * @package moare/moare-basic
 */

namespace Moare_Basic\Clean_Login;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove text logo.
 */
function remove_login_logo_text() {
	return '';
}
add_filter( 'login_headertext', __NAMESPACE__ . '\remove_login_logo_text' );

/**
 * Remove url login logo.
 */
function remove_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\remove_login_logo_url' );

/**
 * Remove logo login.
 */
function remove_login_logo() {

	?>

	<style type="text/css">
		#backtoblog,
		#login h1 a, .login h1 a {
			display: none;
		}
	</style>

	<?php

}
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\remove_login_logo' );

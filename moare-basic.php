<?php
/**
 * Plugin Name:     Moare Basic
 * Plugin URI:      http://studiomoare.com
 * Description:     Functions Studio Moare use to create a websites. Create custom post types, create custom taxonomies, clean html head tag, clean backend, crop images.
 * Version:         1.0.2
 * Requires PHP:    7.4
 * Author:          antonio
 * Author URI:      http://studiomoare.com
 * License:         GPLv2 or later
 * Text Domain:     moare-basic
 * Domain Path:     /languages
 *
 * @package         moare/moare-basic
 *
 * Copyright 2025 Studio Moare.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 */

namespace Moare_Basic\Main;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MOARE_BASIC_VERSION', '1.0.2' );

if ( ! defined( 'MOARE_BASIC_FILE' ) ) {
	define( 'MOARE_BASIC_FILE', __FILE__ );
}

if ( ! defined( 'MOARE_BASIC_PATH' ) ) {
	define( 'MOARE_BASIC_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'MOARE_BASIC_BASENAME' ) ) {
	define( 'MOARE_BASIC_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * Localization.
 */
function plugin_textdomain() {

	load_plugin_textdomain( 'moare-basic', false, dirname( MOARE_BASIC_BASENAME ) . '/languages/' );

}
add_action( 'init', __NAMESPACE__ . '\plugin_textdomain' );

/**
 * Load plugin files.
 * Require the plugin files in an alphabetical order.
 */
require_once MOARE_BASIC_PATH . '/includes/clean-head.php';
require_once MOARE_BASIC_PATH . '/includes/clean-login.php';
require_once MOARE_BASIC_PATH . '/includes/media.php';
require_once MOARE_BASIC_PATH . '/includes/load-tracking-systems.php';
require_once MOARE_BASIC_PATH . '/includes/register-cpts.php';
require_once MOARE_BASIC_PATH . '/includes/register-taxs.php';

/**
 * Clean backend.
 */
if ( is_admin() ) {
	require_once MOARE_BASIC_PATH . '/admin/clean-backend.php';
}

/**
 * Clean backend.
 * Remove blocks variations.
 */
function remove_default_block_variations() {

	wp_enqueue_script(
		'mb-remove-default-block-variations',
		plugins_url( 'assets/js/remove-default-block-variations.js', __FILE__ ),
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		MOARE_BASIC_VERSION
	);

}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\remove_default_block_variations' );

/**
 * Flush rewrite on activate.
 */
function rewrite_flush() {

	__NAMESPACE__ . \Moare_Basic\Register_Cpts\register_cpt();
	__NAMESPACE__ . \Moare_Basic\Register_Taxs\register_tax();

	flush_rewrite_rules();

}
register_activation_hook( __FILE__, __NAMESPACE__ . '\rewrite_flush' );

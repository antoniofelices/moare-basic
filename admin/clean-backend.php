<?php
/**
 * Remove sections brackend.
 *
 * @package moare/moare-basic
 */

namespace Moare_Basic\Clean_Backend;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Filters without functions.
add_filter( 'admin_footer_text', '__return_empty_string', 11 );
add_filter( 'update_footer', '__return_empty_string', 11 );

// Remove emojis admin.
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove nodes toolbar.
 *
 * @param object $wp_admin_bar used to implement the Toolbar API.
 */
function remove_some_nodes_toolbar( $wp_admin_bar ) {

	$wp_logo_node  = $wp_admin_bar->get_node( 'wp-logo' );
	$updates_node  = $wp_admin_bar->get_node( 'updates' );
	$comments_node = $wp_admin_bar->get_node( 'comments' );
	$new_content   = $wp_admin_bar->get_node( 'new-content' );

	if ( ! current_user_can( 'manage_options' ) ) {
		if ( $wp_logo_node ) {
			$wp_admin_bar->remove_node( 'wp-logo' );
		}
		if ( $updates_node ) {
			$wp_admin_bar->remove_node( 'updates' );
		}
		if ( $comments_node ) {
			$wp_admin_bar->remove_node( 'comments' );
		}
		if ( $new_content ) {
			$wp_admin_bar->remove_node( 'new-content' );
		}
	}

}
add_action( 'admin_bar_menu', __NAMESPACE__ . '\remove_some_nodes_toolbar', 999 );

/**
 * Hide admin menus.
 */
function hide_menus() {

	if ( ! current_user_can( 'manage_options' ) ) {

		remove_menu_page( 'index.php' );
		// remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );

	}

}
add_action( 'admin_menu', __NAMESPACE__ . '\hide_menus' );


/**
 * Restrict blocks to editor role.
 */
function restrict_blocks_by_user_role( $allowed_block_types, $block_editor_context ) {

	if ( empty( $block_editor_context->post ) ) {
		return $allowed_block_types;
	}

	if ( ! current_user_can( 'manage_options' ) ) {
		return array(
			'core/button',
			'core/buttons',
			'core/column',
			'core/columns',
			'core/cover',
			'core/details',
			'core/embed',
			'core/file',
			'core/freeform',
			'core/gallery',
			'core/group',
			'core/heading',
			'core/html',
			'core/image',
			'core/list',
			'core/list-item',
			'core/media-text',
			'core/missing',
			'core/more',
			'core/nextpage',
			'core/paragraph',
			'core/post-featured-image',
			'core/post-time-to-read',
			'core/post-title',
			'core/preformatted',
			'core/pullquote',
			'core/query',
			'core/quote',
			'core/read-more',
			'core/separator',
			'core/spacer',
			'core/table',
			'core/table-of-contents',
			'core/video'
		);
	}

	return $allowed_block_types;

}

add_filter( 'allowed_block_types_all', __NAMESPACE__ .  '\restrict_blocks_by_user_role', 10, 2 );
<?php
/**
 * Register Custom Post Types.
 *
 * @package moare/moare-basic
 */

namespace Moare_Basic\Register_Cpts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Types.
 */
function register_cpt() {

	// Name.
	$labels_name  = array(
		'name'               => _x( 'Mycustoms', 'post type general name', 'moare-basic' ),
		'singular_name'      => _x( 'Mycustom', 'post type singular name', 'moare-basic' ),
		'menu_name'          => _x( 'Mycustom', 'admin menu', 'moare-basic' ),
		'name_admin_bar'     => _x( 'Mycustom', 'add new on admin bar', 'moare-basic' ),
		'add_new'            => _x( 'Add new', 'mycustom', 'moare-basic' ),
		'add_new_item'       => __( 'Add new mycustom', 'moare-basic' ),
		'new_item'           => __( 'New mycustom', 'moare-basic' ),
		'edit_item'          => __( 'Edit mycustom', 'moare-basic' ),
		'view_item'          => __( 'See mycustom', 'moare-basic' ),
		'all_items'          => __( 'All mycustom', 'moare-basic' ),
		'search_items'       => __( 'Search mycustom', 'moare-basic' ),
		'not_found'          => __( 'Not found mycustom', 'moare-basic' ),
		'not_found_in_trash' => __( 'Not found mycustom in trash', 'moare-basic' ),
	);
	$rewrite_name = array(
		'slug'               => _x( 'custom-cpt-name-10', 'slug', 'moare-basic' ),
		'with_front'         => true,
		'pages'              => true,
		'feeds'              => true,
	);
	$args_name    = array(
		'labels'             => $labels_name,
		'description'        => __( 'My custom post type', 'moare-basic' ),
		'public'             => true,
		'menu_position'      => 15,
		'menu_icon'          => 'dashicons-carrot',
		'supports'           => array( 'title', 'author', 'thumbnail', 'editor', 'excerpt', 'comments', 'revisions' ),
		'has_archive'        => true,
		'rewrite'            => $rewrite_name,
		'capability_type'    => 'post',
		'show_in_rest'       => true,
		'taxonomies'         => array( 'moare_custom_tax_1' ),
	);

	// Max 20 characters.
	register_post_type( 'moare_custom_cpt', $args_name );

}
add_action( 'init', __NAMESPACE__ . '\register_cpt', 10 );

<?php
/**
 * Register Custom Taxonomies.
 *
 * @package moare/moare-basic
 */

namespace Moare_Basic\Register_Taxs;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Taxonomies.
 */
function register_tax() {
	// Name.
	$labels_name  = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'moare-basic' ),
		'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'moare-basic' ),
		'menu_name'                  => __( 'Taxonomy', 'moare-basic' ),
		'all_items'                  => __( 'All Items', 'moare-basic' ),
		'parent_item'                => __( 'Parent Item', 'moare-basic' ),
		'parent_item_colon'          => __( 'Parent Item:', 'moare-basic' ),
		'new_item_name'              => __( 'New Item Name', 'moare-basic' ),
		'add_new_item'               => __( 'Add New Item', 'moare-basic' ),
		'edit_item'                  => __( 'Edit Item', 'moare-basic' ),
		'update_item'                => __( 'Update Item', 'moare-basic' ),
		'view_item'                  => __( 'View Item', 'moare-basic' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'moare-basic' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'moare-basic' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'moare-basic' ),
		'popular_items'              => __( 'Popular Items', 'moare-basic' ),
		'search_items'               => __( 'Search Items', 'moare-basic' ),
		'not_found'                  => __( 'Not Found', 'moare-basic' ),
		'no_terms'                   => __( 'No items', 'moare-basic' ),
		'items_list'                 => __( 'Items list', 'moare-basic' ),
		'items_list_navigation'      => __( 'Items list navigation', 'moare-basic' ),
	);
	$rewrite_name = array(
		'slug'                       => _x( 'custom-tax-name', 'slug', 'moare-basic' ),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args_name    = array(
		'labels'                     => $labels_name,
		'hierarchical'               => true,
		'public'                     => true,
		'query_var'                  => true,
		'rewrite'                    => $rewrite_name,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_in_rest'               => true,
	);

	// Max 20 characters.
	register_taxonomy( 'mb_custom_tax', array( 'mb_custom_cpt' ), $args_name );
}
add_action( 'init', __NAMESPACE__ . '\register_tax', 10 );

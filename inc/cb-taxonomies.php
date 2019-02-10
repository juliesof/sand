<?php
/**
 * Custom Taxonomy
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function cb_add_custom_taxonomies() {
	

	// Product Categories

	// Labels array
	$labels = array(

		'name'				=> _x( 'Product Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'		=> _x( 'Product Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'		=> __( 'Search Product Categories', 'textdomain' ),
		'all_items'			=> __( 'All Product Categories', 'textdomain' ),
		'parent_item'		=> __( 'Parent Product Category', 'textdomain' ),
		'parent_item_colon'	=> __( 'Parent Product Category:', 'textdomain' ),
		'edit_item'			=> __( 'Edit Product Category', 'textdomain' ),
		'update_item'		=> __( 'Update Product Category', 'textdomain' ),
		'add_new_item'		=> __( 'Add New Product Category', 'textdomain' ),
		'new_item_name'		=> __( 'New Product Category Name', 'textdomain' ),
		'menu_name'			=> __( 'Product Categories', 'textdomain' ),
	);

	// Arguments array

	$args = array(
		'hierarchical'		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'query_var'			=> true,
		'rewrite'			=> array( 'slug' => 'product-categories' ),
	);

	// create taxonomy
	register_taxonomy( 'product-categories', 'products', $args);


}
add_action( 'init', 'cb_add_custom_taxonomies' );
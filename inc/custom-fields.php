<?php
/**
 * ACF post type setup
 *
 * @package understrap
 */
// Custom post types function 
function create_custom_post_types(){
	// Create individual items
	register_post_type('items',
		array(
		'labels' => array(
			'name' => __('Store Products'),
			'singular_name' => __('Product'),
			),
		'public' => true,
		'has_archive' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array (
			'slug' => 'store-products'
			),
		)
	);
}

// Hook this custom posts types function into the theme
add_action('init', 'create_custom_post_types');
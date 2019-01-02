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
			'name' => __('Items'),
			'singular_name' => __('Item'),
			),
		'public' => true,
		'has_archive' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array (
			'slug' => 'items'
			),
		)
	);
}

// Hook this custom posts types function into the theme
add_action('init', 'create_custom_post_types');
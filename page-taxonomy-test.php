<?php
/**
 * The template for testing taxonomies.
 * Template Name: Taxonomy Test
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

echo "this is a test!";

$taxonomies = get_terms( array(
    'taxonomy' => 'product-categories',
    'hide_empty' => true
) );
 
if ( !empty($taxonomies) ) :
	$output = '<ul>';
	foreach( $taxonomies as $category ) {
		if( $category->parent == 0 ) {
			$output.= '<li class="product-category-menu-item" data-attribute='. esc_attr( $category->term_id ) .'">
				'. esc_html( $category->name ) .'<ul>';
				foreach( $taxonomies as $subcategory ) {
					if($subcategory->parent == $category->term_id) {
					$output.= '<li class="product-subcategory-menu-item" data-attribute="'. esc_attr( $subcategory->term_id ) .'">
						'. esc_html( $subcategory->name ) .'</li>';
					}
				}
			$output.='</ul></li>';
		}
	}
	$output.='</ul>';
	echo $output;
endif;
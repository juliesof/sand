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
    'taxonomy' => 'category',
    'hide_empty' => true
) );
 
if ( !empty($taxonomies) ) :
    $output = '<select>';
    foreach( $taxonomies as $category ) {
        if( $category->parent == 0 ) {
            $output.= '<optgroup label="'. esc_attr( $category->name ) .'">';
            foreach( $taxonomies as $subcategory ) {
                if($subcategory->parent == $category->term_id) {
                $output.= '<option value="'. esc_attr( $subcategory->term_id ) .'">
                    '. esc_html( $subcategory->name ) .'</option>';
                }
            }
            $output.='</optgroup>';
        }
    }
    $output.='</select>';
    echo $output;
endif;
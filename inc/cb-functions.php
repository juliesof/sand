<?php
/**
 * Creative custom functions
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// function flattenArray($arrayToFlatten) {
//   $flatArray = array();
//   foreach($arrayToFlatten as $element) {
//     if (is_array($element)) {
//       $flatArray = array_merge($flatArray, flattenArray($element));
//     } else {
//       $flatArray[] = $element;
//     }
//   }
//   return $flatArray;
// }
// add_action( 'init', 'flattenArray' );

// Defining function
// function whatIsToday(){
//     echo "Today is " . date('l', mktime());
// }

//add_action( 'init', 'whatIsToday' );

// Show featured image in admin columns
// Store Tour
 
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Featured Image');
    return $defaults;
}
add_filter('manage_store-tour_posts_columns', 'posts_columns', 5);
 
function posts_custom_columns($column_name, $id){
    if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'xsmall' );
    }
}
add_action('manage_store-tour_posts_custom_column', 'posts_custom_columns', 5, 2);

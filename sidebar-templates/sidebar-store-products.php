<?php
/**
 * The template for displaying active Product Categories for the Archive Products sidebar
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div id="products-archive-menu-column" class="col-md-3 col-xl-2">
	<div class="gallery-menu-toggle d-block d-md-none">
		<span class="hamburger-patty patty-1"></span>
		<span class="hamburger-patty patty-2"></span>
		<span class="hamburger-patty patty-3"></span>
	</div>
	<div class="overflow-container">
		<h2 class="gallery-menu-title">Categories</h2>
		<div class="menu-filters">
		<?php

		$active_products = get_terms( array(
			'taxonomy' => 'product-categories',
			'hide_empty' => true
		) );

		if ( !empty( $active_products ) ) :
			$output = '<ul>
						<li class="product-category-menu-item" data-filter="*">
							Show All 
						</li>'; 
			foreach( $active_products as $category ) {
				if( $category->parent == 0 ) {
					$output.= '<li class="product-category-menu-item" data-filter=".cat-'. esc_attr( $category->term_id ) .'">
						'. esc_html( $category->name ) .'<ul>';
						foreach( $active_products as $subcategory ) {
							if($subcategory->parent == $category->term_id) {
							$output.= '<li class="product-subcategory-menu-item" data-filter=".cat-'. esc_attr( $subcategory->term_id ) .'">
								'. esc_html( $subcategory->name ) .'</li>';
							}
						}
					$output.='</ul></li>';
				}
			}
			$output.='</ul>';
			echo $output;
		endif;

		?>
		</div><!-- .menu-filters -->
	</div><!-- .overflow-container -->
</div><!-- #products-archive-menu-column -->
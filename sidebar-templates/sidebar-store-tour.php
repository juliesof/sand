<?php
/**
 * The template for displaying active Store Tour Categories 
 * for the Archive Store Tour sidebar
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div id="st-menu-column" class="col-md-3 col-xl-2">
	<div class="gallery-menu-toggle d-block d-md-none">
		<span class="hamburger-patty patty-1"></span>
		<span class="hamburger-patty patty-2"></span>
		<span class="hamburger-patty patty-3"></span>
	</div>
	<div class="overflow-container">
		<h2 class="gallery-menu-title">Browse by Category</h2>
		<div class="menu-filters">
		
		<?php

		$active_products = get_terms( array(
			'taxonomy' 	=> 'store-tour-categories',
			'hide_empty'=> true
		) );

		if ( !empty( $active_products ) ) :
			$output = '<ul>
						<li class="product-category-menu-item" data-filter="*">
							Show All 
						</li>'; 
			foreach( $active_products as $category ) {
				if( $category->parent == 0 ) {
					$output.= '<li class="product-category-menu-item" data-filter=".cat-'. esc_attr( $category->term_id ) .'">
						'. esc_html( $category->name );
					$output.='</li>';
				}
			}
			$output.='</ul>';
			echo $output;
		endif;

		?>
		</div><!-- .menu-filters -->
	</div><!-- .overflow-container -->
</div><!-- #products-archive-menu-column -->
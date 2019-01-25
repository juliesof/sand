<?php

	// declare hightest scope variable
	$photo_categories	= array();
	
	if( have_rows('store_tour') ) {
		while( have_rows('store_tour') ): the_row(); 
			$categories = get_sub_field( 'category' );
			array_push($photo_categories, $categories);
		endwhile;  // end while 
	} // end if

	// create array of unique parent categories for menu filters
		
		$photo_categories = flattenArray($photo_categories);
		$photo_categories = array_filter($photo_categories);
		$photo_categories = array_unique($photo_categories);
		sort($photo_categories);

		wp_reset_postdata();	


	function flattenArray($arrayToFlatten) {
	  $flatArray = array();
	  foreach($arrayToFlatten as $element) {
	    if (is_array($element)) {
	      $flatArray = array_merge($flatArray, flattenArray($element));
	    } else {
	      $flatArray[] = $element;
	    }
	  }
	  return $flatArray;
	 } 

?>

	<div id="st-menu-column" class="col-md-3 col-xl-2">
			<h2 class="gallery-menu-title text-center">Browse by Category</h2>
			<div class="gallery-menu-toggle d-block d-md-none">
				<span class="hamburger-patty patty-1"></span>
				<span class="hamburger-patty patty-2"></span>
				<span class="hamburger-patty patty-3"></span>
			</div>
			<div class="menu-filters">
				<ul>
					<?php 
						foreach( $photo_categories as $pc ): 		
					?>
					<li>
						<a href="#<?php echo $pc ?>">
							<?php echo $pc ?>
						</a>
					</li>
					<?php 				
						endforeach;
					?>
				</ul>
			</div>
		</div>
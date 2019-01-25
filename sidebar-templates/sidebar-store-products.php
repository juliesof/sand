<?php 

	while ( have_posts()) : the_post();
		// get post objects for store products (items)
		$posts = get_posts(array(
			'post_type'	=> 'items',
		));
	endwhile;


	// declare hightest scope variables
	$parent_cats				= array();
	$child_subcat_list 	= array();
	$child_subcats 			= array();
	$grandchild_subcats = array();
	$full_list					= array();


	// create array of unique parent categories for menu filters
		if( $posts ): 		
			foreach( $posts as $post ):	
				setup_postdata( $post );
				
				$category = get_field( 'categories' );
				array_push($parent_cats, $category);
			
			endforeach; //end posts as post foreach loop
		endif; //end if $posts
		
		$parent_cats = flattenArray($parent_cats);
		$parent_cats = array_unique($parent_cats);
		sort($parent_cats);

	// create array of unique subcategories names
 		foreach( $parent_cats as $pc){ 
 			array_push($child_subcat_list, subcategorize($pc)); 
 		}

 	// from acf, get subcategories array for each unique subcat name 
		foreach( $posts as $post ):			
			foreach ($child_subcat_list as $csl) {
				$list_object = get_field($csl);
				if(isset($list_object)){
					$child_subcats[] = $list_object;
					//$child_subcats[] = array ($csl => $list_object);
				}
				?><pre><?php print_r($child_subcats);?></pre><?php
				//print_r($child_subcats[$csl]);
			} //end child subcat list foreach
		endforeach; //end posts as post foreach loop

		wp_reset_postdata();

		// merge parent categories with subcategories
		foreach ($parent_cats as $pc) {
			$pc_subcat = subcategorize($pc);
			$full_list[$pc] = $child_subcats[$pc_subcat];
			//echo $child_subcats['$pc_subcat'];
		}

		//$full_list = array_fill_keys($parent_cats, $child_subcats);
		?>
			<pre>
				<?php  //	 print_r($child_subcats); ?>
				<?php //print_r($full_list); ?>
			</pre>
		<?php


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

	function subcategorize($parentCategory) {
		$mod_pc =  str_replace(' ', '_', strtolower($parentCategory));
 		$subcat = $mod_pc . '_subcategories';
 		// need regex here to strip non-alpha characters ;-)
 		return $subcat;
	}
?>

<div id="items-archive-menu-column" class="col-md-3 col-xl-2">
			<h2 class="gallery-menu-title">Shop by:</h2>
			
			<!-- Hamburger Menu -->
			<div class="gallery-menu-toggle d-block d-md-none">
				<span class="hamburger-patty patty-1"></span>
				<span class="hamburger-patty patty-2"></span>
				<span class="hamburger-patty patty-3"></span>
			</div> 

			<!-- Menu Filters -->
			<div class="menu-filters">
				<ul>
					<li>
						<?php 
						//echo categories as links and menu items 
						foreach( $parent_cats as $pc ):
						//echo parent category as link and menu item ?>
						<a href="#<?php echo $pc ?>">
							<?php echo $pc ?>
						</a>
						<ul>
							<?php 
									//echo subcategories as links and menu items 
									foreach( $child_subcats as $scl ):
								?>
							<li>
								<a href="#<?php echo $parent_cats[$scl] ?>">
									<?php echo $parent_cats[$scl] ?>
								</a>	
							</li>
							<?php 
								// end subcategories foreach loop
								endforeach; 
							?>
						</ul>
						<?php 
							// end  parent categories foreach loop
							endforeach; 
						?>
					</li> <!-- end parent categories list -->
				</ul>						
			</div> <!-- end menu-filters -->
	
		</div>
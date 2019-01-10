	<?php
		// Get menu categories & subcategories from ACF checkbox field
		$parent_categories = get_field('categories');
		//$subcategories = array();
		if( $parent_categories ):
			foreach( $parent_categories as $pc):
				$subcategories[] = $pc . 'subcategories';
			endforeach;
		endif;

	?>

	<div id="items-archive-menu-column" class="col-md-3 col-xl-2">
			<h2 class="gallery-menu-title">Categories</h2>
			
			<!-- Hamburger Menu -->
			<div class="gallery-menu-toggle d-block d-md-none">
				<span class="hamburger-patty patty-1"></span>
				<span class="hamburger-patty patty-2"></span>
				<span class="hamburger-patty patty-3"></span>
			</div> 

			<!-- Menu Filters -->
		<?php 
			foreach( $parent_categories as $pc):
				$mod_pc =  str_replace(' ', '_', strtolower($pc));
				$subcategories =  get_field( $mod_pc . '_subcategories');
		?>
			<div class="menu-filters">
				<ul>
					<li>
						<?php //echo parent category as link and menu item ?>
						<a href="#<?php echo $pc ?>">
							<?php echo $pc ?>
						</a>
						<ul>
							<?php 
									//echo subcategores as links and menu items 
									foreach( $subcategories as $sc ):
								?>
							<li>
								<a href="#<?php echo $sc ?>">
									<?php echo $sc ?>
								</a>	
							</li>
							<?php 
								// end subcategories foreach loop
								endforeach; 
							?>
						</ul>
					</li>
				</ul>						
			</div> <!-- end menu-filters -->
		<?php 
			// end  parent categories foreach loop
			endforeach; 
		?>
		</div>
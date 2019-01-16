<?php
/**
 * The template for displaying the front page.
 *
 *
 * @package understrap
 */

get_header();
?>

	<div id="content-frontpage" tabindex="-1">

		<main class="site-main" id="main">

			<?php while ( have_posts() ) : the_post(); 

			 	if ( have_rows('homepage_layout') ):  
					while ( have_rows('homepage_layout')) : the_row(); 
					
						// Hero Carousel
						if ( get_row_layout() == 'hero_image_carousel' )
							get_template_part( 'frontpage-templates/frontpage', 'hero' ); 
					 
					 	// Primary Featured Categories
					 	if ( get_row_layout() == 'primary_categories' )
						 	get_template_part( 'frontpage-templates/frontpage', 'primary-categories' ); 

						// Brand Logo Bar
						if ( get_row_layout() == 'brand_bar' )
							get_template_part( 'frontpage-templates/frontpage', 'brands' );


						// Parallax Section
						if ( get_row_layout() == 'testimonial_parallax' )
							get_template_part( 'frontpage-templates/frontpage', 'parallax' );

						// About Section
						//if ( get_row_layout() == 'about_store' )
							//get_template_part( 'frontpage-templates/frontpage', 'about' );

						// Secondary Categories
						if ( get_row_layout() == 'secondary_categories' )
							get_template_part( 'frontpage-templates/frontpage', 'secondary-categories' );	
									 
					endwhile; 
				endif; // end flexible content loop  

		 	endwhile; // end of front-page loop. ?>
			
		</main><!-- #main -->
			
	</div><!-- Container end -->


<?php get_footer(); ?>
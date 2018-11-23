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

			 	if( have_rows('homepage_layout') ):  
					while ( have_rows('homepage_layout')) : the_row(); 
					
						// Hero Carousel
						if( get_row_layout() == 'hero_image_carousel' )
						get_template_part( 'frontpage-templates/frontpage', 'hero' ); 
					 
					 // Primary Featured Categories
					 if ( get_row_layout() == 'primary_categories' )
					 get_template_part( 'frontpage-templates/frontpage', 'primary-categories' ); 

					 //get_template_part( 'frontpage-templates/frontpage', 'services' ); 
			 
					endwhile;
				endif; // end flexible content loop  
			
			endwhile; // end of the loop. ?>

		</main><!-- #main -->
			
</div><!-- Container end -->


<?php get_footer(); ?>
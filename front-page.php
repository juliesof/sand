<?php
/**
 * The template for displaying the front page.
 *
 *
 * @package understrap
 */

get_header();
?>

	<div class="container-fluid" id="content-frontpage" tabindex="-1">

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
							get_template_part( 'frontpage-template/frontpage', 'brands' );

						// About Section
						if ( get_row_layout() == 'about_store' )
							get_template_part( 'frontpage-template/frontpage', 'about' );

						// Secondary Categories
						if ( get_row_layout() == 'secondary_categories' )
							get_template_part( 'frontpage-template/seconfary-categories' );			 
					endwhile; 
				endif; // end flexible content loop  

		 	endwhile; // end of the loop. ?>
			
		</main><!-- #main -->
			
</div><!-- Container end -->


<?php get_footer(); ?>
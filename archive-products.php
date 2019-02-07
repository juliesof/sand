<?php
/**
 * Template for displaying all products
 *
 */

get_header();
?>
<div id="products-archive-page" class="container-fluid no-height">
	<div class="row wrapper products-archive-wrapper">

		<?php 
			// insert template part with store products categories & subcategories menu
			get_template_part( 'sidebar-templates/sidebar', 'temp-store-products' );  
		?>
		
		<div id="products-archive-gallery-column" class="col-md-9 col-xl-10">
			<section id="products-archive-gallery">
				<div class="product-tile-sizer"></div>
				<?php
					while ( have_posts() ) : the_post(); 
						$product_title = get_the_title();
						$product_link = get_permalink();
						$product_text = get_field( 'description' );
						$product_categories = get_field( 'category' );
						$images = get_field('product_images');
						$image0 = $images[0]['image'];
						$image1 = $images[1]['image'];
				?>
					<a href="<?php echo $product_link ?>" class="product-tile">
						<div class="tile-content-wrapper">
							<div class="tile-image-wrapper">
								<?php 
								//srcset
								$image_srcset0 = wp_get_attachment_image_srcset($image0,'xlarge');
								$image_url0 = wp_get_attachment_image_url( $image0, "med-large" );
								$img_alt0 = get_post_meta( $image0, '_wp_attachment_image_alt', true);
								$image_srcset1 = wp_get_attachment_image_srcset($image1,'xlarge');
								$image_url1 = wp_get_attachment_image_url( $image1, "med-large" );
								$img_alt1 = get_post_meta( $image1, '_wp_attachment_image_alt', true);
								?>
								<img 
									class = "archive-variants product-image-0"
									src= "<?php echo esc_attr( $image_url0 ); ?>" 
									srcset = "<?php echo esc_attr( $image_srcset0 ); ?>"
									sizes = "(min-width: 1200px) 21vw, (min-width: 768px) 25vw, 100vw"
									alt = "<?php echo $image_alt0; ?>"
								>
								<?php if ($image1): ?>
								<img 
									class="archive-variants product-image-1"
									src= "<?php echo esc_attr( $image_url1 ); ?>" 
									srcset = "<?php echo esc_attr( $image_srcset1 ); ?>"
									sizes = "(min-width: 1200px) 21vw, (min-width: 768px) 25vw, 100vw"
									alt = "<?php echo $image_alt1; ?>"
								>
								<?php endif; ?>
							</div>
							<h4 class="tour-title">
								<?php echo $tour_title ?>
							</h4>
						</div>
					</a><!-- .product-tile -->
				<?php endwhile;?>
			</section>
		</div>
	</div><!-- #st-content-wrapper -->		
</div><!-- #store-tour-page -->
<?php get_footer(); ?>
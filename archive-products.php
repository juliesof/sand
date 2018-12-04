<?php
/**
 * Template for displaying products with filterable isotope gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap_child
 */

get_header();
?>
<div id="archive-products" class="container-fluid">
	<div class="row">
		
		<section id="floating-sidebar-menu">
			<div class="floating-sidebar-title">
				<h3></h3>
			</div>
			<div class="filter-menu-container">
				<?php
				
				?>
				<a href="">
					<?php ?>
				</a>
			</div>
		</section><!-- #floating-sidebar-menu -->

		<section id="gallery-grid-container">
		
		<?php
		while ( have_posts() ) : the_post();			
			while( have_rows( 'items' )) : the_row(); 
		?>
			<div class="gallery-item">					
				<?php	
				$i = 0;
				while( have_rows( 'individual_product_photos' )) : the_row(); 
					$i++;
					if($i > 2):
						break;
					endif;//loop only twice
					$photoVariant = get_field( 'photo_variant' );
					$image_srcset = wp_get_attachment_image_srcset($photoVariant,'xlarge');
					$image_url = wp_get_attachment_image_url( $photoVariant, "med-large" );
					$img_alt = get_post_meta( $photoVariant, '_wp_attachment_image_alt', true);
				?>
					<img
						src="<?php echo esc_attr($image_url); ?>"
						srcset="<?php echo esc_attr($image_srcset); ?>"
						sizes="(min-width: 992px) 25vw,
								(min-width: 577px) 33vw,
								45vw"
						alt="<?php echo $alt ?>"
					>
				<?php 
				endwhile;//repeater loop for photo variants of item
				?>
			</div><!-- .gallery-item -->

			<?php
			endwhile; //Items loop
		endwhile; //post loop
		?>

		</section><!-- #gallery-grid-container -->
		
	</div>
</div>
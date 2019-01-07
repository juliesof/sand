<?php
/**
 * Template for displaying all items
 *
 *
 * @package understrap
 */

get_header();
?>
<div id="items-archive-page" class="container-fluid">
	<div class="row wrapper items-archive-wrapper">
		<div id="items-archive-menu-column" class="col-md-3 col-xl-2">
			<h2 class="gallery-menu-title">Categories</h2>
			<div class="menu-filters">
				<ul>
					<li>
						<a href="#apparrel">
							Apparrel
						</a>
						<ul>
							<li>
								<a href="#womens-apparrel">
									Women
								</a>	
							</li>
							<li>
								<a href="#mens-apparrel">
									Men
								</a>	
							</li>
							<li>
								<a href="#childrens-apparrel">
									Children
								</a>	
							</li>
						</ul>
					</li>
					<li>
						<a href="#jewelry">
							Jewelry
						</a>
						<ul>
							<li>
								<a href="#silver-jewelry">
									Silver
								</a>	
							</li>
							<li>
								<a href="#gems-jewelry">
									Gems
								</a>	
							</li>
							<li>
								<a href="#nautical-jewelry">
									Nautical
								</a>	
							</li>
						</ul>
					</li>
					<li>
						<a href="#home-decor">
							Home Decor
						</a>
						<ul>
							<li>
								<a href="#wall-hangings-home-decor">
									Wall Hangings
								</a>	
							</li>
							<li>
								<a href="#furniture-home-decor">
									Furniture
								</a>	
							</li>
							<li>
								<a href="#kitchen-home-decor">
									Kitchen
								</a>	
							</li>
						</ul>
					</li>
					<?php
					// if(have_rows( 'store_tour' )):
					// while(have_rows( 'store_tour' )):the_row();
						
					// 	// break after first runthrough
					// 	break;
					?>
					<?php //endwhile; endif;?>
				</ul>
			</div>
		</div>
		<div id="items-archive-gallery-column" class="col-md-9 col-xl-10">
			<section id="items-archive-gallery">
				<div class="item-tile-sizer"></div>
				<?php
					while ( have_posts() ) : the_post(); 
						$item_title = get_the_title();
						$item_link = get_permalink();
						$item_text = get_field( 'description' );
						$item_categories = get_field( 'category' );
						$images = get_field('item_images');
						$image0 = $images[0]['image'];
						$image1 = $images[1]['image'];
				?>
					<a href="<?php echo $item_link ?>" class="item-tile">
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
									class = "archive-variants item-image-0"
									src= "<?php echo esc_attr( $image_url0 ); ?>" 
									srcset = "<?php echo esc_attr( $image_srcset0 ); ?>"
									sizes = "(min-width: 1200px) 21vw, (min-width: 768px) 25vw, 100vw"
									alt = "<?php echo $image_alt0; ?>"
								>
								<?php if ($image1): ?>
								<img 
									class="archive-variants item-image-1"
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
					</a><!-- .item-tile -->
				<?php endwhile;?>
			</section>
		</div>
	</div><!-- #st-content-wrapper -->		
</div><!-- #store-tour-page -->
<?php get_footer(); ?>
<?php
/**
 * Template part for displaying Secondary Categories and Featured Item Carousel in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap_child
 *
 * CB notes: 
 *		This section publishes two different ACF content types: repeater and group.
 *		The repeater field contains the Featured Items to be displayed in owl carousel slider
 *		The group field contains the Secondary Categories which contains two blocks of content
 */

?>
 
<section id="secondary-featured" class="container">
	<div class="row no-gutters content-wrapper">
		<div id="featured-block" class="col-sm-6">
			<div id="featured-carousel" class="owl-carousel">
				<?php 
				// check for content in Primary Categories
				if( have_rows( 'featured_slider' )): 
					// loop the repeater field to create carousel slides
					while( have_rows( 'featured_slider' )) : the_row(); 
						$featImg		= get_sub_field( 'featured_image' );
						$image_srcset 	= wp_get_attachment_image_srcset( $featImg, 'large' );
						$image_url 		= wp_get_attachment_image_url( $featImg, 'medium' );
						$alt			= get_post_meta( $featImg, '_wp_attachment_image_alt', true );
					?>

					<div class="featured-slide">
						
						<img
							src="<?php echo esc_attr($image_url); ?>"
							srcset="<?php echo esc_attr($image_srcset); ?>"
							sizes="(min-width: 1200px) 525px, (min-width: 992px) 450px, (min-width: 768px) 330px, (min-width: 576px) 245px, 95vw"
							alt="<?php echo $alt ?>"
						>
						<div class="overlay-title">
							<?php
								$title = get_sub_field( 'featured_title' );
								$link  = get_sub_field( 'featured_link' );
							?>
							<h3 class="featured-slide-title">
								<?php echo($title); ?>
							</h3>
						</div>
					</div>
					
				<?php 
					endwhile;		
				endif; 
				?>
			</div><!-- #featured-carousel -->
		</div><!-- #featured-block -->
		<div id="secondary-block" class="col-sm-6">
			<?php 
			//retrieve and store the two categories' meta information
				if( have_rows( 'secondary_blocks' )): 
				while( have_rows( 'secondary_blocks' )) : the_row(); 
					
					// Secondary Category 1
					//image
					$cat_img1 		= get_sub_field( 'category_image_1' );
					$image_srcset1 	= wp_get_attachment_image_srcset( $cat_img1, 'large' );
					$image_url1		= wp_get_attachment_image_url( $cat_img1, 'medium' );
					$alt1			= get_post_meta( $cat_img1, '_wp_attachment_image_alt', true );
					//title and link
					$cat_title1		= get_sub_field( 'category_title_1' );
					$cat_link1		= get_sub_field( 'category_link_1' );
					
					// Secondary Category 2
					//image
					$cat_img2 		= get_sub_field( 'category_image_2' );
					$image_srcset2 	= wp_get_attachment_image_srcset( $cat_img2, 'large' );
					$image_url2		= wp_get_attachment_image_url( $cat_img2, 'medium' );
					$alt2			= get_post_meta( $cat_img2, '_wp_attachment_image_alt', true );
					//title and link
					$cat_title2		= get_sub_field( 'category_title_2' );
					$cat_link2		= get_sub_field( 'category_link_2' );
				endwhile;endif;
			?>
			<div class="secondary-frame">
				<div class="secondary-box">
					<a href="<?php echo esc_attr($cat_link1); ?>">
						<div class="secondary-image-frame">
							<img
								src="<?php echo esc_attr($image_url1); ?>"
								srcset="<?php echo esc_attr($image_srcset1); ?>"
								sizes="(min-width: 1200px) 525px, (min-width: 992px) 450px, (min-width: 768px) 330px, (min-width: 576px) 245px, 95vw"
								alt="<?php echo $alt1 ?>"
							>
						</div>
						<div class="secondary-title">
							<h3><?php echo $cat_title1 ?></h3>
						</div>
					</a><!-- .secondary-category-block 1 -->
				</div>
				<div class="secondary-box">
					<a href="<?php echo esc_attr($cat_link2); ?>">
						<div class="secondary-image-frame">
							<img
								src="<?php echo esc_attr($image_url2); ?>"
								srcset="<?php echo esc_attr($image_srcset2); ?>"
								sizes="(min-width: 1200px) 525px, (min-width: 992px) 450px, (min-width: 768px) 330px, (min-width: 576px) 245px, 95vw"
								alt="<?php echo $alt2 ?>"
							>
						</div>
						<div class="secondary-title">
							<h3><?php echo $cat_title2 ?></h3>
						</div>	
					</a><!-- .secondary-category-block 2 -->
				</div>
			</div><!-- .secondary-flex-box -->
		</div><!-- #secondary-block -->
	</div><!-- .row -->
</section><!-- .container -->
	
<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap_child
 */

?>
<section id="hero" class="container-fluid">
	<div class="row">
		<div class="owl-carousel cb-slider">
			<?php if( have_rows( 'hero_images' )): 
				while ( have_rows( 'hero_images' ) ) : the_row();
				
				// get posts
				$image 		= get_sub_field( 'image' );	
				$text  		= get_sub_field( 'image_text' );
				$position 	= get_sub_field( 'text_position' );

				// get srcset and image attributes
				$image_srcset 	= wp_get_attachment_image_srcset( $image, 'x-large' );
				$image_url 		= wp_get_attachment_image_url( $image, 'large' );
				$alt			= get_post_meta( $image, '_wp_attachment_image_alt', true );
			?>
			<div class="hero-image-wrapper"> 
				<img
					id="hero-image"
					src="<?php echo esc_attr($image_url); ?>"
					srcset="<?php echo esc_attr($image_srcset); ?>"
					sizes="100vw"
					alt="<?php echo $alt ?>"
				>
				<div class="hero-text hero-text-<?php echo $position ?>">
					<?php echo $text ?>
				</div>
			</div>

			<?php endwhile; endif; ?>
		</div>
	</div>
</section>
	
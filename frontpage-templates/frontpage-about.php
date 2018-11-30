<?php
/**
 * Template part for displaying About Section in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap_child
 */

?>

<section id="fp-about" class="container-fluid">
	<div class="row">
		
		<div class="about-parallax-container">
			<div class="parallax-image">
				<?php 
				// check for content in primary categories
					$aboutImage 	= get_sub_field( 'image' );
					$image_srcset 	= wp_get_attachment_image_srcset( $aboutImage, 'large' );
					$image_url 		= wp_get_attachment_image_url( $aboutImage, 'med' );
					$alt			= get_post_meta( $aboutImage, '_wp_attachment_image_alt', true );
				?>
				<img
					id="parallax-image"
					src="<?php echo esc_attr($image_url); ?>"
					srcset="<?php echo esc_attr($image_srcset); ?>"
					sizes="100vw"
					alt="<?php echo $alt ?>"
				>
			</div>
			<div class="parallax-text">
				<?php
					// retrieve About text
					$aboutText = get_sub_field( 'text' );
				?>
				<h3 class="text-inner">
					<?php 
						echo $aboutText;
					?>
				</h3>
			</div>
		</div><!-- .about-parallax-container -->

	</div><!-- .row -->
</section><!-- .container -->
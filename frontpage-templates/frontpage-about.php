<?php
/**
 * Template part for displaying About Section in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap_child
 */

?>

<section id="fp-about" class="container">
	<div class="row">
		<div class="col-md-5 about-content-block">
			<?php
				// retrieve About content
				$aboutTitle = get_sub_field( 'about_title' );
				$aboutText = get_sub_field( 'about_text' );
			?>
			<h2 class="fp-about-title">
				<?php 
					echo $aboutTitle;
				?>
			</h2>
			<p class="fp-about-text">
				<?php 
					echo $aboutText;
				?>
			</p>
			<a href="<?php echo home_url(); ?>/our-story">
				<button type="button" class="btn btn-outline-info">Read More</button>
			</a>
		</div>
		<div class="col-md-7 about-image-block">
			<?php 
			// check for content in primary categories
				$aboutImage 	= get_sub_field( 'about_image' );
				$image_srcset 	= wp_get_attachment_image_srcset( $aboutImage, 'xxxlarge' );
				$image_url 		= wp_get_attachment_image_url( $aboutImage, 'xlarge' );
				$alt			= get_post_meta( $aboutImage, '_wp_attachment_image_alt', true );
			?>
			<div id="fp-about-image">
				<img
					src="<?php echo esc_attr($image_url); ?>"
					srcset="<?php echo esc_attr($image_srcset); ?>"
					sizes="(min-width: 768px) 50vw, 100vw"
					alt="<?php echo $alt ?>"
				/>
			</div>
		</div>
	</div><!-- .row -->
</section><!-- .container -->
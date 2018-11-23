<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package understrap_child
 */

?>
			
<?php 
	// check for content in primary categories
	if( have_rows( 'primary_categories' )): 
	
	// $category_list = array(); //create array to store category objects
		$category_list = array();
		while ( have_rows( 'primary_categories' ) ) : the_row();
			// get primary categories posts
			$name 		= get_sub_field( 'category_name' );	
			$image  	= get_sub_field( 'category_image' );
		
			
			
			$category_list[] = array(
				'name'  	=> $name,
				'image'		=> $image,
			);
		endwhile; 
?>

	<section id="primary-categories">
		<article id="<?php echo $category_list[0]['name'] ?>" class=" fp-size-half"
			<?php
				// get srcset and image attributes
	 			$id			= $category_list[0]['image'];
	 			$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
	 			$url 		= wp_get_attachment_image_url( $id, 'large' );
	 			$alt		= get_post_meta( $id, '_wp_attachment_image_alt', true );
			?>
		> <!-- end article tag -->
			<?php		echo $category_list[0]['name'] ?>
			<div class="category-image">
				<img
					src="<?php echo esc_attr($url); ?>"
					srcset="<?php echo esc_attr($srcset); ?>"
					alt="<?php echo esc_attr($alt); ?>"
					sizes="(min-width: 768px) 45vw, 100vw"
				>
			</div>
		</article>
		<article id="<?php echo $category_list[1]['name'] ?>" class=" fp-size-quarter"
			<?php
				// get srcset and image attributes
	 			$id			= $category_list[1]['image'];
	 			$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
	 			$url 		= wp_get_attachment_image_url( $id, 'large' );
	 			$alt		= get_post_meta( $id, '_wp_attachment_image_alt', true );
			?>
		> <!-- end article tag -->
			<?php		echo $category_list[1]['name'] ?>
			<div class="category-image">
				<img
					src="<?php echo esc_attr($url); ?>"
					srcset="<?php echo esc_attr($srcset); ?>"
					alt="<?php echo esc_attr($alt); ?>"
					sizes="(min-width: 768px) 45vw, 100vw"
				>
			</div>
		</article>
		<article id="<?php echo $category_list[2]['name'] ?>" class=" fp-size-eighth"
			<?php
				// get srcset and image attributes
	 			$id			= $category_list[2]['image'];
	 			$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
	 			$url 		= wp_get_attachment_image_url( $id, 'large' );
	 			$alt		= get_post_meta( $id, '_wp_attachment_image_alt', true );
			?>
		> <!-- end article tag -->
			<?php		echo $category_list[2]['name'] ?>
			<div class="category-image">
				<img
					src="<?php echo esc_attr($url); ?>"
					srcset="<?php echo esc_attr($srcset); ?>"
					alt="<?php echo esc_attr($alt); ?>"
					sizes="(min-width: 768px) 45vw, 100vw"
				>
			</div>
		</article>
		<article id="<?php echo $category_list[3]['name'] ?>" class=" fp-size-eighth"
			<?php
				// get srcset and image attributes
	 			$id			= $category_list[3]['image'];
	 			$srcset = wp_get_attachment_image_srcset( $id, 'x-large' );
	 			$url 		= wp_get_attachment_image_url( $id, 'large' );
	 			$alt		= get_post_meta( $id, '_wp_attachment_image_alt', true );
			?>
		> <!-- end article tag -->
			<?php		echo $category_list[3]['name'] ?>
			<div class="category-image">
				<img
					src="<?php echo esc_attr($url); ?>"
					srcset="<?php echo esc_attr($srcset); ?>"
					alt="<?php echo esc_attr($alt); ?>"
					sizes="(min-width: 768px) 45vw, 100vw"
				>
			</div>
		</article>
	</section>
<?php endif; ?>
	
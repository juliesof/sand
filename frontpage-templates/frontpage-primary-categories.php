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
			while(the_repeater_field('primary_categories')):	
				$name 		= get_sub_field( 'category_name' );	
				$image  	= get_sub_field( 'category_image' );
			endwhile;
			$category_list[] = array(
				'name'  = $name,
				'image'	= $image,
			);
		
		endwhile; 
?>

<?php
	print_r($category_list);
	
 ?><?php
	
	// get srcset and image attributes
	// $image_srcset = wp_get_attachment_image_srcset( $image, 'x-large' );
	// $image_url 		= wp_get_attachment_image_url( $image, 'large' );
	// $alt					= get_post_meta( $image, '_wp_attachment_image_alt', true );
?>

	<section id="primary-categories">
		<div>Hello World</div>
	<!-- 	<article id="<?php echo $name ?>" class="fp-category-item fp-size-half">
					
		</article>
		<article id="<?php echo $name ?>" class="fp-category-item fp-size-quarter">
					
		</article>
		<article id="<?php echo $name ?>" class="fp-category-item fp-size-eighth">
					
		</article>
		<article id="<?php echo $name ?>" class="fp-category-item fp-size-eighth">
					
		</article> -->
	</section>
<?php endif; ?>
	
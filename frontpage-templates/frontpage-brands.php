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
	if( have_rows( 'brand_logos' )): 
		while( have_rows( 'brand_logos' )) : the_row(); 
			$logo = get_sub_field( 'logo_image' );
?>
	<section id="brand-bar">
		<div class="brand-logo">
			<?php wp_get_attachment_image( $logo, 'full' ); ?>
		</div>
		<div class="separator-icon">
			<img >
		</div>
		</article>
	</section>
<?php 
		endwhile;		
	endif; 
?>
	
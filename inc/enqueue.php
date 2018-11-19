<?php 
/**
 * Understrap child theme enqueue scripts
 *
 * @package understrap
 */

function cb_theme_scripts() {
	// creative custom styling and scripts
		wp_enqueue_style( 'creative-styles',
			get_stylesheet_directory_uri() . '/css/style-creative.css', array(), 1 );

		// Owl Carousel
		wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.carousel.min.css', array(), true );
		// default Owl Carousel e.g. nav buttons
		wp_enqueue_style( 'owl-theme-style', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.theme.default.min.css', array(), true );
		wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.carousel.min.js', array('jquery'), true );

		// custom javascript
		wp_enqueue_script( 'creative-js', get_stylesheet_directory_uri() . '/js/creative.js', array( 'jquery' ), true );
}

add_action( 'wp_enqueue_scripts', 'cb_theme_scripts' );
?>
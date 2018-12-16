<?php 
/**
 * Understrap child theme enqueue scripts
 *
 * @package understrap
 */

function cb_theme_scripts() {

	// Featherlight Stylesheet
	wp_enqueue_style( 'featherlight-styles', get_stylesheet_directory_uri() . '/css/featherlight.min.css', array(), '1.7.13' );
	// Featherlight Gallery Stylesheet
	wp_enqueue_style( 'featherlight-gallery-styles', get_stylesheet_directory_uri() . '/css/featherlight.gallery.min.css', array(), '1.7.13' );
	
	// creative custom styling and scripts
	wp_enqueue_style( 'creative-styles',
		get_stylesheet_directory_uri() . '/css/style-creative.css', array(), 1 );

	// Owl Carousel
	wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.carousel.min.css', array(), true );
	// default Owl Carousel e.g. nav buttons
	wp_enqueue_style( 'owl-theme-style', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.theme.default.min.css', array(), true );
	wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/lib/Owl-Carousel/owl.carousel.min.js', array('jquery'), true );

	// Isotope library & Images loaded library
	wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array(), '3.0.6' );
	wp_enqueue_script( 'images-loaded-js', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4'  );

	// Featherlight JS
	wp_enqueue_script( 'featherlight-js', get_stylesheet_directory_uri() . '/lib/Featherlight/featherlight.min.js', array('jquery'), '1.7.13' );
	// Featherlight gallery JS
	wp_enqueue_script( 'featherlight-gallery-js', get_stylesheet_directory_uri() . '/lib/Featherlight/featherlight.gallery.min.js', array('jquery'), '1.7.13' );

	// custom javascript
	wp_enqueue_script( 'creative-js', get_stylesheet_directory_uri() . '/js/creative.js', array( 'jquery' ), true );
}

add_action( 'wp_enqueue_scripts', 'cb_theme_scripts' );
?>
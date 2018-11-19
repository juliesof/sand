/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

jQuery(document).ready(function($) {

	// Owl Carousel
	var $owlCarousel = $('.owl-carousel');
	//include owl carousel
	$owlCarousel.owlCarousel({
		items: 1,
		loop: true,
		//autoplay: true,
		animateIn: "fadeIn",
		animateOut: "fadeOut",
		lazyLoad: true,
		mouseDrag: true,
		touchDrag: true,
		center: true
	});

	// Isotope
	//Front Page Primary Categories Section
	var $servicesGrid = $('#primary-categories').imagesLoaded( function(){
		$servicesGrid.isotope({
			itemSelector: '.fp-category-item'
		});
	}); // end frontpage GALLERIES function
}); //end document.ready()

		
		// nav: true,
		// navText : ["<i class='fa fa-3x fa-chevron-left'></i>","<i class='fa fa-3x fa-chevron-right'></i>"]
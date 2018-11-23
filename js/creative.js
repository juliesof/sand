/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

jQuery(document).ready(function($) {

	// size hero section to fill viewport
	if ($('body').hasClass('home')){
		var $hero = $('#hero');
		function heroHeight(){
			if( $(window).width() > 992 ) {
				var	$navbar = $('#wrapper-navbar');
					$height = $(window).height() - $navbar.height();
				$hero.css({'height':$height});
			}else {
				$hero.css({'height':'50vh'});
			}
		}
		//run on page load
		heroHeight();
		//run on page resize
		$(window).resize(heroHeight);
	}
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
	var $categoryGrid = $('.category-grid');
	$categoryGrid.isotope({
		itemSelector: '.fp-category-item',
		masonry: {
			columnWidth: '.fp-grid-sizer'
		},
		percentPosition: true,
	});
	// end frontpage GALLERIES function

}); //end document.ready()

		
		// nav: true,
		// navText : ["<i class='fa fa-3x fa-chevron-left'></i>","<i class='fa fa-3x fa-chevron-right'></i>"]
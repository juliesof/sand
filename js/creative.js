/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

jQuery(document).ready(function($) {

var $body = $('body');
	
	// check if on the homepage
	if( $body.hasClass('home') ){
		// size hero section to fill viewport
		var $hero = $('#hero');
		function heroHeight(){
			if( $(window).width() > 992 && $(window).height() < $(window).width()){
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

		//----- About Section
		var $fpAbout 	= $('#fp-about');
			$fpAboutImg = $('.parallax-image > img');

		$(window).scroll(function() {
			var $oT  = $fpAbout.offset().top,  //vertical position of top of About Section from top of document
				$aH  = $fpAbout.outerHeight(),//the outer height of the About Section includes border but not margin
				$wH  = $(window).height(),   //height of viewport window
				$top = $(this).scrollTop(); //amount user scrolls
			if ($top > ($oT - $wH) && $top < ($oT + $aH)){ //when About Section is in the viewport
				var $parallaxY = ($top - $oT + $wH)/2; //starts at zero when About Section enters viewport and increases half fast
				$fpAboutImg.css({"transform" : "translateY("+$parallaxY+"px)"});
			//}else if($top > ($oT + $aH - 35 )) { //when About Section is above viewport
				//$fpAboutImg.css({"transform" : "translateY(-50px)"});
			}else { //when About Section is below viewport
				$fpAboutImg.css({"transform" : ""});
			}
		});

		// Hero Owl Carousel
		var $heroCarousel = $('#hero-carousel');
		//include owl carousel
		$heroCarousel.owlCarousel({
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

		// Front Page Brand Owl Carousel
		var $brandCarousel = $('#brand-carousel');
		$brandCarousel.owlCarousel({
			items: 3,
			loop: true,
			//autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
			center: true,
			margin: 50,
		});

		// Front Page Featured Items
		var $featuredCarousel = $('#featured-carousel');
		$featuredCarousel.owlCarousel({
			items: 1,
			loop: true,
			//autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
			center: true,
		});
	}

	//check if currently on the store tour page
	if( $body.hasClass('page-template-page-store-tour') ) {
		// Store Tour isotope gallery tiles
		var $tourGallery = $('#store-tour-gallery').isotope({
			itemSelector: '.tour-tile',
			percentPosition: true,
			stagger: 10,
			masonry: {
				columnWidth: '.tour-tile-sizer',
			},
		});
		// Store Tour featherlight gallery
		$('a.tour-tile').featherlight({
			targetAttr: 'href'
		});
	}

}); //end document.ready()

		
		// nav: true,
		// navText : ["<i class='fa fa-3x fa-chevron-left'></i>","<i class='fa fa-3x fa-chevron-right'></i>"]
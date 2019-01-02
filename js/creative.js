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
			// autoplay: true,
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
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 3
				}
			},
			loop: true,
			autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
			center: true,
			margin: 200,
		});

		// Front Page Featured Items
		var $featuredCarousel = $('#featured-carousel');
		$featuredCarousel.owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
			center: true,
		});
	}

	//Store Tour Page
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
		$('a.tour-tile').featherlightGallery();
	}

	//Items Archive Page
	if( $body.hasClass('post-type-archive-items') ) {
		// Store Tour isotope gallery tiles
		var $itemsGallery = $('#item-archive-gallery').isotope({
			itemSelector: '.item-tile',
			percentPosition: true,
			stagger: 10,
			masonry: {
				columnWidth: '.item-tile-sizer',
			},
		});
	}

	//Items Single Page
	if( $body.hasClass('single-items') ) {
		
		var $galleryContainer 	= $('.single-gallery-grid');
			$varImages 			= $('.single-image-wrapper');
			$imageMenu 			= $('.thumbnail-menu');
		
		//Create function for determining which zoom plugin to use based on screen size
		$.fn.chooseZoomPlugin = function() {
			// return this.css('justify-content') == 'center';
			//returns true if grid items are centered align, gallery is single column layout
			// check for screen size and initiate appropriate zoom plugin
			$currentImage = $( '.single-image-wrapper' );
			if ( this.css('justify-content') == 'center' ) {
				$currentSource = $currentImage.find('img').attr('src');
				$currentImage.zoom({
					on: 'toggle',
				});
			}else {
				$currentImage.jzoom({
					suffixName: '-1024x1024',
				});
			}
		}

		// Check and intialize immediately upon page load
		$galleryContainer.chooseZoomPlugin();	
		
		// Recheck and reinitialize on window resize
		$( window ).resize( function() {
			$galleryContainer.chooseZoomPlugin();
		} );

		// 
		$imageMenu.on('click', 'img',function(){
			$imgSelector = $(this).data('variant');
			$varImages.fadeOut();
			$whichClass = '.' + $imgSelector;
			$varImages.removeClass('current');
			$varImages.filter($whichClass).fadeIn().addClass('current');
			// Also reinitalize zooms now that the photo changed
			$galleryContainer.chooseZoomPlugin();
		});
		// $imgSource = $currentImage.find('img').attr('src');
		// $varImages.zoom({
		// 	url: $imgSource
		// });
	}

}); //end document.ready()

		
		// nav: true,
		// navText : ["<i class='fa fa-3x fa-chevron-left'></i>","<i class='fa fa-3x fa-chevron-right'></i>"]
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
		});// end frontpage GALLERIES function

		// Front Page Brand Owl Carousel
		var $brandCarousel = $('#brand-carousel');
		$brandCarousel.owlCarousel({
			responsive: {
				0: {
					items: 2,
					margin: 50,
				},
				768: {
					center: true,
					items: 3,
					margin: 200
				}
			},
			loop: true,
			autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
		});//Front Page Brand Carousel

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

		// Front Page parallax
		var $parallaxContainer 	= $( '#fp-parallax' );
			$parallaxItem		= $( '>.parallax-image' );
		$( '#fp-parallax' ).parallax({
			speed: .3,
			sliderSelector: '>.parallax-image',
		});

	} // End Home Functions

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

		// Add "floating-menu" class to select objects when the category menu toggle is clicked
		var $tourMenuToggle = $( '.gallery-menu-toggle' );
			$tourMenuColumn = $( '#st-menu-column' );
			$tourContent = $( '#store-tour-page' );
	
		$tourMenuToggle.click(function() {
			$tourMenuColumn.toggleClass( 'floating-menu' );
			$tourContent.toggleClass( 'floating-menu' );
			if ($tourContent.hasClass( 'no-height' )) {
				$tourContent.removeClass( 'no-height' );
			}
			else {
				//queue the removal of height to wait until transition finishes
				$tourContent.delay( 300 ).queue( function(){
					$tourContent.addClass( 'no-height' ).dequeue();
				});
			}
		});
	}

	//Items Archive Page
	if( $body.hasClass( 'post-type-archive-items' ) ) {
		// Store Tour isotope gallery tiles
		var $itemsGallery = $( '#items-archive-gallery' ).isotope({
			itemSelector: '.item-tile',
			percentPosition: true,
			stagger: 10,
			masonry: {
				columnWidth: '.item-tile-sizer',
			},
		});
		// Add "floating-menu" class to select objects when the category menu title is clicked
		var $itemsMenuToggle = $( '.gallery-menu-toggle' );
			$itemsMenuColumn = $( '#items-archive-menu-column' );
			$itemsContent = $( '#items-archive-page' );
	
		$itemsMenuToggle.click(function() {
			$itemsMenuColumn.toggleClass( 'floating-menu' );
			$itemsContent.toggleClass( 'floating-menu' );
			if ($itemsContent.hasClass( 'no-height' )) {
				$itemsContent.removeClass( 'no-height' );
			}
			else {
				//queue the removal of height to wait until transition finishes
				$itemsContent.delay( 300 ).queue( function(){
					$itemsContent.addClass( 'no-height' ).dequeue();
				});
			}
		});
	}

	//Items Single Page
	if( $body.hasClass('single-items') ) {
		
		var $galleryContainer 	= $( '.single-gallery-grid' );
			$varImages 			= $( '.single-image-wrapper' );
			$imageMenu 			= $( '.thumbnail-menu' );
		
		//Create function for determining which zoom plugin to use based on screen size
		$.fn.chooseZoomPlugin = function() {
			// return this.css('justify-content') == 'center';
			// fires appropriate zoom js at major media query at 768px based on column layout
			// check for screen size based on css media query breakpoints
			$currentImage = $( '.single-image-wrapper.current' );
			if ( this.css('justify-content') == 'center' ) {
				// search for src image to be used as zoom
				$bigImage = $currentImage.find( 'img' ).attr( 'src' );
				$currentImage.zoom({
					url: $bigImage,
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
		
		// Clean HTML when window resizes to prevent duplicates
		// $.fn.cleanObject = function(className) {
		// 	this.children().not(className).remove();
		// }

		// Recheck and reinitialize on window resize
		$( window ).resize( function() {
			// $currentImage.cleanObject( '.item-image-sizer' );
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
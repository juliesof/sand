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
			autoplay: true,
			autoplayHoverPause: true,
			autoplaySpeed: 400,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			center: true,
			items: 1,
			loop: true,
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
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

		// Front Page Featured Products
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
			speed: .2,
			sliderSelector: '>.parallax-image',
		});
		// Reinitialize parallax when screen width changes
		$( window ).resize( function() {
			// kill current to prevent duplicates
			$( '#fp-parallax' ).parallax( 'destroy' );
			$( '#fp-parallax' ).parallax({
				speed: .2,
				sliderSelector: '>.parallax-image',
			});
		} );

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

	//Products Archive Page
	if( $body.hasClass( 'post-type-archive-products' ) ) {
		// Store Tour isotope gallery tiles
		var $productsGallery = $( '#products-archive-gallery' ).isotope({
			itemSelector: '.product-tile',
			percentPosition: true,
			stagger: 10,
			masonry: {
				columnWidth: '.product-tile-sizer',
			},
		});
		// Add "floating-menu" class to select objects when the category menu title is clicked
		var $productsMenuToggle = $( '.gallery-menu-toggle' );
			$productsMenuColumn = $( '#products-archive-menu-column' );
			$productsContent = $( '#products-archive-page' );
	
		$productsMenuToggle.click(function() {
			$productsMenuColumn.toggleClass( 'floating-menu' );
			$productsContent.toggleClass( 'floating-menu' );
			if ($productsContent.hasClass( 'no-height' )) {
				$productsContent.removeClass( 'no-height' );
			}
			else {
				//queue the removal of height to wait until transition finishes
				$productsContent.delay( 300 ).queue( function(){
					$productsContent.addClass( 'no-height' ).dequeue();
				});
			}
		});
	}

	//Products Single Page
	if( $body.hasClass('single-products') ) {
		
		var $galleryContainer 	= $( '.single-gallery-grid' );
			$varImages 			= $( '.single-image-wrapper' );
			$imageMenu 			= $( '.thumbnail-menu' );
		
		//Create function for determining which zoom plugin to use based on screen size
		$.fn.chooseZoomPlugin = function() {
			// return this.css('justify-content') == 'center';
			// fires appropriate zoom js at major media query at 768px based on column layout
			// check for screen size based on css media query breakpoints
			$currentImage = $( '.single-image-wrapper.current' );
			if ( this.css('justify-content') == 'center' ) { //mobile
				// search for src image to be used as zoom
				console.log('mobile');
				$bigImage = $currentImage.find( 'img' ).attr( 'src' );
				$currentImage.zoom({
					url: $bigImage,
					on: 'toggle',
				});
			}else {
				console.log('desktop');
				$currentImage.jzoom({ //desktop
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
			// $currentImage.cleanObject( '.product-image-sizer' );
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
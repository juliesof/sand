/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

// return focus rings to selectable elements if user presses the "tab" key
function handleFirstTab(e) {
    if (e.keyCode === 9) { // if user uses the "tab" key
        document.body.classList.add('user-is-tabbing');
        window.removeEventListener('keydown', handleFirstTab);
    }
}

window.addEventListener('keydown', handleFirstTab);



jQuery(document).ready(function($) {

	var $body = $('body');
	
	// check if on the homepage
	if( $body.hasClass('home') ){

		// Hero Owl Carousel
		var $heroCarousel = $('#hero-carousel');
		//include owl carousel
		$heroCarousel.owlCarousel({
			// autoplay: true,
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
		// var $categoryGrid = $('.category-grid');
		// $categoryGrid.isotope({
		// 	itemSelector: '.fp-category-item',
		// 	masonry: {
		// 		columnWidth: '.fp-grid-sizer'
		// 	},
		// 	percentPosition: true,
		// });// end frontpage GALLERIES function

		// Front Page Brand Owl Carousel
		var $brandCarousel = $('#brand-carousel');
		$brandCarousel.owlCarousel({
			responsive: {
				0: {
					items: 2,
					slideBy: 2,
					margin: 50,
				},
				768: {
					center: true,
					items: 3,
					slideBy: 3,
					margin: 150,
				},
				992: {
					items: 3,
					slideBy: 3,
					margin: 200,

				},
				1200: {
					items: 4,
					slideBy: 4,
					margin: 150,
				},
			},
			loop: true,
			// autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			lazyLoad: true,
			mouseDrag: true,
			touchDrag: true,
		});//Front Page Brand Carousel

		// Front Page Featured Products
		var $featuredCarousel = $('#featured-carousel');
		$featuredCarousel.owlCarousel({
			// autoplay: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			center: true,
			items: 1,
			lazyLoad: true,
			loop: true,
			mouseDrag: true,
			nav: true,
			navText : [ '<svg class="svg-chevron"><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/></svg>',
						'<svg class="svg-chevron"><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/></svg>'],
			touchDrag: true,
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
	if( $body.hasClass('post-type-archive-store-tour') ) {
		// Store Tour isotope gallery tiles
		var $tourGallery = $('#store-tour-gallery').isotope({
			itemSelector: '.tour-tile',
			percentPosition: true,
			stagger: 10,
			masonry: {
				columnWidth: '.tour-tile-sizer',
			},
		});

		// filter tour tiles on menu-item click
		var $tourMenuColumn = $( '#st-menu-column' );
		$tourMenuColumn.on( 'click', 'li', function() {
			var filterValue = $(this).attr('data-filter');
			$tourGallery.isotope({ filter: filterValue });
			console.log( filterValue.replace( '.', '' ) );
			// $( filterValue.replace( '.', '' ) )
		});

		// Store Tour featherlight gallery
		$('a.tour-tile').featherlight({
			targetAttr: 'href'
		});
		$('a.tour-tile').featherlightGallery();

		// Add "floating-menu" class to select objects when the category menu toggle is clicked
		var $tourMenuToggle = $( '.gallery-menu-toggle' );
			$tourMenuColumn = $( '#st-menu-column' );
			$tourContent 	= $( '#store-tour-page' );
	
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
		// filter items on menu-item click
		var $productsMenuColumn = $( '#products-archive-menu-column' );
		$productsMenuColumn.on( 'click', 'li', function() {
			var filterValue = $(this).attr('data-filter');
			$productsGallery.isotope({ filter: filterValue });
		});
		

		// Add "floating-menu" class to select objects when the category menu title is clicked
		var $productsMenuToggle = $( '.gallery-menu-toggle' );
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
			$imageVariants		= $( '.single-image-wrapper' );
			$imageMenu 			= $( '.thumbnail-menu' );

		// Hide all variants except the current (first) one
		$imageVariants.css( "display", "flex" ).hide();
		$( '.single-image-wrapper.current' ).css( "display", "flex" );

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
				// Instantiate EasyZoom instances
				var $zoomed = $currentImage.easyZoom();
				// $currentImage.jzoom({ //desktop
				// 	suffixName: '-1024x1024',
				// });
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
		$imageMenu.on( 'click', 'img', function(){
			$imgSelector = $(this).data( 'variant' );
			$imageVariants.hide( 0 );
			$whichClass = '.' + $imgSelector;
			$imageVariants.removeClass( 'current' );
			$currentImage = $imageVariants.filter($whichClass).addClass( 'current' )
				// give it display flex, then hide, then fade in
				.css( "display", "flex" ).hide().fadeIn();
			// Also reinitalize zooms now that the photo changed
			$galleryContainer.chooseZoomPlugin();
		});	
		
		//Create function for determining which zoom plugin to use based on screen size
		// $.fn.chooseZoomPlugin = function() {
		// 	// return this.css('justify-content') == 'center';
		// 	// fires appropriate zoom js at major media query at 768px based on column layout
		// 	// check for screen size based on css media query breakpoints
		// 	$currentImage = $( '.single-image-wrapper.visible' );
		// 	if ( this.css( 'justify-content' ) == 'center' ) { //mobile
		// 		// search for src image to be used as zoom
		// 		console.log('mobile');
		// 		$bigImage = $currentImage.find( 'img' ).attr( 'src' );
		// 		$currentImage.zoom({
		// 			url: $bigImage,
		// 			on: 'toggle',
		// 		});
		// 	}else {
		// 		console.log('desktop');
		// 		$imgSource = $currentImage.find('img').attr('src');
		// 		console.log($imgSource);
		// 		var subStr = $imgSource.match("991(.*).");
		// 		var suffix = "-991x" + subStr;
		// 		console.log(subStr);
		// 		$currentImage.jzoom({
		// 			suffixName: '',
		// 		});
		// 		// $currentImage.jzoom({ //desktop
		// 		// 	suffixName: '-1024x1024',
		// 		// });
		// 	}
		// }

		// // Check and intialize immediately upon page load
		// $galleryContainer.chooseZoomPlugin();	
		
		// // Clean HTML when window resizes to prevent duplicates
		// // $.fn.cleanObject = function(className) {
		// // 	this.children().not(className).remove();
		// // }

		// // Recheck and reinitialize on window resize
		// $( window ).resize( function() {
		// 	// $currentImage.cleanObject( '.product-image-sizer' );
		// 	$galleryContainer.chooseZoomPlugin();
		// } );

		// // 
		// $imageMenu.on('click', 'img',function(){
		// 	$imgSelector = $(this).data('variant');
		// 	// hide all image variants
		// 	$imageVariants.removeClass('visible');
		// 	// create 
		// 	$whichClass = '.' + $imgSelector;
		// 	// Swap out appropriate image variant
		// 	$imageVariants.filter($whichClass).addClass('visible');
		// 	// Also reinitalize zooms now that the photo changed
		// 	$galleryContainer.chooseZoomPlugin();
		// });
		// $imgSource = $currentImage.find('img').attr('src');
		// $imageVariants.zoom({
		// 	url: $imgSource
		// });
	}

}); //end document.ready()
(function($) {
	//add padding to page top when sticky header is active
	var $header = $(".site-header").height(),
		$bottom	= $(".header-bottom").height(),
		$top	= $(".header-top").height(),
		$pad 	= $bottom + $top;
		$page 	= $("#page"),
		$ww 	= $(window).width();
		console.log({".site-header: " + $header, 
			"top-header: " +  $top, 
			"bottom-header: " +  $bottom, 
			"#page padding-top: " +  $pad});
	if ( $ww >= 992 ) {
		$(window).scroll(function() {
			$(this).scrollTop() > $header ? $page.css("padding-top", $pad) : $page.css("padding-top","0")
		})
	}
})( jQuery );

(function($) {
	//add padding to page top when sticky header is active
	var $header = $(".header-bottom"),
		$page 	= $("#page"),
		$pad 	= "padding",
		$sticky = "sticky-header"
		$ww 	= $(window).width();
	$(window).scroll(function() {
		console.log("word");
		$header.hasClass($sticky) ? $page.addClass($pad) : $page.removeClass($pad)
	});
})( jQuery );
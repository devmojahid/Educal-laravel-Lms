/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
02. Search Js
03. Info Bar Js
04. Sticky Header Js
05. Data-Background Js
06. Mobile Menu Js
07. Scroll To Top Js
08. Hero Slider Js
09. Testimonial Js
10. Product Slider Js
11. Product Slider 2 Js
12. Product Slider 3 Js
13. Product Slider 4 Js
14. Sale Slider Js 
15. Sale Slider 2 Js 
16. Client Slider Js
17. Blog Slider Js
18. Product Offer SLider Js 
19. Masonary Js
20. WoW Js
21. Cart Plus Minus Js
22. Range Slider Js
23. Show Login Toggle Js
24. Show Coupon Toggle Js
25. Create An Account Toggle Js
26. Shipping Box Toggle Js
****************************************************/

(function ($) {
"use strict";

	var windowOn = $(window);
	////////////////////////////////////////////////////
    // 01. PreLoader Js
	windowOn.on('load',function() {
		$("#loading").fadeOut(500);
	});

	// meanmenu
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "1199",
		meanExpand: ['<i class="fal fa-plus"></i>'],
	});


	$("#sidebar-toggle").on("click", function () {
		$(".sidebar__area").addClass("sidebar-opened");
		$(".body-overlay").addClass("opened");
	});
	$(".sidebar__close-btn").on("click", function () {
		$(".sidebar__area").removeClass("sidebar-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
    // 02. Cart Toggle Js
	$(".cart-toggle-btn").on("click", function () {
		$(".cartmini__wrapper").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".cartmini__close-btn").on("click", function () {
		$(".cartmini__wrapper").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});
	$(".body-overlay").on("click", function () {
		$(".cartmini__wrapper").removeClass("opened");
		$(".sidebar__area").removeClass("sidebar-opened");
		$(".header__search-3").removeClass("search-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
    // 02. Search Js
	$(".search-toggle").on("click", function () {
		$(".header__search-3").addClass("search-opened");
		$(".body-overlay").addClass("opened");
	});
	$(".header__search-3-btn-close").on("click", function () {
		$(".header__search-3").removeClass("search-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
    // 04. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$("#header-sticky").removeClass("sticky");
		} else {
			$("#header-sticky").addClass("sticky");
		}
	});

	////////////////////////////////////////////////////
    // 05. Data-Background Js
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

  

	var swiper = new Swiper('.testimonial__slider', {
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
	



	var galleryThumbs = new Swiper('.slider__nav', {
		spaceBetween: 0,
		slidesPerView: 4,
		freeMode: true,
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
	});
	var galleryTop = new Swiper('.slider__wrapper', {
		spaceBetween: 0,
		effect: 'fade',
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: galleryThumbs
		}
	});





	var swiper = new Swiper('.brand__slider', {
		slidesPerView: 6,
		spaceBetween: 30,
		centeredSlides: true,
		loop: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {  
			'992': {
			  slidesPerView: 6,
			},
			'768': {
			  slidesPerView: 4,
			},
			'576': {
			  slidesPerView: 3,
			},
			'0': {
			  slidesPerView: 1,
			},
		},
	});

	var tesimonialThumb = new Swiper('.testimonial-nav', {
		spaceBetween: 20,
		slidesPerView: 3,
		loop: true,
		freeMode: true,
		loopedSlides: 5, //looped slides should be the same
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
		centeredSlides: true,
	  });
	  var testimonialText = new Swiper('.testimonial-text', {
		spaceBetween: 0,
		loop: true,
		loopedSlides: 5, //looped slides should be the same
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
		thumbs: {
		  swiper: tesimonialThumb,
		},
	  });

	  // course slider
	  var swiper = new Swiper('.course__slider', {
		spaceBetween: 30,
		slidesPerView: 2,
		breakpoints: {  
			'768': {
			  slidesPerView: 2,
			},
			'576': {
			  slidesPerView: 1,
			},
			'0': {
			  slidesPerView: 1,
			},
		},
		pagination: {
		  el: '.swiper-pagination',
		  clickable: true,
		},
	  });
	
	////////////////////////////////////////////////////
    // 19. Masonary Js
	$('.grid').imagesLoaded( function() {
		// init Isotope
		var $grid = $('.grid').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		  masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		  }
		});


	// filter items on button click
	$('.masonary-menu').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});

	//for menu active class
	$('.masonary-menu button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});

	});


	////////////////////////////////////////////////////
    // 20. WoW Js
	new WOW().init();

	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	  });
	

	////////////////////////////////////////////////////
	// 21. Cart Plus Minus Js
	$('.cart-minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.cart-plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});




	////////////////////////////////////////////////////
	// 23. Show Login Toggle Js
	$('#showlogin').on('click', function () {
		$('#checkout-login').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 24. Show Coupon Toggle Js
	$('#showcoupon').on('click', function () {
		$('#checkout_coupon').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 25. Create An Account Toggle Js
	$('#cbox').on('click', function () {
		$('#cbox_info').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 26. Shipping Box Toggle Js
	$('#ship-box').on('click', function () {
		$('#ship-box-info').slideToggle(1000);
	});


	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
	

	if ($('.scene').length > 0 ) {
		$('.scene').parallax({
			scalarX: 10.0,
			scalarY: 15.0,
		}); 
	};

	////////////////////////////////////////////////////
    // 15. InHover Active Js
	$('.hover__active').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.hover__active').removeClass('active');
	});

})(jQuery);
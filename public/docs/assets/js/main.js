(function (window, document, $) {
	'use strict';

	/*--------------- nav-sidebar js--------*/
	if ($('.nav-sidebar > li').hasClass('active')) {
		$(".nav-sidebar > li.active").find('ul').slideDown(700);
	}

	function active_dropdown() {
		$('.nav-sidebar > li .icon').on('click', function (e) {
			$(this).parent().find('ul').first().toggle(300);
			$(this).parent().siblings().find('ul').hide(300);
		});
	}

	active_dropdown();

	$('.nav-sidebar > li .icon').each(function () {
		var $this = $(this);
		$this.on('click', function (e) {
			var has = $this.parent().hasClass('active');
			$('.nav-sidebar li').removeClass('active');
			if (has) {
				$this.parent().removeClass('active');
			} else {
				$this.parent().addClass('active');
			}
		});
	});

	// 12. Nice Select Js



	//variables
	var _window = $(window),
		_document = $(document),
		_body = $('body');

	//SMOOTHSCROLL
	var smoothScroll = function (e) {

		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			var $f = target.offset().top,
				$g = $f - 40,
				$y;

			if (target.length) {
				$('#section-featured_work').is(target) ? $y = $g : $y = $f;
				$('html, body').animate({
					scrollTop: $y
				}, 1000, 'easeInOutExpo');
				return !1
			}
		}
	};

	_document.on('click', '.page-scroll', smoothScroll);

	//scrollspy
	var _scrollSpy = function () {
		var hash = function (h) {
			if (history.pushState) {
				history.pushState(null, null, h);
			} else {
				location.hash = h;
			}
		};

		_document.on('click', 'a', function (event) {

			var _refVal = $(this).attr("href");

			if ($(this).attr('href') !== "#" && $(this).attr('href').indexOf("#") > -1 && $(_refVal).length) {
				event.preventDefault();
				$("html, body").animate({
					scrollTop: $(_refVal).offset().top - 120
				}, {
					duration: 700,
					easing: "easeInOutExpo",
					complete: hash(_refVal)
				});

				$("section").removeClass('active');
				$(_refVal).addClass('active');
			}
		});
	}

	var stickToTop = function () {
		var _sideNav = $('.sidebar-navigation'),
			_backToTop = $('.back-to-top');

		_window.on('scroll', function () {
			if (_window.scrollTop() > 200) {
				_sideNav.addClass('stick-to-top');
				_backToTop.addClass('show');
			} else {
				_sideNav.removeClass('stick-to-top');
				_backToTop.removeClass('show');
			}
		});
	}

	_document.on("keyup", ".search-input", function () {
		var value = $(this).val().toLowerCase();
		$(".sidebar-navigation ul *").filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});

	_body.scrollspy({
		target: '.nav',
		offset: 150
	})

	_document.on('click', '.toggle-navbar', function (e) {
		$('.sidebar-navigation').toggleClass('show');
	});

	_document.on('click', function (e) {
		if (!$('.sidebar-navigation *').is(e.target) && !$('.toggle-navbar *').is(e.target)) {
			$('.sidebar-navigation').removeClass('show');
		}
	});

	// _scrollSpy();
	// stickToTop();

})(window, document, jQuery);
$(function () {
	'use strict'

	// ______________LOADER
	$("#global-loader").fadeOut("slow");


	// This template is mobile first so active menu in navbar
	// has submenu displayed by default but not in desktop
	// so the code below will hide the active menu if it's in desktop
	if (window.matchMedia('(min-width: 992px)').matches) {
		$('.main-navbar .active').removeClass('show');
		$('.main-header-menu .active').removeClass('show');
	}
	// Shows header dropdown while hiding others
	$('.main-header .dropdown > a').on('click', function (e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
		$(this).find('.drop-flag').removeClass('show');
	});
	$('.country-flag1').on('click', function (e) {

		$(this).parent().toggleClass('show');
		$('.main-header .dropdown > a').parent().siblings().removeClass('show');
	});

	// ______________Full screen
	$(document).on("click", ".full-screen", function toggleFullScreen() {
		$('html').addClass('fullscreen-button');
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			$('html').removeClass('fullscreen-button');
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})


	// ______________Cover Image
	$(".cover-image").each(function () {
		var attr = $(this).attr('data-bs-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});


	// ______________Toast
	$(".toast").toast();

	/* Headerfixed */
	$(window).on("scroll", function (e) {
		if ($(window).scrollTop() >= 66) {
			$('main-header').addClass('fixed-header');
		}
		else {
			$('.main-header').removeClass('fixed-header');
		}
	});

	// ______________Search
	$('body, .main-header form[role="search"] button[type="reset"]').on('click keyup', function (event) {
		if (event.which == 27 && $('.main-header form[role="search"]').hasClass('active') ||
			$(event.currentTarget).attr('type') == 'reset') {
			closeSearch();
		}
	});
	function closeSearch() {
		var $form = $('.main-header form[role="search"].active')
		$form.find('input').val('');
		$form.removeClass('active');
	}
	// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
	$(document).on('click', '.main-header form[role="search"]:not(.active) button[type="submit"]', function (event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
			$input = $form.find('input');
		$form.addClass('active');
		$input.focus();
	});
	// if your form is ajax remember to call `closeSearch()` to close the search container
	$(document).on('click', '.main-header form[role="search"].active button[type="submit"]', function (event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
			$input = $form.find('input');
		$('#showSearchTerm').text($input.val());
		closeSearch()
	});



	/* ----------------------------------- */

	// Showing submenu in navbar while hiding previous open submenu
	$('.main-navbar .with-sub').on('click', function (e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	});
	// this will hide dropdown menu from open in mobile
	$('.dropdown-menu .main-header-arrow').on('click', function (e) {
		e.preventDefault();
		$(this).closest('.dropdown').removeClass('show');
	});
	// this will show navbar in left for mobile only
	$('#mainNavShow, #azNavbarShow').on('click', function (e) {
		e.preventDefault();
		$('body').addClass('main-navbar-show');
	});
	// this will hide currently open content of page
	// only works for mobile
	$('#mainContentLeftShow').on('click touch', function (e) {
		e.preventDefault();
		$('body').addClass('main-content-left-show');
	});
	// This will hide left content from showing up in mobile only
	$('#mainContentLeftHide').on('click touch', function (e) {
		e.preventDefault();
		$('body').removeClass('main-content-left-show');
	});
	// this will hide content body from showing up in mobile only
	$('#mainContentBodyHide').on('click touch', function (e) {
		e.preventDefault();
		$('body').removeClass('main-content-body-show');
	})
	// navbar backdrop for mobile only
	$('body').append('<div class="main-navbar-backdrop"></div>');
	$('.main-navbar-backdrop').on('click touchstart', function () {
		$('body').removeClass('main-navbar-show');
	});
	// Close dropdown menu of header menu
	$(document).on('click touchstart', function (e) {
		e.stopPropagation();
		// closing of dropdown menu in header when clicking outside of it
		var dropTarg = $(e.target).closest('.main-header .dropdown').length;
		if (!dropTarg) {
			$('.main-header .dropdown').removeClass('show');
		}
		// closing nav sub menu of header when clicking outside of it
		if (window.matchMedia('(min-width: 992px)').matches) {
			// Navbar
			var navTarg = $(e.target).closest('.main-navbar .nav-item').length;
			if (!navTarg) {
				$('.main-navbar .show').removeClass('show');
			}
			// Header Menu
			var menuTarg = $(e.target).closest('.main-header-menu .nav-item').length;
			if (!menuTarg) {
				$('.main-header-menu .show').removeClass('show');
			}
			if ($(e.target).hasClass('main-menu-sub-mega')) {
				$('.main-header-menu .show').removeClass('show');
			}
		} else {
			//
			if (!$(e.target).closest('#mainMenuShow').length) {
				var hm = $(e.target).closest('.main-header-menu').length;
				if (!hm) {
					$('body').removeClass('main-header-menu-show');
				}
			}
		}
	});
	$('#mainMenuShow').on('click', function (e) {
		e.preventDefault();
		$('body').toggleClass('main-header-menu-show');
	})
	$('.main-header-menu .with-sub').on('click', function (e) {
		e.preventDefault();
		$(this).parent().toggleClass('show');
		$(this).parent().siblings().removeClass('show');
	})
	$('.main-header-menu-header .close').on('click', function (e) {
		e.preventDefault();
		$('body').removeClass('main-header-menu-show');
	})

	$(".card-header-right .card-option .fe fe-chevron-left").on("click", function () {
		var a = $(this);
		if (a.hasClass("icofont-simple-right")) {
			a.parents(".card-option").animate({
				width: "35px",
			})
		} else {
			a.parents(".card-option").animate({
				width: "180px",
			})
		}
		$(this).toggleClass("fe fe-chevron-right").fadeIn("slow")
	});

	// ___________TOOLTIP
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})


	// __________POPOVER
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	})


	// Enable Eva-icons with SVG markup
	eva.replace();


	// ______________Horizontal-menu Active Class
	$(document).ready(function () {
		$(".horizontalMenu-list li a").each(function () {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});


	// ______________Active Class
	$(document).ready(function () {
		$(".horizontalMenu-list li a").each(function () {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontal-megamenu li a").each(function () {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontalMenu-list .sub-menu .sub-menu li a").each(function () {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});


	// ______________ Back to Top

	var btn = $('#back-to-top');

	$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			$('#back-to-top').fadeIn();
		} else {
			$('#back-to-top').fadeOut();
		}
	});

	btn.on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, '300');
	});


	$('.layout-setting').on("click", function (e) {
		if (document) {
			$('body').toggleClass('dark-theme');
			$('body').removeClass('transparent-theme');
		} else {
			$('body').removeClass('dark-theme');
			$('body').removeClass('transparent-theme');
			$('body').addClass('light-theme');
		}
	});



	$('.default-menu').on('click', function () {
		var ww = document.body.clientWidth;
		if (ww >= 992) {
			$('body').removeClass('sidenav-toggled');
		}
	});


	// ______________ SWITCHER-toggle ______________//

	//---skin modes-----//
	// $('body').addClass('body-style1');
	//---skin modes-----//

	/*--- Left-menu Image-1 --*/
	// $('body').addClass('leftbgimage1');
	/*--- Left-menu Image-1 --*/

	/*--- Left-menu Image-2 --*/
	// $('body').addClass('leftbgimage2');
	/*--- Left-menu Image-2 --*/

	/*--- Left-menu Image-3 --*/
	// $('body').addClass('leftbgimage3');
	/*--- Left-menu Image-3 --*/

	/*--- Left-menu Image-4 --*/
	// $('body').addClass('leftbgimage4');
	/*--- Left-menu Image-4 --*/

	/*--- Left-menu Image-5 --*/
	// $('body').addClass('leftbgimage5');
	/*--- Left-menu Image-5 --*/



	/*---Light Layout Start --*/
	// $('body').addClass('light-theme');
	/*--- Light Layout End --*/

	/*--- Dark Layout Start --*/
	// $('body').addClass('dark-theme');
	/*--- Dark Layout End --*/

	/*--- Transparent Layout Start --*/
	// $('body').addClass('transparent-theme');
	/*--- Transparent Layout End --*/

	/*--- Transparent Bg-Image Style Start --*/

	/*Transparent image1 Layout Start*/
	// $('body').addClass('bg-img1');
	// $('body').addClass('transparent-theme');
	/*Transparent image1 Layout End*/

	/*Transparent image2 Layout Start*/
	// $('body').addClass('bg-img2');
	// $('body').addClass('transparent-theme');
	/*Transparent image2 Layout End*/

	/*Transparent image3 Layout Start*/
	// $('body').addClass('bg-img3');
	// $('body').addClass('transparent-theme');
	/*Transparent image3 Layout End*/

	/*Transparent image4 Layout Start*/
	// $('body').addClass('bg-img4');
	// $('body').addClass('transparent-theme');
	/*Transparent image4 Layout End*/

	/*--- Transparent Bg-Image Style End --*/

	/*--- Light Menu Start --*/
	// $('body').addClass('light-menu');
	/*--- Light Menu End --*/

	/*--- Color Menu Start --*/
	// $('body').addClass('color-menu');
	/*--- Color Menu End --*/

	/*--- Dark Menu Start --*/
	// $('body').addClass('dark-menu');
	/*--- Dark Menu End --*/

	/*--- Gradient Menu Start --*/
	// $('body').addClass('gradient-menu');
	/*--- Gradient Menu End --*/

	/*--- Light Header Start --*/
	// $('body').addClass('light-header');
	/*--- Light Header End --*/

	/*--- Color Header Start --*/
	// $('body').addClass('color-header');
	/*--- Color Header End --*/

	/*--- Dark Header Start --*/
	// $('body').addClass('dark-header');
	/*--- Dark Header End --*/

	/*--- Gradient Header Start --*/
	// $('body').addClass('gradient-header');
	/*--- Gradient Header End --*/

	/*---  Boxed Layout Start --*/
	// $('body').addClass('layout-boxed');
	// if (document.querySelector('body').classList.contains('horizontal')) {
	// 	checkHoriMenu();
	// }
	/*---  Boxed Layout End --*/

	/*--- Header-Position Styles Start --*/
	// $('body').addClass('scrollable-layout');
	/*--- Header-Position Styles End --*/


	/*--- Default Sidemenu Start --*/
	// $('body').addClass('default-menu');
	// if(!document.querySelector('.default-menu').classList.contains('error-page1')){
	// 	hovermenu();
	// }
	/*--- Default Sidemenu End --*/

	/*Closed Sidemenu Start*/
	// $('body').addClass('closed-menu');
	// $('body').addClass('sidenav-toggled');
	// if(!document.querySelector('.closed-menu').classList.contains('error-page1')){
	// hovermenu();}
	/*Closed Sidemenu End*/


	/*Icon Text Sidemenu Start*/
	// $('body').addClass('icontext-menu');
	// $('body').addClass('sidenav-toggled');
	// if(!document.querySelector('.icontext-menu').classList.contains('error-page1')){
	// icontext();}
	/*Icon Text Sidemenu End*/

	/*Side icon menu Start*/
	// $('body').addClass('sideicon-menu');
	// $('body').addClass('sidenav-toggled');
	// if(!document.querySelector('.sideicon-menu').classList.contains('error-page1') ){
	//hovermenu();}
	/*Side icon menu End*/

	/*hover submenu start*/
	// $('body').addClass('hover-submenu');
	// $('body').addClass('sidenav-toggled');
	// if(!document.querySelector('.hover-submenu').classList.contains('error-page1') ){
	//hovermenu();}
	/*hover submenu end*/

	/*hover submenu style1 start*/
	// $('body').addClass('hover-submenu1');
	// $('body').addClass('sidenav-toggled');
	// if(!document.querySelector('.hover-submenu1').classList.contains('error-page1') ){
	//hovermenu();}
	/*hover submenu style1 end*/

	/*Horizontal start*/
	// $('body').addClass('horizontal');
	// if (!document.querySelector('.horizontal').classList.contains('error-page1')) {
	// 	document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
	// 	menuClick();
	// 	responsive();
	// 	$(".main-container").removeClass("container-fluid");
	// 	$(".main-container").addClass("container");
	// } else {
	// 	$(".main-container").addClass("container-fluid");
	// 	$(".main-container").removeClass("container");
	// }
	/*Horizontal end*/

	/*Horizontal-hover start*/
	// $('body').addClass('horizontal-hover');
	// if (!document.querySelector('.horizontal-hover').classList.contains('error-page1')) {
	// 	document.querySelector('.horizontal-hover .side-menu').style.flexWrap = 'nowrap'
	// 	HorizontalHovermenu();
	// 	responsive();
	// 	$(".main-container").removeClass("container-fluid");
	// 	$(".main-container").addClass("container");
	// } else {
	// 	$(".main-container").addClass("container-fluid");
	// 	$(".main-container").removeClass("container");
	// }
	/*Horizontal-hover end*/

	/*RTL Layout Style*/
	// $('body').addClass('rtl');
	/*RTL Layout Style End*/

	/*****Horizontal-styles Start*****/
	// $('body').addClass('centerlogo-horizontal');
	/*****Horizontal-styles Start*****/

	// For RTL //
	let bodyRtl = $('body').hasClass('rtl');
	if (bodyRtl) {
		$('body').addClass('rtl');
		$('body').removeClass('ltr');
		$("html[lang=en]").attr("dir", "rtl");
		$(".select2-container").attr("dir", "rtl");
		$("head link#style").attr("href", $(this));
		(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));

		var carousel = $('.owl-carousel');
		$.each(carousel, function (index, element) {
			// element == this
			var carouselData = $(element).data('owl.carousel');
			carouselData.settings.rtl = true; //don't know if both are necessary
			carouselData.options.rtl = true;
			$(element).trigger('refresh.owl.carousel');
		});

		if (document.querySelector('body').classList.contains('horizontal')) {
			checkHoriMenu();
		}
		$(".fc-theme-standard ").addClass("fc-direction-rtl");
		$(".fc-theme-standard ").removeClass("fc-direction-ltr");
		$(".fc-header-toolbar ").addClass("fc-toolbar-rtl");
		$(".fc-header-toolbar ").removeClass("fc-toolbar-ltr");
	}
	else {
		$('body').removeClass('rtl');
		$("head link#style").attr("href", $(this));
		(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
	};
	// For RTL //	
	// For Horizontal //	
	let bodyhorizontal = $('body').hasClass('horizontal');
	if (bodyhorizontal) {
		ActiveSubmenu();
		if (window.innerWidth >= 992) {
			let li = document.querySelectorAll('.side-menu li')
			li.forEach((e, i) => {
				e.classList.remove('is-expanded')
			})
			var animationSpeed = 300;
			// first level
			var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
			var ul = parent.find('ul:visible').slideUp(animationSpeed);
			ul.removeClass('open');
			var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
			var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
			ul1.removeClass('open');
		}
		$('body').addClass('horizontal');
		$(".main-content").addClass("horizontal-content");
		$(".main-content").removeClass("app-content");
		// $(".main-container").addClass("container");
		// $(".main-container").removeClass("container-fluid");
		$(".main-header").addClass("hor-header");
		$(".main-header").removeClass("side-header");
		$(".app-sidebar").addClass("horizontal-main")
		$(".main-sidemenu").addClass("container")
		$('body').removeClass('sidebar-mini');
		$('body').removeClass('sidenav-toggled');
		$('body').removeClass('horizontal-hover');
		$('body').removeClass('closed-menu');
		$('body').removeClass('hover-submenu');
		$('body').removeClass('hover-submenu1');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		$('#slide-left').removeClass('d-none');
		$('#slide-right').removeClass('d-none');
		if (document.querySelector('body').classList.contains('horizontal') && !document.querySelector('body').classList.contains('error-page1')) {
			checkHoriMenu();
		}
		if (!document.querySelector('.horizontal').classList.contains('error-page1')) {
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
		}
	}
	else {

	};
	// For Horizontal //	

	// For Horizontal Hover //
	let bodyhorizontalhover = $('body').hasClass('horizontal-hover');
	if (bodyhorizontalhover) {
		let li = document.querySelectorAll('.side-menu li')
		li.forEach((e, i) => {
			e.classList.remove('is-expanded')
		})
		var animationSpeed = 300;
		// first level
		var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
		var ul = parent.find('ul:visible').slideUp(animationSpeed);
		ul.removeClass('open');
		var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
		var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
		ul1.removeClass('open');
		let subNavSub = document.querySelectorAll('.sub-slide-menu');
		subNavSub.forEach((e) => {
			e.style.display = '';
		})
		let subNav = document.querySelectorAll('.slide-menu')
		subNav.forEach((e) => {
			e.style.display = '';
		})
		$('body').addClass('horizontal');
		$('#slide-left').addClass('d-none');
		$('#slide-right').addClass('d-none');
		$(".main-content").addClass("horizontal-content");
		$(".main-content").removeClass("app-content");
		$(".main-header").addClass("hor-header");
		$(".main-header").removeClass("side-header");
		$(".app-sidebar").addClass("horizontal-main")
		$(".main-sidemenu").addClass("container")
		$('body').removeClass('sidebar-mini');
		$('body').removeClass('sidenav-toggled');
		$('body').removeClass('closed-menu');
		$('body').removeClass('hover-submenu');
		$('body').removeClass('hover-submenu1');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		if (document.querySelector('body').classList.contains('horizontal') && !document.querySelector('body').classList.contains('error-page1')) {
			checkHoriMenu();
		}
		if (!document.querySelector('.horizontal-hover').classList.contains('error-page1')) {
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
		}
	}
	else {

	};
	// For Horizontal Hover //	
});


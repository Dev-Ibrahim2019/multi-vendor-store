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




	// ______________ SWITCHER-toggle ______________//

	//---skin modes-----//
	$(document).on("click", '#myonoffswitch06', function () {
		if (this.checked) {
			$('body').addClass('body-style1');
			$('body').removeClass('body-default');
		}
	});

	$(document).on("click", '#myonoffswitch07', function () {
		if (this.checked) {
			$('body').removeClass('body-style1');
		}
	});
	//---skin modes-----//

	/*--- Left-menu Image --*/
	$('#leftmenuimage1').on('click', function () {
		$('body').removeClass('leftbgimage2');
		$('body').removeClass('leftbgimage3');
		$('body').removeClass('leftbgimage4');
		$('body').removeClass('leftbgimage5');
		$('body').addClass('leftbgimage1');
		return false;
	});

	$('#leftmenuimage2').on('click', function () {
		$('body').removeClass('leftbgimage1');
		$('body').removeClass('leftbgimage3');
		$('body').removeClass('leftbgimage4');
		$('body').removeClass('leftbgimage5');
		$('body').addClass('leftbgimage2');
		return false;
	});

	$('#leftmenuimage3').on('click', function () {
		$('body').removeClass('leftbgimage1');
		$('body').removeClass('leftbgimage2');
		$('body').removeClass('leftbgimage4');
		$('body').removeClass('leftbgimage5');
		$('body').addClass('leftbgimage3');
		return false;
	});

	$('#leftmenuimage4').on('click', function () {
		$('body').removeClass('leftbgimage1');
		$('body').removeClass('leftbgimage2');
		$('body').removeClass('leftbgimage3');
		$('body').removeClass('leftbgimage5');
		$('body').addClass('leftbgimage4');
		return false;
	});

	$('#leftmenuimage5').on('click', function () {
		$('body').removeClass('leftbgimage1');
		$('body').removeClass('leftbgimage2');
		$('body').removeClass('leftbgimage3');
		$('body').removeClass('leftbgimage4');
		$('body').addClass('leftbgimage5');
		return false;
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


	/*Light Layout Start*/

	$(document).on("click", '#myonoffswitch1', function () {
		if (this.checked) {
			$('body').addClass('light-theme');
			$('#myonoffswitch3').prop('checked', true);
			$('#myonoffswitch6').prop('checked', true);
			$('body').removeClass('dark-theme');
			$('body').removeClass('transparent-theme');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-theme');
			$('body').removeClass('color-header');
			$('body').removeClass('dark-header');
			$('body').removeClass('dark-menu');
			$('body').removeClass('gradient-menu');
			$('body').removeClass('gradient-header');
			$('body').removeClass('color-menu');
			localStorage.removeItem('valexdarkPrimary')

			// remove light theme properties
			localStorage.removeItem('valexprimaryColor')
			localStorage.removeItem('valexprimaryHoverColor')
			localStorage.removeItem('valexprimaryBorderColor')
			localStorage.removeItem('valextransparentBgImgPrimary')
			localStorage.removeItem('valextransparentBgImgprimaryTransparent')
			document.querySelector('html')?.style.removeProperty('--primary-bg-color', localStorage.darkPrimary);
			document.querySelector('html')?.style.removeProperty('--primary-bg-hover', localStorage.darkPrimary);
			document.querySelector('html')?.style.removeProperty('--primary-bg-border', localStorage.darkPrimary);
			document.querySelector('html')?.style.removeProperty('--dark-primary', localStorage.darkPrimary);

			// removing dark theme properties
			localStorage.removeItem('valexdarkPrimary')
			localStorage.removeItem('valexdarkprimaryTransparent');
			localStorage.removeItem('valextransparentBgColor');
			localStorage.removeItem('valextransparentThemeColor');
			localStorage.removeItem('valextransparentPrimary');

			$('#myonoffswitch5').prop('checked', false);
			$('#myonoffswitch8').prop('checked', false);
			$('#myonoffswitchTransparent').prop('checked', false);

			checkOptions();
			const root = document.querySelector(':root');
			root.style = "";
			names()
		} else {
			$('body').removeClass('light-theme');
			localStorage.removeItem("valexlight-theme");
		}
		localStorageBackup();
	});

	/*Light Layout End*/

	/*Dark Layout Start*/

	$(document).on("click", '#myonoffswitch2', function () {
		if (this.checked) {
			$('body').addClass('dark-theme');
			$('#myonoffswitch5').prop('checked', true);
			$('#myonoffswitch8').prop('checked', true);
			$('body').removeClass('light-theme');
			$('body').removeClass('transparent-theme');
			$('body').removeClass('light-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('gradient-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');


			// remove light theme properties
			localStorage.removeItem('valexprimaryColor')
			localStorage.removeItem('valexprimaryHoverColor')
			localStorage.removeItem('valexprimaryBorderColor')
			localStorage.removeItem('valexdarkPrimary')
			localStorage.removeItem('valextransparentBgImgPrimary')
			localStorage.removeItem('valextransparentBgImgprimaryTransparent')
			document.querySelector('html')?.style.removeProperty('--primary-bg-color', localStorage.darkPrimary);
			document.querySelector('html')?.style.removeProperty('--primary-bg-hover', localStorage.darkPrimary);
			document.querySelector('html')?.style.removeProperty('--primary-bg-border', localStorage.darkPrimary);
			document.querySelector('html')?.style.removeProperty('--dark-primary', localStorage.darkPrimary);

			// removing light theme data 
			localStorage.removeItem('valexprimaryColor')
			localStorage.removeItem('valexprimaryHoverColor')
			localStorage.removeItem('valexprimaryBorderColor')
			localStorage.removeItem('valexprimaryTransparent');

			localStorage.removeItem('valextransparentBgColor');
			localStorage.removeItem('valextransparentThemeColor');
			localStorage.removeItem('valextransparentPrimary');

			$('#myonoffswitch3').prop('checked', false);
			$('#myonoffswitch6').prop('checked', false);
			$('#myonoffswitchTransparent').prop('checked', false);
			//
			checkOptions();

			const root = document.querySelector(':root');
			root.style = "";
			names()
		} else {
			$('body').removeClass('dark-theme');
			localStorage.removeItem("valexdark-theme");
		}
		localStorageBackup()
	});

	/*Dark Layout End*/


	/*Transparent Layout Start*/

	$(document).on("click", '#myonoffswitchTransparent', function () {
		if (this.checked) {
			$('body').addClass('transparent-theme');
			$('#myonoffswitch3').prop('checked', false);
			$('#myonoffswitch6').prop('checked', false);
			$('#myonoffswitch5').prop('checked', false);
			$('#myonoffswitch8').prop('checked', false);
			$('body').removeClass('dark-theme');
			$('body').removeClass('light-theme');
			// remove light theme properties
			localStorage.removeItem('valexprimaryColor')
			localStorage.removeItem('valexprimaryHoverColor')
			localStorage.removeItem('valexprimaryBorderColor')

			// reseting the menu and header switcher

			document.querySelector('.lightMenu')?.classList.remove('d-none')
			document.querySelector('.lightMenu')?.classList.add('d-flex')
			document.querySelector('.lightHeader')?.classList.remove('d-none')
			document.querySelector('.lightHeader')?.classList.add('d-flex')

			document.querySelector('.darkMenu')?.classList.remove('d-none')
			document.querySelector('.darkMenu')?.classList.add('d-flex')
			document.querySelector('.darkHeader')?.classList.remove('d-none')
			document.querySelector('.darkHeader')?.classList.add('d-flex')

			// removing light theme data 
			localStorage.removeItem('valexdarkPrimary');
			localStorage.removeItem('valexprimaryColor')
			localStorage.removeItem('valexprimaryHoverColor')
			localStorage.removeItem('valexprimaryBorderColor')
			localStorage.removeItem('valexprimaryTransparent');
			localStorage.removeItem('valextransparentPrimary');
			localStorage.removeItem('valexdarkprimaryTransparent');
			localStorage.removeItem('valextransparentBgImgPrimary')
			localStorage.removeItem('valextransparentBgImgprimaryTransparent')

			$('#myonoffswitch2').prop('checked', false);
			$('#myonoffswitch1').prop('checked', false);
			$('#myonoffswitchTransparent').prop('checked', true);
			//
			checkOptions();
			removeForTransparent();
			const root = document.querySelector(':root');
			root.style = "";
			names()
		} else {
			$('body').removeClass('transparent-theme');
			localStorage.removeItem("valextransparent-theme");
		}
		localStorageBackup()
		$('body').removeClass('bg-img1');
		$('body').removeClass('bg-img2');
		$('body').removeClass('bg-img3');
		$('body').removeClass('bg-img4');
	});

	/*Transparent Layout End*/

	/*Transparent Bg-Image Style Start*/
	$(document).on("click", '#bgimage1', function () {
		$('body').addClass('bg-img1');
		$('body').removeClass('bg-img2');
		$('body').removeClass('bg-img3');
		$('body').removeClass('bg-img4');
		$('body').removeClass('light-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('dark-header');
		$('body').removeClass('color-header');
		$('body').removeClass('light-header');
		$('body').removeClass('gradient-header');

		document.querySelector('body').classList.add('transparent-theme');
		document.querySelector('body')?.classList.remove('light-theme');
		document.querySelector('body')?.classList.remove('dark-theme');

		$('#myonoffswitch2').prop('checked', false);
		$('#myonoffswitch1').prop('checked', false);
		$('#myonoffswitchTransparent').prop('checked', true);
		checkOptions();
		removeForTransparent();
	})

	$(document).on("click", '#bgimage2', function () {
		$('body').addClass('bg-img2');
		$('body').removeClass('bg-img1');
		$('body').removeClass('bg-img3');
		$('body').removeClass('bg-img4');
		$('body').removeClass('light-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('dark-header');
		$('body').removeClass('color-header');
		$('body').removeClass('light-header');
		$('body').removeClass('gradient-header');

		document.querySelector('body').classList.add('transparent-theme');
		document.querySelector('body')?.classList.remove('light-theme');
		document.querySelector('body')?.classList.remove('dark-theme');

		$('#myonoffswitch2').prop('checked', false);
		$('#myonoffswitch1').prop('checked', false);
		$('#myonoffswitchTransparent').prop('checked', true);
		checkOptions();
		removeForTransparent();
	})

	$(document).on("click", '#bgimage3', function () {
		$('body').addClass('bg-img3');
		$('body').removeClass('bg-img1');
		$('body').removeClass('bg-img2');
		$('body').removeClass('bg-img4');
		$('body').removeClass('light-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('dark-header');
		$('body').removeClass('color-header');
		$('body').removeClass('light-header');
		$('body').removeClass('gradient-header');

		document.querySelector('body').classList.add('transparent-theme');
		document.querySelector('body')?.classList.remove('light-theme');
		document.querySelector('body')?.classList.remove('dark-theme');

		$('#myonoffswitch2').prop('checked', false);
		$('#myonoffswitch1').prop('checked', false);
		$('#myonoffswitchTransparent').prop('checked', true);
		checkOptions();
		removeForTransparent();
	})

	$(document).on("click", '#bgimage4', function () {
		$('body').addClass('bg-img4');
		$('body').removeClass('bg-img1');
		$('body').removeClass('bg-img2');
		$('body').removeClass('bg-img3');
		$('body').removeClass('light-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('dark-header');
		$('body').removeClass('color-header');
		$('body').removeClass('light-header');
		$('body').removeClass('gradient-header');

		document.querySelector('body').classList.add('transparent-theme');
		document.querySelector('body')?.classList.remove('light-theme');
		document.querySelector('body')?.classList.remove('dark-theme');
		$('#myonoffswitch2').prop('checked', false);
		$('#myonoffswitch1').prop('checked', false);
		$('#myonoffswitchTransparent').prop('checked', true);
		checkOptions();
		removeForTransparent();
	})
	/*Transparent Bg-Image Style End*/

	/*Light Menu Start*/
	$(document).on("click", '#myonoffswitch3', function () {
		if (this.checked) {
			$('body').addClass('light-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('gradient-menu');
		}
	});
	/*Light Menu End*/

	/*Color Menu Start*/
	$(document).on("click", '#myonoffswitch4', function () {
		if (this.checked) {
			$('body').addClass('color-menu');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('gradient-menu');
		}
	});
	/*Color Menu End*/

	/*Dark Menu Start*/
	$(document).on("click", '#myonoffswitch5', function () {
		if (this.checked) {
			$('body').addClass('dark-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('light-menu');
			$('body').removeClass('gradient-menu');
		}
	});
	/*Dark Menu End*/

	/*Gradient Menu Start*/
	$(document).on("click", '#myonoffswitch25', function () {
		if (this.checked) {
			$('body').addClass('gradient-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-menu');
		} 
	});
	/*Gradient Menu End*/

	/*Light Header Start*/
	$(document).on("click", '#myonoffswitch6', function () {
		if (this.checked) {
			$('body').addClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('dark-header');
			$('body').removeClass('gradient-header');
		} 
	});
	/*Light Header End*/

	/*Color Header Start*/
	$(document).on("click", '#myonoffswitch7', function () {
		if (this.checked) {
			$('body').addClass('color-header');
			$('body').removeClass('light-header');
			$('body').removeClass('dark-header');
			$('body').removeClass('gradient-header');
		}
	});
	/*Color Header End*/

	/*Dark Header Start*/
	$(document).on("click", '#myonoffswitch8', function () {
		if (this.checked) {
			$('body').addClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');
			$('body').removeClass('gradient-header');
		}
	});
	/*Dark Header End*/

	/*Gradient Header Start*/
	$(document).on("click", '#myonoffswitch26', function () {
		if (this.checked) {
			$('body').addClass('gradient-header');
			$('body').removeClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');
		}
	});
	/*Gradient Header End*/

	/*Full Width Layout Start*/
	$(document).on("click", '#myonoffswitch9', function () {
		if (this.checked) {
			$('body').addClass('layout-fullwidth');
			if (document.querySelector('body').classList.contains('horizontal')) {
				checkHoriMenu();
			}
			$('body').removeClass('layout-boxed');
		}
	});
	/*Full Width Layout End*/

	/*Boxed Layout Start*/
	$(document).on("click", '#myonoffswitch10', function () {
		if (this.checked) {
			$('body').addClass('layout-boxed');
			if (document.querySelector('body').classList.contains('horizontal')) {
				checkHoriMenu();
			}
			$('body').removeClass('layout-fullwidth');
		}
	});
	/*Boxed Layout End*/

	/*Header-Position Styles Start*/
	$(document).on("click", '#myonoffswitch11', function () {
		if (this.checked) {
			$('body').addClass('fixed-layout');
			$('body').removeClass('scrollable-layout');
		}
	});
	$(document).on("click", '#myonoffswitch12', function () {
		if (this.checked) {
			$('body').addClass('scrollable-layout');
			$('body').removeClass('fixed-layout');
		}
	});
	/*Header-Position Styles End*/


	/*Default Sidemenu Start*/
	$(document).on("click", '#myonoffswitch13', function () {
		if (this.checked) {
			$('body').addClass('default-menu');
			hovermenu();
			$('body').removeClass('closed-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
		}
	});
	/*Default Sidemenu End*/


	/*Closed Sidemenu Start*/
	$(document).on("click", '#myonoffswitch30', function () {
		if (this.checked) {
			$('body').addClass('closed-menu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
		} 
	});
	/*Closed Sidemenu End*/


	/*Hover Submenu Start*/
	$(document).on("click", '#myonoffswitch32', function () {
		if (this.checked) {
			$('body').addClass('hover-submenu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu1');
		}
	});
	/*Hover Submenu End*/

	/*Hover Submenu 1 Start*/
	$(document).on("click", '#myonoffswitch33', function () {
		if (this.checked) {
			$('body').addClass('hover-submenu1');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
		}
	});
	/*Hover Submenu 1 End*/


	/*Icon Text Sidemenu Start*/
	$(document).on("click", '#myonoffswitch14', function () {
		if (this.checked) {
			$('body').addClass('icontext-menu');
			icontext();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');

		}
	});
	/*Icon Text Sidemenu End*/

	/*Icon Overlay Sidemenu Start*/
	$(document).on("click", '#myonoffswitch15', function () {
		if (this.checked) {
			$('body').addClass('sideicon-menu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
		}
	});
	/*Icon Overlay Sidemenu End*/

	/* Sidemenu start*/
	$(document).on("click", '#myonoffswitch34', function () {
		if (this.checked) {
			$('body').removeClass('horizontal');
			$('body').removeClass('horizontal-hover');
			$(".main-content").removeClass("horizontal-content");
			$(".main-content").addClass("app-content");
			$(".main-container").removeClass("container");
			$(".main-container").addClass("container-fluid");
			$(".main-header").removeClass("hor-header");
			$(".main-header").addClass("side-header");
			$(".app-sidebar").removeClass("horizontal-main")
			$(".main-sidemenu").removeClass("container")
			$('#slide-left').removeClass('d-none');
			$('#slide-right').removeClass('d-none');
			$('body').addClass('sidebar-mini');
			localStorage.setItem("valexvertical", true);
			localStorage.removeItem("valexhorizontal");
			localStorage.removeItem("valexhorizontalHover");
			menuClick();
			if (document.querySelector('body').classList.contains('horizontal')) {
				checkHoriMenu();
			}
			responsive();
		} else {
			$('body').removeClass('sidebar-mini');
			localStorage.setItem("valexsidebar-mini", "False");
		}
	});

	/* Sidemenu end*/


	/* horizontal click start*/

	$(document).on("click", '#myonoffswitch35', function () {
		if (this.checked) {
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
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
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
			localStorage.setItem("valexhorizontal", true);
			localStorage.removeItem("valexhorizontalHover");
			localStorage.removeItem("valexvertical");
			// $('#slide-left').removeClass('d-none');
			// $('#slide-right').removeClass('d-none');
			document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
			menuClick();
			if (document.querySelector('body').classList.contains('horizontal')) {
				checkHoriMenu();
			}
			responsive();
		}
	});

	/* horizontal click end*/

	/* horizontal hover start*/

	$(document).on("click", '#myonoffswitch111', function () {
		if (this.checked) {
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
			$('body').addClass('horizontal-hover');
			$('body').addClass('horizontal');
			let subNavSub = document.querySelectorAll('.sub-slide-menu');
			subNavSub.forEach((e) => {
				e.style.display = '';
			})
			let subNav = document.querySelectorAll('.slide-menu')
			subNav.forEach((e) => {
				e.style.display = '';
			})
			// $('#slide-left').addClass('d-none');
			// $('#slide-right').addClass('d-none');
			document.querySelector('.horizontal .side-menu').style.flexWrap = 'nowrap'
			$(".main-content").addClass("horizontal-content");
			$(".main-content").removeClass("app-content");
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
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
			localStorage.setItem("valexhorizontalHover", true);
			localStorage.removeItem("valexhorizontal");
			localStorage.removeItem("valexvertical");
			HorizontalHovermenu();
			if (document.querySelector('body').classList.contains('horizontal')) {
				checkHoriMenu();
			}
			responsive();
		}
	});
	/* horizontal hover end*/

	$(document).on("click", '#myonoffswitch55', function () {
		if (this.checked) {
			$('body').addClass('rtl');
			$('body').removeClass('ltr');
			$("html[lang=en]").attr("dir", "rtl");
			$(".select2-container").attr("dir", "rtl");
			localStorage.setItem("valexrtl", true);
			localStorage.removeItem("valexltr");
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
		}
	});

	$(document).on("click", '#myonoffswitch54', function () {

		if (this.checked) {
			$('body').addClass('ltr');
			$('body').removeClass('rtl');
			$("html[lang=en]").attr("dir", "ltr");
			$(".select2-container").attr("dir", "ltr");
			localStorage.setItem("valexltr", true);
			localStorage.removeItem("valexrtl");
			$("head link#style").attr("href", $(this));
			(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
			var carousel = $('.owl-carousel');
			$.each(carousel, function (index, element) {
				// element == this
				var carouselData = $(element).data('owl.carousel');
				carouselData.settings.rtl = false; //don't know if both are necessary
				carouselData.options.rtl = false;
				$(element).trigger('refresh.owl.carousel');
				if (document.querySelector('body').classList.contains('horizontal')) {
					checkHoriMenu();
				}
			});
		} else {
			$('body').removeClass('ltr');
			$('body').addClass('rtl');
			$(".select2-container").attr("dir", "rtl");
			localStorage.setItem("valexltr", "false");
			$("head link#style").attr("href", $(this));
			(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));
		}
	});

	/*****Horizontal-styles Start*****/
	$('#myonoffswitch03').click(function () {
		if (this.checked) {
			$('body').addClass('default-horizontal');
			$('body').removeClass('centerlogo-horizontal');
			localStorage.setItem("valexdefault-horizontal", "True");
		} else {
			$('body').removeClass('default-horizontal');
			localStorage.setItem("valexdefault-horizontal", "false");
		}
	});
	$('#myonoffswitch04').click(function () {
		if (this.checked) {
			$('body').addClass('centerlogo-horizontal');
			$('body').removeClass('default-horizontal');
			localStorage.setItem("valexcenterlogo-horizontal", "True");
		} else {
			$('body').removeClass('centerlogo-horizontal');
			localStorage.setItem("valexcenterlogo-horizontal", "false");
		}
	});
	/*****Horizontal-styles Start*****/
});

function resetData() {
	'use strict'
	$('#myonoffswitch3').prop('checked', true);
	$('#myonoffswitch1').prop('checked', true);
	$('#myonoffswitch6').prop('checked', true);
	$('#myonoffswitch9').prop('checked', true);
	$('#myonoffswitch11').prop('checked', true);
	$('#myonoffswitch13').prop('checked', true);
	$('#myonoffswitch07').prop('checked', true);
	$('#myonoffswitch03').prop('checked', true);
	$('body')?.removeClass('bg-img4');
	$('body')?.removeClass('bg-img1');
	$('body')?.removeClass('bg-img2');
	$('body')?.removeClass('bg-img3');
	$('body')?.removeClass('transparent-theme');
	$('body')?.removeClass('dark-theme');
	$('body')?.removeClass('dark-menu');
	$('body')?.removeClass('light-menu');
	$('body')?.removeClass('color-menu');
	$('body')?.removeClass('gradient-menu');
	$('body')?.removeClass('dark-header');
	$('body')?.removeClass('gradient-header');
	$('body')?.removeClass('light-header');
	$('body')?.removeClass('color-header');
	$('body')?.removeClass('layout-boxed');
	$('body')?.removeClass('icontext-menu');
	$('body')?.removeClass('sideicon-menu');
	$('body')?.removeClass('closed-menu');
	$('body')?.removeClass('hover-submenu');
	$('body')?.removeClass('hover-submenu1');
	$('body')?.removeClass('scrollable-layout');
	$('body')?.removeClass('sidenav-toggled');
	$('body')?.removeClass('leftbgimage1');
	$('body')?.removeClass('leftbgimage2');
	$('body')?.removeClass('leftbgimage3');
	$('body')?.removeClass('leftbgimage4');
	$('body')?.removeClass('leftbgimage5');
	$('body')?.removeClass('centerlogo-horizontal');


	$('body').removeClass('horizontal');
	$('body').removeClass('horizontal-hover');
	$(".main-content").removeClass("horizontal-content");
	$(".main-content").addClass("app-content");
	$(".main-container").removeClass("container");
	$(".main-container").addClass("container-fluid");
	$(".main-header").removeClass("hor-header");
	$(".main-header").addClass("side-header");
	$(".app-sidebar").removeClass("horizontal-main")
	$(".main-sidemenu").removeClass("container")
	$('#slide-left').removeClass('d-none');
	$('#slide-right').removeClass('d-none');
	$('body').addClass('sidebar-mini');
	localStorage.setItem("valexvertical", true);
	localStorage.removeItem("valexhorizontal");
	localStorage.removeItem("valexhorizontalHover");
	menuClick();
	if (document.querySelector('body').classList.contains('horizontal')) {
		checkHoriMenu();
	}
	responsive();

	$('body').addClass('ltr');
	$('body').removeClass('rtl');
	$("html[lang=en]").attr("dir", "ltr");
	$(".select2-container").attr("dir", "ltr");
	localStorage.setItem("valexltr", true);
	localStorage.removeItem("valexrtl");
	$("head link#style").attr("href", $(this));
	(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
	var carousel = $('.owl-carousel');
	$.each(carousel, function (index, element) {
		// element == this
		var carouselData = $(element).data('owl.carousel');
		carouselData.settings.rtl = false; //don't know if both are necessary
		carouselData.options.rtl = false;
		$(element).trigger('refresh.owl.carousel');
		if (document.querySelector('body').classList.contains('horizontal')) {
			checkHoriMenu();
		}
	});
}

function checkOptions() {
	'use strict'

	// horizontal
	if (document.querySelector('body').classList.contains('horizontal')) {
		$('#myonoffswitch35').prop('checked', true);
	}

	// horizontal-hover
	if (document.querySelector('body').classList.contains('horizontal-hover')) {
		$('#myonoffswitch111').prop('checked', true);
	}

	//RTL 
	if (document.querySelector('body').classList.contains('rtl')) {
		$('#myonoffswitch55').prop('checked', true);
	}

	// light header 
	if (document.querySelector('body').classList.contains('light-header')) {
		$('#myonoffswitch6').prop('checked', true);
	}
	// color header 
	if (document.querySelector('body').classList.contains('color-header')) {
		$('#myonoffswitch7').prop('checked', true);
	}
	// gradient header 
	if (document.querySelector('body').classList.contains('gradient-header')) {
		$('#myonoffswitch26').prop('checked', true);
	}
	// dark header 
	if (document.querySelector('body').classList.contains('dark-header')) {
		$('#myonoffswitch8').prop('checked', true);
	}

	// light menu
	if (document.querySelector('body').classList.contains('light-menu')) {
		$('#myonoffswitch3').prop('checked', true);
	}
	// color menu
	if (document.querySelector('body').classList.contains('color-menu')) {
		$('#myonoffswitch4').prop('checked', true);
	}
	// gradient menu
	if (document.querySelector('body').classList.contains('gradient-menu')) {
		$('#myonoffswitch25').prop('checked', true);
	}
	// dark menu
	if (document.querySelector('body').classList.contains('dark-menu')) {
		$('#myonoffswitch5').prop('checked', true);
	}
}
checkOptions()
function removeForTransparent() {
	'use strict'
	if (document.querySelector('body').classList.contains('light-header')) {
		document.querySelector('body').classList.remove('light-header')
	}
	// color header 
	if (document.querySelector('body').classList.contains('color-header')) {
		document.querySelector('body').classList.remove('color-header')
	}
	// gradient header 
	if (document.querySelector('body').classList.contains('gradient-header')) {
		document.querySelector('body').classList.remove('gradient-header')
	}
	// dark header 
	if (document.querySelector('body').classList.contains('dark-header')) {
		document.querySelector('body').classList.remove('dark-header')
	}

	// light menu
	if (document.querySelector('body').classList.contains('light-menu')) {
		document.querySelector('body').classList.remove('light-menu')
	}
	// color menu
	if (document.querySelector('body').classList.contains('color-menu')) {
		document.querySelector('body').classList.remove('color-menu')
	}
	// gradient menu
	if (document.querySelector('body').classList.contains('gradient-menu')) {
		document.querySelector('body').classList.remove('gradient-menu')
	}
	// dark menu
	if (document.querySelector('body').classList.contains('dark-menu')) {
		document.querySelector('body').classList.remove('dark-menu')
	}
}

/////////////////RTL Start//////////////////////

if ($("body").hasClass("rtl")) {
	$('body').addClass('rtl');
	$('body').removeClass('ltr');
	$("html[lang=en]").attr("dir", "rtl");
	$(".select2-container").attr("dir", "rtl");
	localStorage.setItem("valexrtl", true);
	localStorage.removeItem("valexltr");
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
}

/////////////////RTL End//////////////////////

/////////////////Horizontal Start//////////////////////
if ($("body").hasClass("horizontal")) {
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
	$(".main-container").addClass("container");
	$(".main-container").removeClass("container-fluid");
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
	// $('#slide-left').removeClass('d-none');
	// $('#slide-right').removeClass('d-none');
	document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
	menuClick();
	if (document.querySelector('body').classList.contains('horizontal')) {
		checkHoriMenu();
	}
	responsive();
}
/////////////////Horizontal End//////////////////////

/////////////////Horizontal-Hover Start//////////////////////
if ($("body").hasClass("horizontal-hover")) {
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
	$('body').addClass('horizontal-hover');
	$('body').addClass('horizontal');
	let subNavSub = document.querySelectorAll('.sub-slide-menu');
	subNavSub.forEach((e) => {
		e.style.display = '';
	})
	let subNav = document.querySelectorAll('.slide-menu')
	subNav.forEach((e) => {
		e.style.display = '';
	})
	// $('#slide-left').addClass('d-none');
	// $('#slide-right').addClass('d-none');
	document.querySelector('.horizontal .side-menu').style.flexWrap = 'nowrap'
	$(".main-content").addClass("horizontal-content");
	$(".main-content").removeClass("app-content");
	$(".main-container").addClass("container");
	$(".main-container").removeClass("container-fluid");
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
	HorizontalHovermenu();
	if (document.querySelector('body').classList.contains('horizontal')) {
		checkHoriMenu();
	}
	responsive();
}
/////////////////Horizontal-Hover End//////////////////////
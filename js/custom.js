(function ($) {
	"use strict";

	// add your custom functions 
	function clientCarosule () {
		if ($('#clients .owl-carousel').length) {
			$('#clients .owl-carousel').owlCarousel({
			    loop: true,
			    margin: 40,
			    nav: true,
			    dots: false,
			    autoWidth: true,
	            navText: [
	                '<i class="fa fa-angle-left"></i>',
	                '<i class="fa fa-angle-right"></i>'
	            ],
			    autoplayHoverPause: true,
			    responsive: {
			        0:{
			            items:1
			        },
			        480:{
			            items:2
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }
			});
		}
	}
	// Gallery masonary style
	function galleryMasonaryLayout () {
		if ($('.masonary-gallery').length) {
			$('.masonary-gallery').isotope({
				layoutMode:'masonry'
			});
		}
	}
	// Google Map
	function gMap () {
		if ($('.google-map').length) {
            $('.google-map').each(function () {
            	// getting options from html 
            	var mapName = $(this).attr('id');
            	var mapLat = $(this).data('map-lat');
            	var mapLng = $(this).data('map-lng');
            	var iconPath = $(this).data('icon-path');
            	var mapZoom = $(this).data('map-zoom');
            	var mapTitle = $(this).data('map-title');

            	// if zoom not defined the zoom value will be 15;
            	if (!mapZoom) {
            		var mapZoom = 15;
            	};
            	// init map
            	var map;
	            map = new GMaps({
	                div: '#'+mapName,
	                scrollwheel: false,
	                lat: mapLat,
	                lng: mapLng,
	                zoom: mapZoom
	            });
	            // if icon path setted then show marker
	            if(iconPath) {
            		map.addMarker({
		            	icon: iconPath,
		                lat: mapLat,
		                lng: mapLng,
		                title: mapTitle
		            });
            	}
            });  
		};
	}
	// revolution slider
	function revolutionSliderActiver () {
		if ($('.home-v1.banner').length) {
			$('.home-v1.banner').revolution({
				delay:5000,
				startwidth:1170,
				startheight:690,
				startWithSlide:0,

				fullScreenAlignForce:"off",
				autoHeight:"off",
				minHeight:"off",

				shuffle:"off",

				onHoverStop:"on",

				thumbWidth:100,
				thumbHeight:50,
				thumbAmount:3,

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResoluition:0,

				hideThumbs:0,
				hideTimerBar:"on",

				keyboardNavigation:"on",

				navigationType:"bullet",
				navigationArrows: "nexttobullets",
				navigationStyle:"preview4",

				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:30,
				navigationVOffset:30,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,


				touchenabled:"on",
				swipe_velocity:"0.7",
				swipe_max_touches:"1",
				swipe_min_touches:"1",
				drag_block_vertical:"false",

				parallax:"mouse",
				parallaxBgFreeze:"on",
				parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
				parallaxDisableOnMobile:"off",

				stopAtSlide:-1,
				stopAfterLoops:-1,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				hideSliderAtLimit:0,

				dottedOverlay:"none",

				spinned:"spinner4",

				fullWidth:"on",
				forceFullWidth:"on",
				fullScreen:"off",
				fullScreenOffsetContainer:"#banner",
				fullScreenOffset:"0px",

				panZoomDisableOnMobile:"off",

				simplifyAll:"off",

				shadow:0

			});
		}
	}
	// home v2 revolution slider
	function HomeTworevolutionSliderActiver () {
		if ($('.home-v2.banner').length) {
			$('.home-v2.banner').revolution({
				delay:5000,
				startwidth:1170,
				startheight:802,
				startWithSlide:0,

				fullScreenAlignForce:"off",
				autoHeight:"off",
				minHeight:"off",

				shuffle:"off",

				onHoverStop:"off",

				thumbWidth:100,
				thumbHeight:50,
				thumbAmount:3,

				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResoluition:0,

				hideThumbs:0,
				hideTimerBar:"on",

				keyboardNavigation:"on",

				navigationType:"bullet",
				navigationArrows: "nexttobullets",
				navigationStyle:"preview4",

				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:30,
				navigationVOffset:30,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,


				touchenabled:"on",
				swipe_velocity:"0.7",
				swipe_max_touches:"1",
				swipe_min_touches:"1",
				drag_block_vertical:"false",

				parallax:"mouse",
				parallaxBgFreeze:"on",
				parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
				parallaxDisableOnMobile:"off",

				stopAtSlide:-1,
				stopAfterLoops:-1,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				hideSliderAtLimit:0,

				dottedOverlay:"none",

				spinned:"spinner4",

				fullWidth:"on",
				forceFullWidth:"on",
				fullScreen:"off",
				fullScreenOffsetContainer:"#banner",
				fullScreenOffset:"0px",

				panZoomDisableOnMobile:"off",

				simplifyAll:"off",

				shadow:0

			});
		}
	}
	// Adding hover effect to gallery 
	function galleryHover () {
		// hover effect for masonary gallery
		if ($('.masonary-gallery').length) {
			$('.masonary-gallery .content-wrap').each(function () {
				$(this).addClass('hvr-shutter-in-vertical');
			});
		};
		// hover effect for normal gallery
		if ($('.normal-gallery').length) {
			$('.normal-gallery .content-wrap').each(function () {
				$(this).addClass('hvr-rectangle-out');
				$(this).parent().parent().addClass('mix');
			});
		};
			
	}

    // custom tab for Service section 
    function customTabServiceTab () {
        if ($('#service-we-provide .service-tab-title').length) {
            var tabWrap = $('#service-we-provide .col-lg-9 .service-tab-content');
            var tabClicker = $('#service-we-provide .service-tab-title ul li');
            
            tabWrap.children('div').hide();
            tabWrap.children('div').eq(0).show();
            tabClicker.on('click', function() {
                var tabName = $(this).data('tab-name');
                tabClicker.removeClass('active');
                $(this).addClass('active');
                var id = '#'+ tabName;
                tabWrap.children('div').not(id).hide();
                tabWrap.children('div'+id).fadeIn('500');
                return false;
            });        
        }
    }
	// gallery filter activation
    function GalleryFilter () {

    	if ($('#image-gallery-mix').length) {
    		$('.gallery-filter').find('li').each(function () {
    			$(this).addClass('filter');
    		});
    		$('#image-gallery-mix').mixItUp();
    	};
    	if($('.gallery-filter.masonary').length){
			$('.gallery-filter.masonary span').on('click', function(){
				var selector = $(this).parent().attr('data-filter');
				$('.gallery-filter.masonary span').parent().removeClass('active');
				$(this).parent().addClass('active');
				$('#image-gallery-isotope').isotope({ filter: selector });
				return false;
			});
    	}
    }
    // Mobile Navigation
    function mobileNavToggler () {
    	if ($('header .mainmenu-container').length) {
    		$('header button.mainmenu-toggler').on('click', function () {
    			$('ul.mainmenu').slideToggle();
    			return false;
    		});
    		$('.mainmenu-container ul li.dropdown').append(function () {
    			return '<i class="fa fa-bars"></i>';
    		});
    		$('.mainmenu-container ul li.dropdown .fa').on('click', function () {
    			$(this).parent('li').children('ul').slideToggle();
    		});

    	}
    }
    // wow activator
    function wowActivator () {
    	var wow = new WOW ({
    		offset: 0
    	});
    	wow.init();
    }
    // gallery fancybox activator 
    function GalleryFancyboxActivator () {
    	var galleryFcb = $('.fancybox');
    	if(galleryFcb.length){
    		galleryFcb.fancybox();
    	}
    }
	//Contact Form Validation
	function contactFormValidation () {
		if($('.contact-form').length){
			$('.contact-form').validate({ // initialize the plugin
				rules: {
					name: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					message: {
						required: true
					},
					subject: {
						required: true
					}
				},
				submitHandler: function (form) { 
					// sending value with ajax request
					$.post($(form).attr('action'), $(form).serialize(), function (response) {
						$(form).parent('div').append(response);
						$(form).find('input[type="text"]').val('');
						$(form).find('input[type="email"]').val('');
						$(form).find('textarea').val('');
					});
					return false;
				}
			});
		}
	}
	//Request a qoute Form Validation
	function rqaFormValidation () {
		if($('.rqa-form').length){
			$('.rqa-form').each(function () {
				// caching the value
				var form = $(this);

				form.validate({ // initialize the plugin
					rules: {
						name: {
							required: true
						},
						email: {
							required: true,
							email: true
						},
						phone: {
							required: true,
							number: true
						},
						city: {
							required: true
						}
					},
					submitHandler: function (form) { 
						// sending value with ajax request
						$.post($(form).attr('action'), $(form).serialize(), function (response) {
							$(form).parent('div').append(response);
							$(form).find('input[type="text"]').val('');
							$(form).find('input[type="email"]').val('');
							$(form).find('textarea').val('');
						});
						return false;
					}
				});

			});
		}
	}
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').fadeOut();
		}
	}
	// Header top Search button 
	function headerTopSearch () {
		if($('header .mainmenu-container ul li.top-icons.search a').length) {
			$('header .mainmenu-container ul li.top-icons.search a').on('click', function () {
				$('header .search-box').slideToggle();
				$('header .cart-box').slideUp();
				return false;
			});
		}
	}
	// Header top Cart button 
	function headerTopCart () {
		if($('header .mainmenu-container ul li.top-icons.cart a').length) {
			$('header .mainmenu-container ul li.top-icons.cart a').on('click', function () {
				$('header .search-box').slideUp();
				$('header .cart-box').slideToggle();
				return false;
			});
		}
	}
	// Banner Tab creation
	function BannerTabActivation () {
		// grabing the elements
		var bannerTabContentTitle = $('.banner-form .tab-title');
		var bannerTabContentContainer = $('.banner-form .tab-content');

		if(bannerTabContentTitle.length) {
			// hide and showing 
			bannerTabContentContainer.find('div').hide();
			bannerTabContentContainer.find('div').eq(0).show();

			// creating functionality while clicking
			bannerTabContentTitle.children('div').on('click', function () {
				//adding active class
				bannerTabContentTitle.children('div').removeClass('active');
				$(this).addClass('active');
				var tabTitle = $(this).data('title');
				// toggling form
				bannerTabContentContainer.find('div').hide();
				bannerTabContentContainer.find('#'+tabTitle).fadeIn();
			});
		}
	}
	// Request a Qoute Tab creation
	function RequestQoutTabActivation () {
		// grabing the elements
		var bannerTabContentTitle = $('#request-a-qoute-container .tab-title ul li');
		var bannerTabContentContainer = $('#request-a-qoute-container .tab-content');

		if(bannerTabContentTitle.length) {
			// hide and showing 
			bannerTabContentContainer.find('div').hide();
			bannerTabContentContainer.find('div').eq(0).show();

			// creating functionality while clicking
			bannerTabContentTitle.children('span').on('click', function () {
				//adding active class
				bannerTabContentTitle.children('span').removeClass('active');
				$(this).addClass('active');
				var tabTitle = $(this).parent().data('tab-title');
				// toggling form
				bannerTabContentContainer.find('div').hide();
				bannerTabContentContainer.find('#'+tabTitle).fadeIn();
			});
		}
	}
	// sticky header 
	function stickyHeader () {
		var headerScrollPos = $('header').next().offset().top;
		if($(window).scrollTop() > headerScrollPos) {
			$('header').addClass('header-fixed'); 
		}
		else if($(this).scrollTop() <= headerScrollPos) {
			$('header').removeClass('header-fixed'); 
		}
	}
	function footerMenuToggler () {
		var menuToggler = $('button.footer-nav-toggler');
		var menuUl = $('.footer-menu ul');
		if(menuUl.length) {
			menuToggler.on('click', function () {
				menuUl.slideToggle();
			});
		}
	}
	function CounterNumberChanger () {
		var timer = $('.timer');
		if(timer.length) {
			timer.appear(function () {
				timer.countTo();
			})
		}

	}
	function ParallaxActivation () {
		//Parallax Scroll
		var ParallaxSection = $('.parallax');
		if (ParallaxSection.length) {
			ParallaxSection.each(function () {
				$(this).scrolly({bgParallax: true});
			});
			
		}

	}
	function SmoothMenuScroll () {
		var anchor = $('.scrollToLink');
		if(anchor.length){
			anchor.children('a').bind('click', function (event) {
				if ($(window).scrollTop() > 10) {
					var headerH = '45';
				}else {
					var headerH = '125';
				}
				var target = $(this);
				$('html, body').stop().animate({
					scrollTop: $(target.attr('href')).offset().top - headerH + 'px'
				}, 1200, 'easeInOutExpo');
				anchor.removeClass('current');
				target.parent().addClass('current');
				event.preventDefault();
			});
		}
	}
	function OnePageMenuScroll () {
	    var windscroll = $(window).scrollTop();
	    if (windscroll >= 100) {
	    	$('.mainmenu.one-page-scroll-menu .scrollToLink').find('a').each(function (){
	    		// grabing section id dynamically
	    		var sections = $(this).attr('href');
		        $(sections).each(function() {
		        	// checking is scroll bar are in section
		            if ($(this).offset().top <= windscroll + 100) {
		            	// grabing the dynamic id of section
		        		var Sectionid = $(sections).attr('id');
		        		// removing current class from others
		        		$('.mainmenu').find('li').removeClass('current');
		        		// adding current class to related navigation
		        		$('.mainmenu').find('a[href=#'+Sectionid+']').parent().addClass('current');
		            }
		        });
	    	});
	    } else {
	        $('.mainmenu.one-page-scroll-menu li.current').removeClass('current');
	        $('.mainmenu.one-page-scroll-menu li:first').addClass('current');
	    }
	}
    function customTabProductPageTab () {
        if ($('.product-details-tab-title').length) {
            var tabWrap = $('.product-details-tab-content');
            var tabClicker = $('.product-details-tab-title ul li');
            
            tabWrap.children('div').hide();
            tabWrap.children('div').eq(0).show();
            tabClicker.on('click', function() {
                var tabName = $(this).data('tab-name');
                tabClicker.removeClass('active');
                $(this).addClass('active');
                var id = '#'+ tabName;
                tabWrap.children('div').not(id).hide();
                tabWrap.children('div'+id).fadeIn('500');
                return false;
            });        
        }
    }
	// Dom Ready Function
	$(document).on('ready', function () {
		// add your functions
		clientCarosule();
		galleryMasonaryLayout();
		gMap();
		revolutionSliderActiver();
		galleryHover();
		GalleryFilter();
		mobileNavToggler();
		customTabServiceTab();
		wowActivator();
		contactFormValidation();
		rqaFormValidation();
		headerTopSearch();
		headerTopCart();
		BannerTabActivation();
		RequestQoutTabActivation();
		GalleryFancyboxActivator();
		footerMenuToggler();
		HomeTworevolutionSliderActiver();
		ParallaxActivation();
		SmoothMenuScroll();		
		customTabProductPageTab();		
	});

	// window on scroll functino
	$(window).on('scroll', function () {
		// add your functions
		stickyHeader();
		OnePageMenuScroll();
	});
	// window on load functino
	$(window).on('load', function () {
		// add your functions
		CounterNumberChanger();
		handlePreloader();
	});
	

})(jQuery);
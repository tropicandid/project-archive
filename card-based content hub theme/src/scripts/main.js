/* requries:
	jquery-3.2.1.min.js
*/



// Define our object, if not already defined
if ( api === undefined ) { var api = {}; }

api = (function($) {

	'use strict';

	var mainMenuToggle = function() {
		var $headerMenu = $('#header-menu');

		$('#menu-toggle').click(function(e) {
			e.preventDefault();
			$headerMenu.slideToggle(400).toggleClass('open');
			$('#read-time__menu').toggleClass('open', false);
			$('.line-x-animation').toggleClass('open');
			$('body').toggleClass('overflow-hidden');
		});

		$('.no-link > a').click(function(e) {
			e.preventDefault();
		});
		
	};

	var mainMenuSearch = function() {
		$('.search-overlay-toggle').click(function() {
			$('.global-search').toggleClass('open');
			$('body').toggleClass('overflow-hidden');
		});

	};


	var readTimeToggle = function() {
		$('#read-time-toggle').click(function() {
			$('#read-time__menu').toggleClass('open');

			if ( $('#header-menu').hasClass('open') ) {

				$('#header-menu').slideToggle(400).toggleClass('open',false);
				$('.line-x-animation').toggleClass('open',false);
				$('body').toggleClass('overflow-hidden',false);
				
			}
		});
	}

	var dataDisclaimer = function() {
		if (typeof(Storage) !== "undefined") {
	        if (!localStorage.acceptedDataRelease) {
    			$('#data-disclaimer').toggleClass('hidden', false);
	        }
	    } 

    	dataDisclaimerClose();
    }

    var dataDisclaimerClose = function() {
    	$('#data-disclaimer-button').on('click', function(){
    		$('#data-disclaimer').toggleClass('hidden', true);
			localStorage.setItem("acceptedDataRelease", "1");
    	});
    }

    /*
    *	Video Player controls
    */
    var campaignVideoPlay = function() {
		//I need to clean this up. very sloppy.
		if($('.video-full-wrap')){
			
			$('.video-full-overlay').each(function() {

				var currentVideo = $(this).closest('.video-full-wrap').attr('data-video-id');
				var player = new Vimeo.Player(currentVideo);

				player.on('pause', function(){
					//console.log("PAUSE:");
					$('.video-full-image').css('z-index', 2);
					$('.video-full-image').fadeIn();
					$('.video-full-overlay').toggleClass('playing',false);
				});

				player.on('ended', function(){
					$('.video-full-image').css('z-index', 2);
					$('.video-full-image').fadeIn();
					//console.log("PLAYER ENDED:");
					$('.video-full-overlay').toggleClass('playing',false);
				});
		
				$(this).click(function(e) {
					//console.log("CLICK");
					//console.log(e.target);
					e.preventDefault();

					if( !$(this).hasClass('playing') ) {
					
						$(this).closest('.video-full-image').fadeOut();
						$(this).closest('.video-full-image').css('z-index', 0);
						
						player.play().then(function(){
						//	console.log("PLAY:");
							$('.video-full-overlay').toggleClass('playing');
						}).catch(function(error) {
							switch (error.name) {
							case 'PasswordError':
							    // The video is password-protected
							    break;

							case 'PrivacyError':
							    // The video is private
							    break;

							default:
							    // Some other error occurred
							    break;
							}
						});
					}

				});
			});
		}
	}

	var socialSticky = function() {

		function distancesStick() {
			socialDistanceStick = $('.section-social-sticky').offset().top - 162;
			socialDistanceUnStick = $('.single-content').offset().top - 162 + $('.single-content').outerHeight(true) - 350;
			// top section plus the content section, minus the height of the addthis wrapper minus bottom single content padding
		}

		var $addThisWrapper = $('.addthis-side-wrapper');

		if ( $addThisWrapper.length ) {

			var socialDistanceStick,
				socialDistanceUnStick;

			distancesStick();
			setTimeout(function(){
				distancesStick(); 
			},2000);

			$(window).resize(function() {
				distancesStick();
			});

			$(window).scroll(function() {
				if ( $(window).scrollTop() >= socialDistanceUnStick ) {
			    	$addThisWrapper.removeClass('sticky').addClass('stickyUnStick');
			    }
				else if ( $(window).scrollTop() >= socialDistanceStick ) {
			       	$addThisWrapper.addClass('sticky').removeClass('stickyUnStick');
			    }
			    else {
			    	$addThisWrapper.removeClass('sticky');
			    }
			});
		}
	}

	 /*
    // Bottom to top smooth scroll
    // Should be able to utilize this for sticky nav in page scrolling as well
    // And could even adapt this to function with horizontal scrolling
    */
    var smoothScroll = function() {
        $('body').on('click', 'a[href*="#"]', function(event) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && 
                location.hostname == this.hostname 
            ) {
                this.focus();
            	
            	if ( !$(this).hasClass('site-header-menu-toggle') ) {
	                var target = $(this.hash);

	                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	                // Does a scroll target exist?
	                if (target.length) {
	                    // Only prevent default if animation is actually gonna happen
	                    event.preventDefault();
	                    $('html, body').animate({
	                        scrollTop: target.offset().top - 160
	                    }, 1000, function() {});
	                }
	            }
            }
        });
    }

    var gtmCustomEvents = function(){
    	//EMAIL CTA - HEADER
    	$('.primary-menu .button a').click(function(e) {		
    			window.dataLayer.push({
	    			'event':'newsletterCTA',
	    			'newsletter':{
	    				'action': 'subscribe',
	    				'label': 'header',
	    				'path': document.location.pathname
	    			}
    			});	
    	});

    	//EMAIL CTA - FOOTER
    	$('.site-footer__subscribe a').click(function(e) {			
    			window.dataLayer.push({
	    			'event':'newsletterCTA',
	    			'newsletter':{
	    				'action': 'subscribe',
	    				'label': 'footer',
	    				'path': document.location.pathname
	    			}
    			});	
    	});

    	//INTERRUPTER CTA
    	$('.interrupter a').click(function(e) {		
    			window.dataLayer.push({
	    			'event':'interrupterCTA',
	    			'interrupter':{
	    				'action': $(this).text(),
	    				'text': $(this).siblings('p').text(),
	    				'target': $(this).attr('href'),
	    				'path': document.location.pathname
	    			}
    			});	
    	});

    	//SOCIAL - FOLLOW
    	$('.global-social a').click(function(e) {		
    			window.dataLayer.push({
	    			'event':'socialMediaCTA',
	    			'social':{
	    				'channel': $(this).text(),
	    				'action': 'Click to Channel',
	    				'target': $(this).attr('href'),
	    				'path': document.location.pathname
	    			}
    			});	
    	});

    	//SOCIAL - SHARE
    	if($('.at-share-btn-elements')[0]){ 	
		 	addthis.addEventListener('addthis.menu.share', addThisEventHandler);
    	}
    }



    /* 
    *  Homepage video controls
    */
    var video1Play = function() {
    	if($('#video-1').length > 0) {
			var video = $('#video-1').get(0);
			video.play();
		}
	}

	var video2Play = function() {
		if($('#mobile-second-banner').length > 0) {
			var video1 = $('#mobile-second-banner').get(0);
			video1.play();
		}
	}


	/*
	*	Embedded autoplay video controls
	*/

	var autoPlayAssigner = function() {
		var controller = new ScrollMagic.Controller();

		$('.scroll-to-video__wrapper').each(function(){
			var currentVideo = $(this).find('.scroll-to-video')[0];
			var videoPlayTrigger = new ScrollMagic.Scene({triggerElement: currentVideo ,duration: 50, offset: 0, reverse: false})
            .on("enter", function(event) {
                triggerPlayBehavior(currentVideo);
            })
            .addTo(controller);
		})
	}

	var triggerPlayBehavior = function(video) {
		if( video ) {
			if( !$(video).hasClass('prevent-play') ) {
				video.play();
			}
		}
	}

	function addThisEventHandler(evt) {
		    switch (evt.type) {
		      case "addthis.menu.share":
		        window.dataLayer.push({
		          'event': 'socialMediaCTA',
		          'social':{
		 	         'channel': evt.data.service,
		 	         'action': 'Click to Share',
		 	         'target': evt.data.url
		      	 }
		        });
		     break;
		    }
		 }

	var init = function() {
		mainMenuToggle();
		mainMenuSearch();
		readTimeToggle();
		dataDisclaimer();
		smoothScroll();
		socialSticky();
		campaignVideoPlay();
		gtmCustomEvents();
		video1Play();
		autoPlayAssigner();

		$(window).scroll(function(e) {

			if($('#mobile-second-banner').length > 0) {

				var scrollPlacement = $(document).scrollTop() >= ( $('#mobile-second-banner').offset().top - $('#mobile-second-banner').parent().outerHeight() - 500 );
				//console.log(scrollPlacement);

				if( scrollPlacement && !$('#mobile-second-banner').hasClass('played') ){
					$('#mobile-second-banner').toggleClass('played');
					video2Play();
				}
			}
			
		});
	};

	return {
		init:init
	};

}(jQuery));

(function(){'use strict';
	$(window).on('load', function(){
		api.init();
	});
}());



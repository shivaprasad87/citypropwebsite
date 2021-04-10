$(function () {

    'use strict';

    // Showing page loader
    $(window).on('load', function () {
        setTimeout(function () {
            $(".page_loader").fadeOut("fast");
        }, 100);

        if ($('body .filter-portfolio').length > 0) {
            $(function () {
                $('.filter-portfolio').filterizr(
                    {
                        delay: 0
                    }
                );
            });
            $('.filteriz-navigation li').on('click', function () {
                $('.filteriz-navigation .filtr').removeClass('active');
                $(this).addClass('active');
            });
        }
    });


    // Made the left sidebar's min-height to window's height
    var winHeight = $(window).height();
    $('.dashboard-nav').css('min-height', winHeight);


    // Magnify activation
    $('.portfolio-item').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{enabled:true}
    });


    // Header shrink while page scroll
    adjustHeader();
    doSticky();
    placedDashboard();
    $(window).on('scroll', function () {
        adjustHeader();
        doSticky();
        placedDashboard();
    });

    // Header shrink while page resize
    $(window).on('resize', function () {
        adjustHeader();
        doSticky();
        placedDashboard();
    });

    function adjustHeader()
    {
        var windowWidth = $(window).width();
        if(windowWidth > 0) {
            if ($(document).scrollTop() >= 100) {
                if($('.header-shrink').length < 1) {
                    $('.sticky-header').addClass('header-shrink');
                }
                if($('.do-sticky').length < 1) {
                    $('.logo img').attr('src', '<?=base_url('assets/') ?>img/logos/black-logo.png');
                }
            }
            else {
                $('.sticky-header').removeClass('header-shrink');
                if($('.do-sticky').length < 1 && $('.fixed-header').length == 0 && $('.fixed-header2').length == 0) {
                    $('.logo img').attr('src', 'img/logos/logo.png');
                } else {
                    $('.logo img').attr('src', 'img/logos/logo.png');
                }
            }
        } else {
            $('.logo img').attr('src', '<?=base_url('assets/') ?>img/logos/black-logo.png');
        }
    }

    function doSticky()
    {
        if ($(document).scrollTop() > 40) {
            $('.do-sticky').addClass('sticky-header');
            //$('.do-sticky').addClass('header-shrink');
        }
        else {
            $('.do-sticky').removeClass('sticky-header');
            //$('.do-sticky').removeClass('header-shrink');
        }
    }

    function placedDashboard() {
        var headerHeight = parseInt($('.main-header').height(), 10);
        $('.dashboard').css('top', headerHeight);
    }
    

    /*  Listing Layout Switcher
		/*----------------------------------------------------*/
		function gridLayoutSwitcher() {
	
			var listingsContainer = $('.listings-container');
	
			// switcher buttons / anchors
			if ( $(listingsContainer).is(".property-box-2") ) {
				owlReload();
				$('.sorting-options a.grid, .sorting-options a.grid-three').removeClass("active-view-btn");
				$('.sorting-options a.list').addClass("active-view-btn");
			}
	
			if ( $(listingsContainer).is(".property-box-1") ) {
				owlReload();
				$('.sorting-options a.grid').addClass("active-view-btn");
				$('.sorting-options a.grid-three, .sorting-options a.list').removeClass("active-view-btn");
				gridClear(2);
			}
	
			
			// grid cleaning
			function gridClear(gridColumns) {
				// $(listingsContainer).find(".clearfix").remove();
				$(".listings-container > .listing-item:nth-child("+gridColumns+"n)").after("<div class='clearfix'></div>");
			}
	
	
			// objects that need to resized
			var resizeObjects =  $('.listings-container .listing-img-container img, .listings-container .listing-img-container');
	
			// if list layout is active
			function listLayout() {
                
				if ( $('.sorting-options a').is(".list.active-view-btn") ) {
	
					$(listingsContainer).each(function(){
						$(this).removeClass("grid-layout property-box-1");
						$(this).addClass("list-layout property-box-2");
					});
	
					$('.listing-item').each(function(){
						var listingContent = $(this).find('.listing-content').height();
                        
						$(this).find(resizeObjects).css('height', ''+listingContent+'');
					});
				}
			} listLayout();
	
			$(window).on('load resize', function() {
				listLayout();
			});
	
	
			// if grid layout is active
			$('.sorting-options a.grid').on('click', function(e) { gridClear(2); });
	
			function gridLayout() {
				if ( $('.sorting-options a').is(".grid.active-view-btn") ) {
	
					$(listingsContainer).each(function(){
						$(this).removeClass("list-layout property-box-2");
						$(this).addClass("grid-layout property-box-1");
					});
	
					$('.listing-item').each(function(){
						$(this).find(resizeObjects).css('height', '220px');
					});
	
				}
                
			} gridLayout();
	
	
	
	
			// Mobile fixes
			$(window).on('resize', function() {
				$(resizeObjects).css('height', 'auto');
				listLayout();
				gridLayout();
			
			});
	
			$(window).on('load resize', function() {
				var winWidth = $(window).width();
	
				if(winWidth < 992) {
					owlReload();
	
					// reset to two columns grid
					gridClear(2);
				}
	
				if(winWidth > 992) {
					
					if ( $(listingsContainer).is(".property-box-1") ) {
						gridClear(2);
					}
				}
	
				if(winWidth < 768) {
					if ( $(listingsContainer).is(".property-box-2") ) {
						$('.listing-item').each(function(){
							$(this).find(resizeObjects).css('height', 'auto');
						});
					}
				}
	
				if(winWidth < 1366) {
					if ( $(".fs-listings").is(".property-box-2") ) {
						$('.listing-item').each(function(){
							$(this).find(resizeObjects).css('height', 'auto');
						});
					}
				}
			});
	
            // owlCarousel reload
            function owlReload() {
                $('.listing-carousel').each(function(){
                    $(this).data('owlCarousel').reload();
                });
            }
			
	
			// switcher buttons
			$('.sorting-options a').on('click', function(e) {
				e.preventDefault();
	
				var switcherButton = $(this);
				switcherButton.addClass("active-view-btn").siblings().removeClass('active-view-btn');
	
				// reset images height
				$(resizeObjects).css('height', '0');
	
				// carousel reload
				owlReload();
	
				// if grid layout is active
				gridLayout();
	
			
	
				// if list layout is active
				listLayout();
	
			});
	
		} gridLayoutSwitcher();
	

    // Banner slider
    (function ($) {
        //Function to animate slider captions
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $('#carousel-example-generic')
        var $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel
        $myCarousel.carousel();

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Pause carousel
        $myCarousel.carousel('pause');
        //Other slides to be animated on carousel slide event
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
        $('#carousel-example-generic').carousel({
            interval: 3000,
            pause: "false"
        });
    })(jQuery);

    // Page scroller initialization.
    $.scrollUp({
        scrollName: 'page_scroller',
        scrollDistance: 300,
        scrollFrom: 'top',
        scrollSpeed: 500,
        easingType: 'linear',
        animation: 'fade',
        animationSpeed: 200,
        scrollTrigger: false,
        scrollTarget: false,
        scrollText: '<i class="fa fa-chevron-up"></i>',
        scrollTitle: false,
        scrollImg: false,
        activeOverlay: false,
        zIndex: 2147483647
    });

    // Counter
    function isCounterElementVisible($elementToBeChecked) {
        var TopView = $(window).scrollTop();
        var BotView = TopView + $(window).height();
        var TopElement = $elementToBeChecked.offset().top;
        var BotElement = TopElement + $elementToBeChecked.height();
        return ((BotElement <= BotView) && (TopElement >= TopView));
    }

    $(window).on('scroll', function () {
        $(".counter").each(function () {
            var isOnView = isCounterElementVisible($(this));
            if (isOnView && !$(this).hasClass('Starting')) {
                $(this).addClass('Starting');
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
        });
    });


    // Countdown activation
    $( function() {
        // Add background image
        //$.backstretch('../img/nature.jpg');
        var endDate = "April  17, 2020 15:03:25";
        $('.countdown.simple').countdown({ date: endDate });
        $('.countdown.styled').countdown({
            date: endDate,
            render: function(data) {
                $(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>Days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>Hours</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>Minutes</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>Seconds</span></div>");
            }
        });
        $('.countdown.callback').countdown({
            date: +(new Date) + 10000,
            render: function(data) {
                $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
            },
            onEnd: function() {
                $(this.el).addClass('ended');
            }
        }).on("click", function() {
            $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });

    });

    $(".range-slider-ui").each(function () {
        var minRangeValue = $(this).attr('data-min');
        var maxRangeValue = $(this).attr('data-max');
        var minName = $(this).attr('data-min-name');
        var maxName = $(this).attr('data-max-name');
        var unit = $(this).attr('data-unit');

        $(this).append("" +
            "<span class='min-value'></span> " +
            "<span class='max-value'></span>" +
            "<input class='current-min' type='hidden' name='"+minName+"'>" +
            "<input class='current-max' type='hidden' name='"+maxName+"'>"
        );
        $(this).slider({
            range: true,
            min: minRangeValue,
            max: maxRangeValue,
            values: [minRangeValue, maxRangeValue],
            slide: function (event, ui) {
                event = event;
                var currentMin = parseInt(ui.values[0], 10);
                var currentMax = parseInt(ui.values[1], 10);
                $(this).children(".min-value").text( currentMin + " " + unit);
                $(this).children(".max-value").text(currentMax + " " + unit);
                $(this).children(".current-min").val(currentMin);
                $(this).children(".current-max").val(currentMax);
            }
        });

        var currentMin = parseInt($(this).slider("values", 0), 10);
        var currentMax = parseInt($(this).slider("values", 1), 10);
        $(this).children(".min-value").text( currentMin + " " + unit);
        $(this).children(".max-value").text(currentMax + " " + unit);
        $(this).children(".current-min").val(currentMin);
        $(this).children(".current-max").val(currentMax);
    });

    // Select picket
    $('.selectpicker').selectpicker();

    // Search option's icon toggle
    $('.search-options-btn').on('click', function () {
        $('.search-section').toggleClass('show-search-area');
        $('.search-options-btn .fa').toggleClass('fa-chevron-down');
    });

   
    // Background video playing script
    $(document).ready(function () {
        $(".player").mb_YTPlayer(
            {
                mobileFallbackImage: 'img/banner/banner-1.jpg'
            }
        );
    });

    // Multilevel menuus
    $('[data-submenu]').submenupicker();

    // Expending/Collapsing advance search content
    $('.show-more-options').on('click', function () {
        if ($(this).find('.fa').hasClass('fa-minus-circle')) {
            $(this).find('.fa').removeClass('fa-minus-circle');
            $(this).find('.fa').addClass('fa-plus-circle');
        } else {
            $(this).find('.fa').removeClass('fa-plus-circle');
            $(this).find('.fa').addClass('fa-minus-circle');
        }
    });

    var videoWidth = $('.sidebar-widget').width();
    var videoHeight = videoWidth * .61;
    $('.sidebar-widget iframe').css('height', videoHeight);


    // Megamenu activation
    $(".megamenu").on("click", function (e) {
        e.stopPropagation();
    });

    // Dropdown activation
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });



    // Slick Sliders
    $('.slick-carousel').each(function () {
        var slider = $(this);
        $(this).slick({
            infinite: true,
            dots: false,
            arrows: false,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 6000,
            slidesToShow: 3,
            centerPadding: '0',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                      arrows: false,
                      centerMode: true,
                      slidesToShow: 3
                    }
                  },

                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    centerMode: true,
                    slidesToShow: 2
                  }
                },

                {
                  breakpoint: 480,
                  settings: {
                    arrows: true,
                    centerMode: true,
                    slidesToShow: 1
                  }
                }
              ]
        });
        
        $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function () {
            slider.slick('slickPrev');
        });
        $(this).closest('.slick-slider-area').find('.slick-next').on("click", function () {
            slider.slick('slickNext');
        });
    });


    $(".dropdown.btns .dropdown-toggle").on('click', function() {
        $(this).dropdown("toggle");
        return false;
    });

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".fa")
            .toggleClass('fa-minus fa-plus');
    }

    $('.panel-group').on('shown.bs.collapse', toggleChevron);
    $('.panel-group').on('hidden.bs.collapse', toggleChevron);

   
 
});

// mCustomScrollbar initialization
(function ($) {
    $(window).resize(function () {
        $('#map').css('height', $(this).height() - 110);
        if ($(this).width() > 768) {
            $(".map-content-sidebar").mCustomScrollbar(
                {theme: "minimal-dark"}
            );
            $('.map-content-sidebar').css('height', $(this).height() - 110);
        } else {
            $('.map-content-sidebar').mCustomScrollbar("destroy"); //destroy scrollbar
            $('.map-content-sidebar').css('height', '100%');
        }
    }).trigger("resize");
})(jQuery);

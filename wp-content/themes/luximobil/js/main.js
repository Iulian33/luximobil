$ = jQuery;

$(document).ready(function($) {
    $(window).on('scroll', function () {
        makeNavSticky();
    });

    var makeNavSticky = function () {
        var $header = $('.main-header'),
            headerHeight = 135;
            deviceScreen = window.matchMedia("(max-width: 1025px)");

        if ($(window).scrollTop() >= headerHeight) {
            if (!deviceScreen.matches){
                $header.addClass('sticky');
            }
        } else {
            $header.removeClass('sticky');
        }
    };

    $(".apartaments-carousel").owlCarousel({
        margin: 25,
        loop: true,
        autoplay: true,
        responsive : {
            0: {
                items: 1,
                stagePadding: 60
            },
            768: {
                items: 3
            },
            1025: {
                items: 4
            }
        }
    });

    $(".homes-carousel").owlCarousel({
        margin: 25,
        loop: true,
        autoplay: true,
        responsive : {
            0: {
                items: 1,
                stagePadding: 60
            },
            768: {
                items: 3
            },
            1025: {
                items: 4
            }
        }
    });

    // mobilemenu Code
    var main_menu = $(".mainMenu > ul").clone();
    main_menu.removeAttr("id class").find("li").removeAttr("id");
    main_menu.appendTo("#mobilemenu");
    $("#mobilemenu").mmenu({
        "offCanvas": {
            "zposition":"front",
            "position" : "right"
        },
        navbar: {
            title: "Meniu"
        },
    });

	// Initialize dropkick select for forms
	$('select').dropkick({
		mobile: true
	});


    (function($, window) {
        function autoheight() {
            var max = 0;

            $ls = $('.article-block');

            $ls.each(function() {
                $t = $(this);
                $t.css('height','');
                max = Math.max(max, $t.height());
            });
            $ls.height(max);

        }

        $(function() {
            // the inline-block selector
            autoheight(); // first time
            $(window).load(autoheight); // when all content finishes loading
            $(window).resize(autoheight); // when the window size changes
            $(document).on('sf:ajaxfinish', '.searchandfilter', autoheight);
        });
    })(jQuery, window);


 });

jQuery(document).bind('gform_page_loaded', function(event, form_id, current_page){
	$('select').dropkick({
		mobile: true
	});
});

jQuery(window).on('load', function(){
	$('.loader-container').fadeOut(600);
});



if ($('body').hasClass('single-imobil')) {
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
}

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
                items: 1
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
                items: 1
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
            "zposition":"front"
        }
    });

	// Initialize dropkick select for forms
	$('select').dropkick({
		mobile: true
	});


 });

jQuery(document).bind('gform_page_loaded', function(event, form_id, current_page){
	$('select').dropkick({
		mobile: true
	});
});

jQuery(window).on('load', function(){
	$('.loader-container').fadeOut(600);
});
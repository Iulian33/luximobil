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
        items: 4,
        margin: 25,
        loop: true,
        autoplay: true
    });

    $(".homes-carousel").owlCarousel({
        items: 4,
        margin: 25,
        loop: true,
        autoplay: true
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
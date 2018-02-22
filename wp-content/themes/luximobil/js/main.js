$ = jQuery;

// Google Map Widget
function new_map($el) {
    var $markers = $el.find('.marker');
    var args = {
        zoom: 16,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map($el[0], args);
    map.markers = [];

    $markers.each(function () {
        add_marker($(this), map);
    });
    center_map(map);
    return map;
}

function add_marker($marker, map) {
    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
    // create marker
    var marker = new google.maps.Marker({
        position: latlng,
        map: map
    });
    map.markers.push(marker);
    if ($marker.html()) {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });
        google.maps.event.addListener(marker, 'click', function () {

            infowindow.open(map, marker);

        });
    }

}

function center_map(map) {
    var bounds = new google.maps.LatLngBounds();
    $.each(map.markers, function (i, marker) {
        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
        bounds.extend(latlng);
    });

    if (map.markers.length == 1) {
        map.setCenter(bounds.getCenter());
        map.setZoom(16);
    } else {
        map.fitBounds(bounds);
    }

}

var map = null;


$(document).ready(function ($) {

    $('.acf-map').each(function () {
        map = new_map($(this));
    });

    $(window).on('scroll', function () {
        makeNavSticky();
    });

    var makeNavSticky = function () {
        var $header = $('.main-header'),
            headerHeight = 135;
        deviceScreen = window.matchMedia("(max-width: 1025px)");

        if ($(window).scrollTop() >= headerHeight) {
            if (!deviceScreen.matches) {
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
        touchDrag: true,
        mouseDrag: false,
        responsive: {
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
        touchDrag: true,
        mouseDrag: false,
        responsive: {
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

    $(".team-members-carousel").owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        responsive: {
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
            "zposition": "front",
            "position": "right"
        },
        navbar: {
            title: "Meniu"
        }
    });

    // Initialize dropkick select for forms
    $('select').dropkick({
        mobile: true
    });


    (function ($, window) {
        function autoheight() {
            var max = 0;

            $ls = $('.article-block');

            $ls.each(function () {
                $t = $(this);
                $t.css('height', '');
                max = Math.max(max, $t.height());
            });
            $ls.height(max);

        }

        $(function () {
            // the inline-block selector
            autoheight(); // first time
            $(window).load(autoheight); // when all content finishes loading
            $(window).resize(autoheight); // when the window size changes
            $(document).on('sf:ajaxfinish', '.searchandfilter', autoheight);
        });
    })(jQuery, window);
});

// Filters On Small device Code
var filtersButton = '.filters-button';
var filtersPopup = $('.filters-col');
var closeFilters = $('.close-filters');


function Utils() {
}

Utils.prototype = {
    constructor: Utils,
    isElementInView: function (element, fullyInView) {
        var pageTop = $(window).scrollTop();
        var pageBottom = pageTop + $(window).height();
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).height();

        if (fullyInView === true) {
            return ((pageTop < elementTop) && (pageBottom > elementBottom));
        } else {
            return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
        }
    }
};

var Utils = new Utils();


$(window).scroll(function () {

    var footerElem = $('.mainFooter');
    var Fbutton = $(filtersButton);
    var isElementInView = Utils.isElementInView(footerElem, false);

    if (isElementInView) {
        Fbutton.addClass('static');
    } else {
        Fbutton.removeClass('static');
    }
});

$(document).on('click', function () {
    filtersPopup.removeClass('opened-filter-popup');
});

closeFilters.click(function () {
    filtersPopup.removeClass('opened-filter-popup');
    $('body').css({
        "overflow": "auto",
        "position": "relative",
        "height": "auto"
    });

});

$(document).on('click', filtersButton, function (event) {
    filtersPopup.addClass('opened-filter-popup');
    event.stopPropagation();
    $('body').css({
        "overflow": "hidden",
        "position": "fixed",
        "height": "100vh"
    });
});

filtersPopup.click(function (event) {
    event.stopPropagation();
});

jQuery(document).bind('gform_page_loaded', function (event, form_id, current_page) {
    $('select').dropkick({
        mobile: true
    });
});

jQuery(window).on('load', function () {
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
//Fancybox
$("[data-fancybox]").fancybox({});


// Variabiles Calculator
var pretImobil, primaRataProcent, primaRataNr, procentAnual,
    rambursare, plataLunaraDOM, sumaFinantataDOM, sumaAnuala,
    startPrice, startRateNumber;


// Getting necesary elements from DOM
var pretImobilDOM = document.getElementById('calc-pret-imobil');
var primaRataProcentDOM = document.getElementById('rata-procent');
var primaRataNrDOM = document.getElementById('rata-numericValue');
var rambursareDOM = document.getElementById('rambursare');
var procentAnualDOM = document.getElementById('procent-anual');
plataLunaraDOM = document.getElementById('plata-lunara');
sumaFinantataDOM = document.getElementById('suma-finantata');


// initialize Calculator
function initCalculator() {
    if (pretImobilDOM) {
        startPrice = parseInt(pretImobilDOM.value);
        pretImobil = parseInt(pretImobilDOM.value);
        primaRataProcent = parseInt(primaRataProcentDOM.value);
        rambursare = parseInt(rambursareDOM.value);
        procentAnual = parseInt(procentAnualDOM.value);
        startRateNumber = initialRateNumber();
        calculateRateNr();
        calculateNeededSum();
    }
}


if (pretImobilDOM) {
    // ------- Focus Events ----------
    pretImobilDOM.addEventListener('focus', function () {
        this.select();
    });
    primaRataProcentDOM.addEventListener('focus', function () {
        if (primaRataProcent < 30) {
            primaRataProcentDOM.value = 30;
        }
        this.select();
    });

    primaRataNrDOM.addEventListener('focus', function () {
        primaRataNr = parseInt(primaRataNrDOM.value);
        var curentRateNr = parseInt(primaRataNrDOM.value);
        var tempRateNr;

        if (curentRateNr === startRateNumber) {
            tempRateNr = startRateNumber;
        } else {
            tempRateNr = curentRateNr;
        }

        if (primaRataNr < tempRateNr) {
            primaRataNrDOM.value = tempRateNr;
        } else if (primaRataNr > tempRateNr) {
            primaRataNrDOM.value = tempRateNr;
        }
        this.select();
    });


    // ------- On input change events ----------

    // ##### Imobil Price
    pretImobilDOM.addEventListener('keyup', function () {
        pretImobil = pretImobilDOM.value;
        if (pretImobil !== '') {
            pretImobil = parseInt(pretImobil);
        } else {
            pretImobil = 0;
        }
        if (pretImobil > startPrice) {
            pretImobilDOM.value = startPrice;
            calculateRateNr();
        } else if (pretImobil < 1) {
            pretImobilDOM.value = 0;
            this.select();
            calculateRateNr();
        } else {
            calculateRateNr();
        }
        calculateNeededSum();
    });


    // ##### Rata Procent
    primaRataProcentDOM.addEventListener('keyup', function () {
        primaRataProcent = primaRataProcentDOM.value;
        if (primaRataProcent > 90) {
            primaRataProcentDOM.value = 90;
            calculateRateNr();
        } else if (!(primaRataProcent < 30)) {
            calculateRateNr();
        } else if (primaRataProcent < 1) {
            primaRataProcentDOM.value = 0;
            this.select();
        }
        calculateNeededSum();
    });


    // ##### Rata In numeric Value
    primaRataNrDOM.addEventListener('keyup', function () {
        var tempPrice;
        var curentPriceNr = parseInt(pretImobilDOM.value);

        if (startPrice === curentPriceNr) {
            tempPrice = startPrice;
        } else {
            tempPrice = curentPriceNr;
        }

        // getting corect rate number
        primaRataNr = primaRataNrDOM.value;
        if (primaRataNr !== '') {
            primaRataNr = parseInt(primaRataNr);
        } else {
            primaRataNr = 0;
        }

        if (primaRataNr > tempPrice) {
            primaRataNrDOM.value = tempPrice;
            calculateProcentRate();
        } else if (!(primaRataNr < startRateNumber)) {
            calculateProcentRate();
        } else if (primaRataNr < 1) {
            primaRataNrDOM.value = 0;
            this.select();
        }
        calculateNeededSum();
    });

    // rambursare.addEventListener('keyup',function () {
    //     alert('here');
    // });

}


function initialRateNumber() {
    var rataNrRez = ( pretImobil * primaRataProcent ) / 100;
    return Math.round(rataNrRez);
}

function calculateMouthSum() {
    // Plata lunara
}

function calculateNeededSum() {
    pretImobil = parseInt(pretImobilDOM.value);
    primaRataNr = parseInt(primaRataNrDOM.value);
    var sumaFinantata = pretImobil - primaRataNr;
    sumaFinantataDOM.textContent = sumaFinantata;
}


function calculateRateNr() {
    primaRataProcent = parseInt(primaRataProcentDOM.value);
    var rataNrRez = ( pretImobil * primaRataProcent ) / 100;
    primaRataNrDOM.value = Math.round(rataNrRez);
}

function calculateProcentRate() {
    pretImobil = parseInt(pretImobilDOM.value);
    primaRataNr = parseInt(primaRataNrDOM.value);
    var rataProcentRez = (primaRataNr * 100) / pretImobil;
    primaRataProcentDOM.value = Math.round(rataProcentRez);
}

window.addEventListener('load', initCalculator);
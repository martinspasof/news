// $(function() {
//   alert("dsadas");
//   $(".search-form .form-group").on("click", function () {
//     alert("dsadas");
//     $(this).css({
//         "color", "red"
//     });
//   });

//  });
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
$(document).ready(function () {
    $("#video-sofia").hide();
    $("#btn-sf").click(function () {
        $("#video-plovdiv").hide();
        $("#video-sofia").show();
    });
    $("#btn-pl").click(function () {
        $("#video-plovdiv").show();
        $("#video-sofia").hide();
    });
});
$(document).ready(function() {
previouslyClicked = $(".btn-loc").eq(0); //Assuming first tab is selected by default
$(".btn-loc").click(function () {       
     previouslyClicked.removeClass("course-btn-tab-selected").addClass("course-btn-tab");                 
     $(this).addClass("course-btn-tab-selected");
     previouslyClicked = $(this);           
});
});

$(document).ready(function() {
    $("#search-modal").on('shown.bs.modal', function() {
        $(".modal-header-nav").stop(true, true).addClass("header-fixed", 1000);
        $(".modal-header-nav").find(".fa-search").removeClass("fa-search").addClass("fa-times");
    });
    $("#search-modal").on('hidden.bs.modal', function() {
        $(".modal-header-nav").stop(true, true).removeClass("header-fixed", 1000);
        $(".modal-header-nav").find(".fa-times").removeClass("fa-times").addClass("fa-search");
    });
});

$(document).ready(function() {
    $(".service-box").mouseenter(function() {
        var img_path = baseUrl + "img/services/";
        var img_name = $(this).find('.img-icon-service').data('img_name');
        var prefix = "-hover";
        $(this).find('.img-icon-service').attr("src", img_path + img_name + prefix + ".svg");
    });
    $(".service-box").mouseleave(function() {

        var img_path = baseUrl + "img/services/";
        var img_name = $(this).find('.img-icon-service').data('img_name');
        var prefix = "-hover";
        $(this).find('.img-icon-service').attr("src", img_path + img_name + ".svg");
    });
});

// $(document).ready(function() {
//     $(".search-form .fa-search").on("click", function() {
//         $(".search-form .form-group").toggleClass("widths100");
//     });
// });

$('.collapse-arrow').on('shown.bs.collapse', function() {
    $(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");
}).on('hidden.bs.collapse', function() {
    $(this).parent().find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");
});

$('.collapse-arrow').on('shown.bs.collapse', function() {
    $(this).parent().find(".active-acc").removeClass("active-acc").addClass("not-active-acc");
}).on('hidden.bs.collapse', function() {
    $(this).parent().find(".not-active-acc").removeClass("not-active-acc").addClass("active-acc");
});


$(document).ready(function() {
    box_h_w();
    box_h_h();
});
$(window).resize(function() { // On resize
    box_h_w();
    box_h_h();
});


function box_h_w() {
    var cw = $('.service-box').width();
    $('.service-box').css({
        'height': cw + 'px'
    });
}


function box_h_h() {
    var ch = $('.p-box-wrap').height();
    $('.p-box-wrap-no-img').css({
        'height': ch + 'px'
    });
}

$(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready(function() {

        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }

        });
    });

});

$("#down-app-btn").click(function() {
    $('html, body').animate({
        scrollTop: $("#div1").offset().top
    }, 1000);
});

$("#three-cols").click(function() {
    $("#posts-grid").find(".col-md-6").removeClass("col-md-6").addClass("col-md-4");
    $("#two-cols").removeClass("active")
    $("#three-cols").addClass("active");
    box_h_h();
});

$("#two-cols").click(function() {
    $("#posts-grid").find(".col-md-4").removeClass("col-md-4").addClass("col-md-6");
    $("#three-cols").removeClass("active")
    $("#two-cols").addClass("active");
    box_h_h();
});

var vid = document.getElementById("myVideo");
$('#btn-v-pause').hide();

function playVid() {
    vid.play();
    $('.video-text-button-wraper').fadeOut();
    $('#btn-v-pause').fadeIn();
}

function pauseVid() {
    vid.pause();
    $('#btn-v-pause').fadeOut();
    $('.video-text-button-wraper').fadeIn();
}


var map;

function initMap(lat=51.5081761, lng=-0.0595714, title='Пловдив', content='1') {
    var center = { lat: parseFloat(lat), lng:parseFloat(lng) };
    if(content == '1'){
        content_content = 'Кв. Капана,<br>ул. Железарска 18<br>4000 Пловдив<br><br>E - mail: plovdiv3d@b2n.bg<br>Телефон: +359 896 950 930';
    }else if(content == '2'){
        content_content = 'Кв. Капана,<br>ул. Железарска 18<br>2500 София<br><br>E - mail: plovdiv3d@b2n.bg<br>Телефон: +359 896 950 930';
    }
// alert(center);
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: center,

        styles: [{
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [{
                        "saturation": 36
                    },
                    {
                        "color": "#935716"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "color": "#935716"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#ffd709"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#fed636"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#eaa521"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#eaa521"
                    },
                    {
                        "lightness": 0
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#eaa521"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#eaa521"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#eaa521"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#fed636"
                    },
                    {
                        "lightness": 0
                    }
                ]
            }
        ]
    });

        function newLocation(newLat,newLng)
    {
        map.setCenter({
            lat : newLat,
            lng : newLng
        });
    }

    // InfoWindow content
    var content = '<div id="iw-container">' +
        '<div class="iw-title">3D Happiness - '+title+'</div>' +
        '<div class="iw-content">' +
        '<img src="img/info-logo.png" alt="3dHappines" height="115" width="83">' +
        '<p>'+content_content+'</p>' +
        '</div>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: content,
        maxWidth: 350
    });


    var marker = new google.maps.Marker({
        position: center,
        map: map,
        title: 'Hello World!',
        icon: 'img/pin.png' // null = default icon
    });
    // This event expects a click on a marker
    // When this event is fired the Info Window is opened.
    google.maps.event.addListener(marker, 'click', function() {
       infowindow.open(map,marker);
    });

    infowindow.open(map,marker);
    // Event that closes the Info Window with a click on the map
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
    });
    // *
    // START INFOWINDOW CUSTOMIZE.
    // The google.maps.event.addListener() event expects
    // the creation of the infowindow HTML structure 'domready'
    // and before the opening of the infowindow, defined styles are applied.
    // *
    google.maps.event.addListener(infowindow, 'domready', function() {

        // Reference to the DIV that wraps the bottom of infowindow
        var iwOuter = $('.gm-style-iw');

        /* Since this div is in a position prior to .gm-div style-iw.
         * We use jQuery and create a iwBackground variable,
         * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
         */
        var iwBackground = iwOuter.prev();

        // Removes background shadow DIV
        iwBackground.children(':nth-child(2)').css({ 'display': 'none' });

        // Removes white background DIV
        iwBackground.children(':nth-child(4)').css({ 'display': 'none' });

        // Moves the infowindow 115px to the right.
        //iwOuter.parent().parent().css({ left: '115px' });

        // Moves the shadow of the arrow 76px to the left margin.
        //iwBackground.children(':nth-child(1)').attr('style', function(i, s) { return s + 'left: 76px !important;' });

        // Moves the arrow 76px to the left margin.
        //iwBackground.children(':nth-child(3)').attr('style', function(i, s) { return s + 'left: 76px !important;' });

        // Changes the desired tail shadow color.
        //iwBackground.children(':nth-child(3)').find('div').children().css({ 'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index': '1' });

        // Reference to the div that groups the close button elements.
        var iwCloseBtn = iwOuter.next();

        // Apply the desired effect to the close button
        iwCloseBtn.css({ 'display': 'none' });

        // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
        if ($('.iw-content').height() < 140) {
            $('.iw-bottom-gradient').css({ display: 'none' });
        }

        // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
        iwCloseBtn.mouseout(function() {
            $(this).css({ opacity: '1' });
        });
    });
}

// });



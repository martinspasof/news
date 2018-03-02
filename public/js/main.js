$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


$(document).ready(function() {


    // replace text UnyQTV

    document.body.innerHTML = document.body.innerHTML.replace(/UnyQTV/g, '<span>UnyQ</span><strong>TV</strong>');
    document.body.innerHTML = document.body.innerHTML.replace(/UNYQTV/g, '<span>UnyQ</span><strong>TV</strong>');


    $('.navbar-nav a').on('click', function() {
        $("a.activeLink").removeClass("activeLink")
        $(this).addClass("activeLink");
    });

    // Add scrollspy to <body>
    $('body').scrollspy({
        target: ".navbar",
        offset: 50
    });

    // Add smooth scrolling on all links inside the navbar
    $("#myNavbar a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 30
            }, 800, function() {
                if ($(window).width() < 768) {
                    $('.navbar-toggle').click();
                }
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});


window.onload = function() {
    var targets = $('.tvLogo>img'),
        target = false,
        tooltip = false,
        title = false;

    targets.bind('mouseenter', function() {
        var cD = {},
            tip = '';
        target = $(this);
        tooltip = $('<div id="tooltip"></div>');

        cD.ch = target.attr('alt') || '';
        cD.cutv = target.data('cutv') * 1;
        cD.stovr = target.data('stovr') * 1;
        cD.npvr = target.data('npvr') * 1;
        cD.dual = target.data('dual');

        if (cD.ch) {
            if (cD['cutv'] || cD['stovr'] || cD['npvr'] || cD['dual']) {
                tip += '<div class="funcTitle">' + cD['ch'] + '</div>';
                if (cD['cutv']) {
                    tip += '<div class="funcCutvPossible">Функция за връщане назад' + ((cD['cutv'] == 12) ? ' до 48ч.' : '') + '</div>';
                }
                if (cD['stovr']) {
                    tip += '<div class="funcStovrPossible">Функция за гледане отначало</div>';
                }
                if (cD['npvr']) {
                    tip += '<div class="funcNpvrPossible">Функция за запис</div>';
                }
                if (cD['dual']) {
                    tip += '<div class="funcDualAudio">Функция двуезично аудио</div>';
                }
            }
        }

        if (!tip || tip == '') return false;

        target.removeAttr('title');
        tooltip.css('opacity', 0).html(tip).appendTo('body');

        var init_tooltip = function() {
            if ($(window).width() < tooltip.outerWidth() * 1.5)
                tooltip.css('max-width', $(window).width() * 2 / 3);
            else
                tooltip.css('max-width', 340);

            var pos_left = target.offset().left + (target.outerWidth() / 2) - (tooltip.outerWidth() / 2),
                pos_top = target.offset().top - tooltip.outerHeight() - 25;

            if (pos_left < 0) {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass('left');
            } else
                tooltip.removeClass('left');

            if (pos_left + tooltip.outerWidth() > $(window).width()) {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass('right');
            } else
                tooltip.removeClass('right');

            if (pos_top < 0) {
                var pos_top = target.offset().top + target.outerHeight();
                tooltip.addClass('top');
            } else
                tooltip.removeClass('top');

            tooltip.css({
                    left: pos_left,
                    top: pos_top
                })
                .animate({
                    top: '+=10',
                    opacity: 1
                }, 50);
        };

        init_tooltip();
        $(window).resize(init_tooltip);

        var remove_tooltip = function() {
            tooltip.animate({
                top: '-=10',
                opacity: 0
            }, 50, function() {
                $(this).remove();
            });
            //target.attr('title', tip);
        };

        target.bind('mouseleave', remove_tooltip);
        tooltip.bind('click', remove_tooltip);
        $(window).bind("scroll", remove_tooltip);
    });

}



$(document).ready(function() {

    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
    });

    $('.to-top-link-faq a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    $('#accordion').on('shown.bs.collapse', function() {

        var panel = $(this).find('.glyphicon-chevron-up');

        $('html, body').animate({
            scrollTop: panel.offset().top - 200
        }, 500);

    });


});

 

$(document).ready(function() {
 $(".forgot-form").hide();

$('.forgot-password').on('click', function() {
  
    $(".login-form").hide();
    $(".forgot-form").fadeIn(500);
});
});

$(document).ready(function() {
$('.forgot-password-back').on('click', function() {
    $(".forgot-form").hide();
    $(".login-form").fadeIn(500);
});
});


$(document).ready(function() {
 $('.contract_code').fadeOut(1);

$('#selectbasic').change(function() {
    if ($(this).val() != null) {
       $('.contract_code').fadeIn(500);
    }
});
});


$(document).ready(function() {

//register
$(".spinner").hide();

$(".modal-register-login").hide();
$(".modal-register-finnish").hide();
$(".activation-form-finnish").hide();
$(".contract_code_required_alert").hide();

var name, family, phone, email, identifier, idCode, password, passowrd2, operatorId, registerCodeAjax, subscriberEmailCheck, tos;
// register modalssssss
$(".modal-register-btn").attr('disabled',true);

$("#selectbasic").on('change',function(e){
 e.preventDefault(e);
        $('#selectbasic option').each(function() {
            if (this.selected) {
                operatorId = $(this).val();
                identifier = $(this).attr('data-identifier');
               $(".modal-register-btn").attr('disabled',false);
               $(".identifier-text").html(identifier);
            }
        });

});



$('.modal-register-btn').on('click', function() {
    if( $("#contract_codes").val() != '' ) {

     registerCodeCheckAjax($("#contract_codes").val(), operatorId);
    }
    else {
     $(".alert-contract-code").fadeIn(300).delay(1618).fadeOut('slow');
    }
});


$('.modal-register-btn2').on('click', function() {


    if( $("#email-register").val() != '' ) {
        
        name = $('#name').val();
        family = $('#family').val();
        phone = $('#phone').val();
        password = $('#password-register').val();
        password2 = $('#password-register2').val();

        if( $('#tos').is(":checked") == true) {
            if( password.length < 6 ) {
                $(".alert-password").fadeIn(300).delay(1618).fadeOut('slow');
            }
            else if( password == password2 ) {
                subscriberEmailCheck($("#email-register").val(), operatorId);
            }
            else {
                $(".alert-password-duplicate").fadeIn(300).delay(1618).fadeOut('slow');
            }
        }
        else {
            $(".alert-tos").fadeIn(300).delay(1618).fadeOut('slow');
        }

    }
    else {
        $(".alert-email").fadeIn(300).delay(1618).fadeOut('slow');
    }

    


});

$('.activation-btn').on('click', function() {

    if( $("#email-activation").val() != '' && $("#password-activation").val() != '' ) {
        
        email = $('#email-activation').val();
        password = $('#password-activation').val();

                subscriberLoginAjax(email, password);
      

    }
    else {
        $(".alert-activation").fadeIn(300).delay(1618).fadeOut('slow');
    }

    


});

registerCodeCheckAjax = function(identifierCode, operatorIdCode){

    $(".spinner").show();
    $(".modal-register-btn").attr('disabled',true);

    idCode = identifierCode;

    $.ajax({
        method: 'post',
        url: 'http://145.255.200.121/unyqtv/index.php/dapi/registerCodeCheck',
        data: { code : identifierCode, operatorId : operatorIdCode },
        success: function(response){

            $(".spinner").hide();
            $(".modal-register-btn").attr('disabled',false);

            if(response == 0) {
                $(".alert-contract-code").fadeIn(300).delay(1618).fadeOut('slow');
            }
            else if(response == 1) {
                 $(".modal-register-code").hide();
                 $(".modal-register-login").fadeIn(1000);
            }

            console.log(response);
        },
        error: function(data){
            $(".alert-contract-code").fadeIn(300).delay(1618).fadeOut('slow');
        },

    });
    


}


subscriberEmailCheck = function(email, operatorIdCode){


    $(".spinner").show();
    $(".modal-register-btn2").attr('disabled',true);

    $.ajax({
        method: 'post',
        url: 'http://145.255.200.121/unyqtv/index.php/dapi/emailCheck',
        data: { email : email, operatorId : operatorIdCode, name : name, family : family, phone : phone, password : password, identifier: idCode },
        success: function(response){

            $(".spinner").hide();
            $(".modal-register-btn2").attr('disabled',false);

            if(response == 0) {
                $(".alert-email-duplicate").fadeIn(300).delay(1618).fadeOut('slow');
            }
            else if(response == 1) {
                 $(".modal-register-login").hide();
                 $(".modal-register-finnish").fadeIn(1000);
                 console.log();
            }

            // console.log(response);
        },
        error: function(data){
            $(".alert-email").fadeIn(300).delay(1618).fadeOut('slow');
        },

    });

}

subscriberLoginAjax = function(email, password){


    $(".spinner").show();
    $(".activation-btn").attr('disabled',true);

    $.ajax({
        method: 'post',
        url: 'http://145.255.200.121/unyqtv/index.php/dapi/subscriberLoginVerify',
        data: { email : email, password: password },
        success: function(response){

            $(".spinner").hide();
            $(".activation-btn").attr('disabled',false);
            console.log(response);
            if(response == 0) {
                $(".alert-email").fadeIn(300).delay(1618).fadeOut('slow');
            }
            else if(response == 1) {
                 $(".activation-form").hide();
                 $(".activation-form-finnish").fadeIn(1000);
            }

            // console.log(response);
        },
        error: function(data){
            $(".alert-email").fadeIn(300).delay(1618).fadeOut('slow');
        },

    });

}


 // tooltip
    $('.tip').tooltip();


});

function scrollerInit() {
    if ($(window).width() > 992) {
        var s = skrollr.init({
            smoothScrolling: true
        });
    }
};

$(function() {
    scrollerInit();
});

function setOffset() {
    $('.item').not('.visible-first').each(function(i) {
        var y = $(this),
            v = y.offset().top,
            w = $(window),
            x = w.scrollTop(),
            a = v - x < w.height(),
            z = v - x > -y.height();
        if (a && z || w >= $('section1, #section2').offset().top) {
            y.addClass('visible-first');
            if ($('[class*="progress"]').length) {
                if (y.find('>.item_content [class*="progress"]').length != 0 && !y.hasClass('animated')) { animateProgress(y) }
            }
        }
    })
}
setOffset();
$(window).scroll(setOffset)

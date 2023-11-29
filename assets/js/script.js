$(function() {
    // mobile nav
    let scroll = 0;

    function openNav() {
        $('header nav').toggleClass('mobile');
        $('header nav').css('display', 'flex').hide().fadeIn(200);
        if($(document).height() > $(window).height()) {
            scroll = $(window).scrollTop();
            setTimeout(function() {
                $('body').css('position', 'fixed');
                $('body').css('overflow-y', 'scroll');
            }, 200)
        }
    }

    function closeNav() {
        $('header nav').fadeOut(200);
        if($(document).height() > $(window).height()) {
            $('html, body').animate({ scrollTop: scroll }, 0);
            $('body').css('position', 'static');
            $('body').css('overflow-y', 'auto');
        }
        setTimeout(function() {
            $('header nav').toggleClass('mobile');
        }, 200);
    }

    var isNavOpen = false;
    $('.menu-toggle').click(function(e) {
        e.stopPropagation();
        $(this).toggleClass('active');

        isNavOpen = (isNavOpen) ? false : true;
        if(isNavOpen) {
            openNav();
        } else {
            closeNav();
        }
    })

    // click on the body to close the mobile nav
    $('header').click(function(e) {
        e.stopPropagation();
    })

    $('header nav').click(function(e) {
        e.stopPropagation();
    })

    $('body').click(function(e) {
        if(isNavOpen) {
            $('.menu-toggle').removeClass('active');
            closeNav();
            isNavOpen = false;
        }
    })

    // change header styles when scrolling
    $(window).on('scroll', function() {
        let scroll = $(window).scrollTop();
        if(scroll > 50) {
            $('header').addClass('scroll');
        } else if(scroll < 20) {
            $('header').removeClass('scroll');
        }
    })
})

$(function() {
    // mobile nav
    function openNav() {
        $('.background').fadeIn(200);
        $('header nav').toggleClass('mobile');
        $('header nav').fadeIn(200);
    }

    function closeNav() {
        $('.background').fadeOut(200);
        $('header nav').fadeOut(200);
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

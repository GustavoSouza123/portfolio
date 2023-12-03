$(function() {
    // include path
    const include_path = $('input[name="include_path"]').val();

    // mobile nav
    let scroll = 0;

    function openNav() {
        $('.menu-toggle').toggleClass('active');
        $('header nav').toggleClass('mobile');
        $('header nav').css('display', 'flex').hide().fadeIn(200);
    }

    function closeNav() {
        $('.menu-toggle').toggleClass('active');
        $('header nav').fadeOut(200);
        setTimeout(function() {
            $('header nav').toggleClass('mobile');
        }, 200);
    }

    var isNavOpen = false;
    $('.menu-toggle').click(function(e) {
        e.stopPropagation();
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

    // theme toggle
    let themeToggle = $('.theme-toggle');
    let theme = $('input[name="theme"]').val();

    function lightTheme() {
        $('html').removeClass('dark');
        themeToggle.removeClass('active');
        themeToggle.find('span').animate({ left: -5 }, 50, 'linear');
    }

    function darkTheme(animDelay) {
        $('html').addClass('dark');
        themeToggle.addClass('active');
        themeToggle.find('span').animate({ left: themeToggle.width()-themeToggle.find('span').width()+5 }, animDelay, 'linear');
    }

    if(theme == 'dark') {
        darkTheme(0);
    }

    themeToggle.click(function() {
        theme = (theme == 'light') ? 'dark' : 'light';

        if(theme == 'dark') {
            darkTheme(50);
        } else {
            lightTheme();
        }

        $('header .social a img').eq(0).attr('src', `${include_path}assets/images/github-${theme}.svg`);
        $('header .social a img').eq(1).attr('src', `${include_path}assets/images/linkedin-${theme}.svg`);
        $('header .social a img').eq(2).attr('src', `${include_path}assets/images/twitter-${theme}.svg`);

        document.cookie = `portfolioTheme=${theme}; expires=60*60*24; path=/`;
    })

    // languages
    let activeLanguage = 'en';
    $('header nav .languages > div').click(function() {
        activeLanguage = $(this).attr('language'); 
        $('header nav .languages > div').removeClass('active');
        $(`div[language="${activeLanguage}"]`).addClass('active');
        document.cookie = `activeLanguage=${activeLanguage}; expires=60*60*24; path=/`;

        $.ajax({
            url: include_path+`json/${activeLanguage}.json`,
            method: 'post',
            dataType: 'json'
        }).done(function(data) {
            document.cookie = `portfolioContent=${JSON.stringify(data)}; expires=60*60*24; path=/`;
            location.reload();
        });
    })

    // nav links
    $('nav.portfolio a').click(function(e) {
        e.preventDefault();
        let anchor = $(this).attr('target');

        $('html, body').animate({
            scrollTop: $(anchor).offset().top-50
        }, 500);
        $('nav.portfolio a').removeClass('active');
        $(this).addClass('active');

        if($('nav').hasClass('mobile')) {
            isNavOpen = (isNavOpen) ? false : true;
            if(!isNavOpen) {
                closeNav();
            }
       }

    })

    $(window).scroll(function() {
        setTimeout(function() {
            var windowOffY = $(window).scrollTop();
            var windowHeight = $(window).height();
            $('section').each(function() {
                var elOffY = $(this).offset().top;
                if(elOffY + $(this).height()/2 < (windowOffY + windowHeight)) {
                    var id = $(this).attr('id');
                    $('nav.portfolio a').removeClass('active');
                    $('nav.portfolio a[target="#'+id+'"]').addClass('active');
                    return;
                }
            })
        }, 10)
    })

    // resizing verification
    $(window).on('resize', function() {
        let width = $(this).width();
        if(width >= 800) {
            $('header nav').css('display', 'flex');
        } else {
            $('header nav').css('display', 'none');
        }
    })
})

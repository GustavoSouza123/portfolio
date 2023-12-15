$(window).on('load', function() {

    function animateOnScroll(el) {
        let windowOffY = $(window).scrollTop();
        let windowHeight = $(window).height();
        let elOffY = el.offset().top;
        let height = (el.height() > windowHeight) ? windowHeight : el.height();
        if(elOffY + height/2 < (windowOffY + windowHeight)) {
            el.addClass('show');
            return;
        }
    }

    $('section').each(function() {
        animateOnScroll($(this));
    })

    $(window).scroll(function() {
        $('section').each(function() {
            animateOnScroll($(this));
        })
    })
})

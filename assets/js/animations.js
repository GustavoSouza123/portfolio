$(window).on('load', function() {
    // function to animate an element
    function animate(el) {
        let windowOffY = $(window).scrollTop();
        let windowHeight = $(window).height();
        let elOffY = el.offset().top;
        let height = (el.height() > windowHeight) ? windowHeight : el.height();
        if(elOffY + height/2 < (windowOffY + windowHeight)) {
            el.addClass('show');
            return;
        }
    }

    // functions to animate dom elements
    function animateHeader() {
        $('header').addClass('show');
    }

    function animateSection() {
        $('section').each(function() {
            let section = $(this);
            setTimeout(function() {
                animate(section);
            }, 200);
        })
    }

    function animateProjects() {
        let project = $('.projects .project');
        for(let i = 0; i < project.length; i++) {
            setTimeout(function() {
                animate(project.eq(i));
            }, 500);
        }
    }

    function animateBlogPosts() {
        let post = $('.posts .post');
        for(let i = 0; i < post.length; i++) {
            setTimeout(function() {
                animate(post.eq(i)); 
            }, 500+(300*i));
        }
    }

    // animations on window loading
    animateHeader();
    animateSection();
    animateProjects();
    animateBlogPosts();

    // animations on scroll
    $(window).scroll(function() {
        animateHeader();
        animateSection();
        animateProjects();
        animateBlogPosts();
    })
})

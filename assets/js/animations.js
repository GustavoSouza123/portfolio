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
        setTimeout(function() {
            $('header').addClass('show');
        }, 300);
    }

    function animateSection() {
        $('section').each(function() {
            let section = $(this);
            animate(section);
        })
    }

    function animateProjects() {
        let project = $('.projects .project');
        for(let i = 0; i < project.length; i++) {
            setTimeout(function() {
                animate(project.eq(i));
            }, 200);
        }
    }

    function animateBlogPosts() {
        let post = $('.posts .post');
        for(let i = 0; i < post.length; i++) {
            setTimeout(function() {
                animate(post.eq(i)); 
            }, 200);
        }
    }

    function animateArticle() {
        setTimeout(function() {
            animate($('main.article .title').eq(0));
            animate($('main.article .thumbnail'));
            animate($('main.article .post-info'));
            animate($('main.article .post'));
        }, 200)
    }

    // animations on window loading
    animateHeader();
    setTimeout(function() { animateSection(); }, 500);
    animateProjects();
    animateBlogPosts();
    animateArticle();

    // animations on scroll
    $(window).scroll(function() {
        animateHeader();
        animateSection();
        animateProjects();
        animateBlogPosts();
        animateArticle();
    })
})

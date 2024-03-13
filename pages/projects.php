<!-- projects page -->

<main class="projects">
    <div class="content">
        <h1>My projects</h1>
    </div>
</main>

<script>
    const include_path = $('input[name="include_path"]').val();
    $('header nav').removeClass('portfolio');
    $('header ul li').eq(1).hide();
    $('header ul li').eq(3).hide();
    $('header ul li').eq(4).hide();
    $('header ul li').eq(0).find('a').removeClass('active');
    $('header ul li').eq(2).find('a').addClass('active');
    $('header ul li').eq(0).find('a').attr('href', include_path);
    $('header ul li').eq(2).find('a').attr('href', include_path);
    $('header ul li').eq(0).find('a').attr('target', '');
    $('header ul li').eq(2).find('a').attr('target', '');
</script>
<!-- projects page -->
<?php
    $projectsJson = file_get_contents(INCLUDE_PATH.'json/projects.json');
    $projects = json_decode($projectsJson);
?>

<main class="projects">
    <div class="content">
        <h1><?= $content->section3Title ?></h1>
        <div class="all-projects">
            <?php
            foreach($projects as $key => $project) {
								$target = $project->links->live !== '' ? '_blank' : '';
                echo '
                <div class="project">
                    <div class="image">
                    <a href="'.$project->links->live.'" target="'.$target.'"><img loading="lazy" src="'.INCLUDE_PATH.'assets/images/projects/'.$project->image.'" alt="'.$project->title.' image" /></a>
                    </div>
                    <div class="title"><a href="'.INCLUDE_PATH.'project?id='.$key.'">'.$project->title.'</a></div>
                    <div class="description">'.$project->description->$activeLanguage.'</div>
                </div>
            ';
            }
            ?>
        </div>
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
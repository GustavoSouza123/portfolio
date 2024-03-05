<!-- project page -->
<?php
    $projectId = isset($_GET['id']) ?$_GET['id'] : -1;
    $projectsJson = file_get_contents(INCLUDE_PATH.'json/projects.json');
    $projects = json_decode($projectsJson);
    $descriptions = array($content->photoGallery, $content->articlePreview, '');
?>

<main class="project">
    <div class="content">
        <?php
            if($projectId < 0 || $projectId > count($projects)) {
                echo 'Nenhum projeto encontrado';
            } else {
                $project = $projects[$projectId];
        ?>

        <h1><?= $project->title ?></h1>
        <div class="image">
            <a href="<?= $project->links->live ?>" target="_blank"><img loading="lazy" src="<?= INCLUDE_PATH.'assets/images/projects/'.$project->image ?>" alt="<?= $project->title.' image' ?>" /></a>
        </div>
        <div class="description">
            <p><?= $descriptions[$projectId] ?></p>
        </div>
        <div class="technologies">
        <?php
            foreach($project->technologies as $index => $tech) {
                echo '<img class="'.$tech.'" src="'.INCLUDE_PATH.'assets/images/technologies/'.$tech.'.svg" alt="'.$tech.' logo" />';
            }
        ?>
        </div>

        <?php } ?>
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
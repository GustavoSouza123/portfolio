<!-- home page -->
<main>
    <section id="<?= stripAccents($content->nav1) ?>">
        <div class="content">
            <div class="info">
                <p class="hello"><?= $content->section1Title ?></p>
                <h1 class="name">Gustavo Souza</h1>
                <p class="subtitle"><?= $content->section1Subtitle ?></p>
                <div class="buttons">
                    <button class="<?= stripAccents($content->nav3) ?>"><?= $content->section1ProjectsBtn ?></button>
                    <button class="<?= stripAccents($content->nav5) ?>"><?= $content->section1ContactBtn ?></button>
                </div>
            </div>
            <div class="scroll">
                <img src="<?= INCLUDE_PATH ?>assets/images/arrows-down-<?= $theme ?>.svg" alt="Scroll down" />
            </div>
        </div>
    </section>

    <section id="<?= stripAccents($content->nav2) ?>">
        <div class="content">
            <h1><?= $content->section2Title ?></h1>
            <div class="about-content">
                <div class="info">
                    <?= $content->about ?>
                </div>
                <div class="image">
                    <div class="image-container">
                        <img loading="lazy" src="<?= INCLUDE_PATH ?>assets/images/me-<?= $theme ?>.png" alt="My photo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="<?= stripAccents($content->nav3) ?>">
        <div class="content">
            <h1><?= $content->section3Title ?></h1>
            <div class="projects">
                <?php
                    $projectsJson = file_get_contents(INCLUDE_PATH.'json/projects.json');
                    $projects = json_decode($projectsJson);
                    $descriptions = array($content->photoGallery, $content->articlePreview, '');
                    foreach($projects as $key => $project) {
                        echo '
                        <div class="project">
                            <div class="info">
                                <div class="top">
                                    <div class="title">'.$project->title.'</div>
                                    <a href="project?id='.$key.'"><img src="'.INCLUDE_PATH.'assets/images/info-'.$theme.'.svg" alt="More informations" /></a>
                                </div>
                                <div class="description">
                                    <p> '.$descriptions[$key].' </p>
                                </div>
                                <div class="bottom">
                                    <div class="technologies">
                        ';
                        foreach($project->technologies as $index => $tech) {
                            echo '<img class="'.$tech.'" src="'.INCLUDE_PATH.'assets/images/technologies/'.$tech.'.svg" alt="'.$tech.' logo" />';
                        }
                        echo '</div>';
                        echo '<div class="links">
                                        <a href="'.$project->links->live.'" target="_blank"><img src="'.INCLUDE_PATH.'assets/images/live-'.$theme.'.svg" alt="Live link" />Live</a>
                                        <a href="'.$project->links->source.'" target="_blank"><img src="'.INCLUDE_PATH.'assets/images/source-'.$theme.'.svg" alt="Source link" />Source</a>
                                    </div>
                                </div>
                            </div>
                            <div class="image">
                                <a href="'.$project->links->live.'" target="_blank"><img loading="lazy" src="'.INCLUDE_PATH.'assets/images/projects/'.$project->image.'" alt="Article preview component project image" /></a>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </section>

    <section id="<?= stripAccents($content->nav4) ?>">
        <div class="content featured">
            <h1><?= $content->section4Title ?></h1>
            <div class="posts">
                <?php
                $sql = $pdo->prepare("SELECT * FROM `tb_posts` WHERE published = 1 AND featured = 1");
                $sql->execute();
                if($sql->rowCount() == 0) {
                    echo '<div class="no-post">Nenhum post encontrado</div>';
                } else {
                    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
                    foreach($posts as $key => $value) {
                        $sql = $pdo->prepare("SELECT `name` FROM `tb_categories` WHERE id = ?");
                        $sql->execute(array($value['category_id']));
                        $category = $sql->fetchColumn();
                        echo '
                        <div class="post">
                            <div class="image">
                                <img loading="lazy" src="'.INCLUDE_PATH_BLOG.'admin/'.$value['thumbnail'].'" alt="" />
                            </div>
                            <div class="content">
                                <div class="title">'.$value['title'].'</div>
                                <div class="subtitle">'.$value['subtitle'].'</div>
                                <div class="read-more"><a href="'.INCLUDE_PATH_BLOG.'article?id='.$value['id'].'">Ler mais</a></div>
                                <div class="category">'.$category.'</div>
                            </div>
                        </div>
                        ';
                    }
                }
            ?>
            </div>
            <div class="blog-link">
                <a href="<?= INCLUDE_PATH_BLOG ?>"><?= $content->section4SeeAll ?></a>
            </div>
        </div>
    </section>

    <section id="<?= stripAccents($content->nav5) ?>">
        <div class="content">
            <h1><?= $content->section5Title ?></h1>
            <div class="contact">
                <form method="post" action="">
                    <input type="text" name="name" placeholder="<?= $content->section5Name ?>" />
                    <input type="email" name="email" placeholder="<?= $content->section5Email ?>" />
                    <textarea name="message" placeholder="<?= $content->section5Message ?>"></textarea>
                    <input type="submit" name="submit" value="<?= $content->section5Submit ?>" />
                </form>
            </div>
        </div>
    </section>
</main>
<?php
    require 'config/config.php';

    // get website content 
    $activeLanguage = (isset($_COOKIE['activeLanguage'])) ? $_COOKIE['activeLanguage'] : 'en';
    $json = file_get_contents(INCLUDE_PATH.'json/'.$activeLanguage.'.json');
    $content = json_decode($json);
    setcookie('portfolioContent', $json, time()+60*60*24, '/');

    // strip accents from a string
    function stripAccents($str){
        $newStr = strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
        return strtolower($newStr);
    }

    // website theme
    $theme = (isset($_COOKIE['portfolioTheme'])) ? $_COOKIE['portfolioTheme'] : 'light';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website"> <!-- seo -->
    <meta name="keywords" content="palavras,chave,do,meu,website"> <!-- seo -->
    <!-- css -->
    <style>
        .hidden {
            visibility: hidden;
            background: <?php if($theme == 'dark') echo '#222'; else echo '#fff'; ?>;
        }
    </style>
    <link rel="icon" type="image/x-icon" href=""> <!-- website icon -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>assets/css/style.css" /> <!-- main css file -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>assets/css/header.css" /> <!-- header css file -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>assets/css/footer.css" /> <!-- footer css file -->
    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <script>
        // page loading
        /*$(window).on('load', function() {
            $('.loading').fadeOut(200);
        })*/

        $('html').addClass('hidden')
        $(window).on('load', function() {
            $('header nav .languages div').css('transition', '.2s');
            $('header nav ul li a').css('transition', '.2s');
            $('html').removeClass('hidden');
        })
    </script>
    <title>Portfólio | Gustavo Souza</title>
</head>
<body>
    <?php include 'pages/header.php'; ?>

    <!-- include path -->
    <input type="hidden" name="include_path" value="<?= INCLUDE_PATH; ?>" />

    <!-- website theme -->
    <input type="hidden" name="theme" value="<?= $theme ?>" />

    <!-- loading container -->
    <div class="loading">
        <img src="<?= INCLUDE_PATH ?>assets/images/loading-<?= $theme ?>.svg" alt="loading spinner" />
    </div>

    <!-- content -->
    <main>
        <section id="<?= stripAccents($content->nav1) ?>">
            <div class="content">
                <div class="info">
                    <p class="hello"><?= $content->section1Title ?></p>
                    <h1 class="name">Gustavo Souza</h1>
                    <p class="subtitle"><?= $content->section1Subtitle ?></p>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu accumsan velit, sit amet porta ipsum. Aenean sit amet est a quam ultricies tempor et ut mi. Curabitur odio massa, sollicitudin sodales massa sit amet, varius fringilla sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eget pharetra orci. Donec at posuere neque. Suspendisse lacinia, elit a ultricies condimentum, quam neque luctus odio, et facilisis nisi orci ut purus. Sed fermentum dolor mi, eget porttitor augue consectetur lobortis. Mauris aliquam et odio in pulvinar. Phasellus vitae mauris vitae ante placerat tempor et eu nunc. Integer quis magna pellentesque, molestie arcu in, porta orci.</p>

                        <p>Nunc lacinia facilisis erat, cursus blandit elit. In varius lobortis aliquet. Vivamus massa enim, tempus ut orci sit amet, varius interdum turpis. Etiam quam quam, venenatis vel accumsan non, commodo vel felis. Nullam vitae velit diam. Donec facilisis, mauris at pulvinar efficitur, est sapien vestibulum augue, id congue ipsum ante quis ante. Sed a nunc tortor. Pellentesque dolor dui, mattis non gravida a, sodales in dui. Pellentesque dignissim nunc sed vestibulum feugiat. Nunc ac mi sapien. Donec ultricies sed justo sed commodo. Mauris non lorem eget tellus imperdiet ornare. Sed eu sem velit. Vestibulum posuere urna mi, ut fermentum velit dapibus lobortis.</p>
                    </div>
                    <div class="image">
                        <div class="image-container">
                            <img src="<?= INCLUDE_PATH ?>assets/images/me.png" alt="My photo" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="<?= stripAccents($content->nav3) ?>">
            <div class="content">
                <h1><?= $content->section3Title ?></h1>
                <div class="projects">
                    <?php for($i = 0; $i < 3; $i++) { ?>
                    <div class="project">
                        <div class="info">
                            <div class="title">My first project</div>
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu accumsan velit, sit amet porta ipsum. Aenean sit amet est a quam ultricies tempor et ut mi.</p>
                            </div>
                            <div class="bottom">
                                <div class="technologies">
                                    <img src="assets/images/github-dark.svg" alt="Technology" />
                                    <img src="assets/images/github-dark.svg" alt="Technology" />
                                    <img src="assets/images/github-dark.svg" alt="Technology" />
                                    <img src="assets/images/github-dark.svg" alt="Technology" />
                                </div>
                                <div class="links">
                                    <a href=""><img src="<?= INCLUDE_PATH ?>assets/images/live-<?= $theme ?>.svg" alt="Live" />Live</a>
                                    <a href="https://github.com/GustavoSouza123"><img src="<?= INCLUDE_PATH ?>assets/images/source-<?= $theme ?>.svg" alt="Source" />Source</a>
                                </div>
                            </div>
                        </div>
                        <div class="image">
                            <img src="https://lipsum.app/id/13/1600x900" alt="Project image" />
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section id="<?= stripAccents($content->nav4) ?>">
            <div class="content">
                <h1><?= $content->section4Title ?></h1>
                <a href="<?= INCLUDE_PATH_BLOG ?>"><?= $content->section4SeeAll ?></a>
            </div>
        </section>

        <section id="<?= stripAccents($content->nav5) ?>">
            <div class="content">
                <h1><?= $content->section5Title ?></h1>

            </div>
        </section>
    </main>

    <?php include 'pages/footer.php'; ?>

    <script src="<?= INCLUDE_PATH; ?>assets/js/script.js"></script> <!-- main javascript file -->
</body>
</html>

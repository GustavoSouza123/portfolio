<header>
    <div class="content">
        <div class="social">
            <a href="https://github.com/GustavoSouza123" target="_blank"><img src="<?= INCLUDE_PATH; ?>assets/images/github-<?= $theme ?>.svg" alt="Github logo" /></a>
            <a href="https://www.linkedin.com/in/gustavo-souza-316003272/" target="_blank"><img src="<?= INCLUDE_PATH; ?>assets/images/linkedin-<?= $theme ?>.svg" alt="LinkedIn logo" /></a>
            <a href="https://twitter.com/gustavosouza456" target="_blank"><img src="<?= INCLUDE_PATH; ?>assets/images/twitter-<?= $theme ?>.svg" alt="Twitter logo" /></a>
        </div>
        <nav class="portfolio">
            <div class="theme-toggle">
                <a class="disabled" href="">
                    <span></span>
                </a>
            </div>
            <div class="languages">
                <div language="en" <?php if($activeLanguage == 'en') echo 'class="active"'; ?>><a class="disabled" href="">EN</a></div>
                <div language="pt-br" <?php if($activeLanguage == 'pt-br') echo 'class="active"'; ?>><a class="disabled" href="">PT-BR</a></div>
            </div>
            <ul>
                <li><a href="" target="<?= '#'.stripAccents($content->nav1) ?>" class="active" ><?= $content->nav1 ?></a></li>
                <li><a href="" target="<?= '#'.stripAccents($content->nav2) ?>"><?= $content->nav2 ?></a></li>
                <li><a href="" target="<?= '#'.stripAccents($content->nav3) ?>"><?= $content->nav3 ?></a></li>
                <li><a href="" target="<?= '#'.stripAccents($content->nav4) ?>"><?= $content->nav4 ?></a></li>
                <li><a href="" target="<?= '#'.stripAccents($content->nav5) ?>"><?= $content->nav5 ?></a></li>
            </ul>
        </nav> 
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>

<header>
    <div class="content">
        <div class="social">
            <a href="https://github.com/GustavoSouza123" target="_blank"><img src="<?= INCLUDE_PATH; ?>assets/images/github.svg" alt="Github logo" /></a>
            <a href="https://www.linkedin.com/in/gustavo-souza-316003272/" target="_blank"><img src="<?= INCLUDE_PATH; ?>assets/images/linkedin.svg" alt="LinkedIn logo" /></a>
            <a href="https://twitter.com/gustavosouza456" target="_blank"><img src="<?= INCLUDE_PATH; ?>assets/images/twitter.svg" alt="Twitter logo" /></a>
        </div>
        <nav>
            <div class="languages">
                <div language="en" <?php if($_COOKIE['activeLanguage'] == 'en') echo 'class="active"'; ?>>EN</div>
                <div language="pt-br" <?php if($_COOKIE['activeLanguage'] == 'pt-br') echo 'class="active"'; ?>>PT-BR</div>
            </div>
            <ul>
                <li><a class="active" href="<?= INCLUDE_PATH; ?>"><?= $content->nav1 ?></a></li>
                <li><a href="<?= INCLUDE_PATH.'#'.stripAccents($content->nav2) ?>"><?= $content->nav2 ?></a></li>
                <li><a href="<?= INCLUDE_PATH.'#'.stripAccents($content->nav3) ?>"><?= $content->nav3 ?></a></li>
                <li><a href="<?= INCLUDE_PATH.'#'.stripAccents($content->nav4) ?>"><?= $content->nav4 ?></a></li>
                <li><a href="<?= INCLUDE_PATH.'#'.stripAccents($content->nav5) ?>"><?= $content->nav5 ?></a></li>
            </ul>
        </nav> 
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>

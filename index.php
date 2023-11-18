<?php require 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website"> <!-- seo -->
    <meta name="keywords" content="palavras,chave,do,meu,website"> <!-- seo -->
    <link rel="icon" type="image/x-icon" href=""> <!-- website icon -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/style.css" /> <!-- css file -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <title>Portfólio | Gustavo Souza</title>
</head>
<body>
    <header>
        <div class="social">
            <a href="https://github.com/GustavoSouza123" target="_blank"><img src="<?php echo INCLUDE_PATH; ?>assets/images/github.svg" alt="Github logo" /></a>
            <a href="https://www.linkedin.com/in/gustavo-souza-316003272/" target="_blank"><img src="<?php echo INCLUDE_PATH; ?>assets/images/linkedin.svg" alt="LinkedIn logo" /></a>
            <a href="https://twitter.com/gustavosouza456" target="_blank"><img src="<?php echo INCLUDE_PATH; ?>assets/images/twitter.svg" alt="Twitter logo" /></a>
        </div>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Portfolio</a></li>
                <li><a href="blog/">Blog</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav> 
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <main><h1>Em construção!</h1></main>

    <footer></footer>

    <script src="<?php echo INCLUDE_PATH; ?>assets/js/script.js"></script> <!-- main js file -->
</body>
</html>

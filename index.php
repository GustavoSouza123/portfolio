<?php
    require 'config/config.php';

    // get website content 
    $activeLanguage = (isset($_COOKIE['activeLanguage'])) ? $_COOKIE['activeLanguage'] : 'en';
    $json = file_get_contents(INCLUDE_PATH.'json/'.$activeLanguage.'.json');
    $content = json_decode($_COOKIE['portfolioContent']);
    setcookie('portfolioContent', $json, time()+60*60*24, '/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website"> <!-- seo -->
    <meta name="keywords" content="palavras,chave,do,meu,website"> <!-- seo -->
    <link rel="icon" type="image/x-icon" href=""> <!-- website icon -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>assets/css/header.css" /> <!-- header css file -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>assets/css/style.css" /> <!-- main css file -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>assets/css/footer.css" /> <!-- footer css file -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <title>Portfólio | Gustavo Souza</title>
</head>
<body>
    <?php include 'pages/header.php'; ?>

    <!-- include path -->
    <input type="hidden" name="include_path" value="<?= INCLUDE_PATH; ?>" />
    
    <main>
        <div class="content">
            <h1><?= $content->construction ?></h1>
        </div>
    </main>

    <?php include 'pages/footer.php'; ?>

    <script src="<?= INCLUDE_PATH; ?>assets/js/script.js"></script> <!-- main javascript file -->
</body>
</html>

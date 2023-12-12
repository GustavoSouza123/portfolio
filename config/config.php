<?php
    /* path variables */
    define('INCLUDE_PATH', 'http://localhost/portfolio/');
    define('INCLUDE_PATH_BLOG', 'http://localhost/blog/');

    /* database connection variables */
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DATABASE', 'my_blog');

    require 'connection.php';

    /* smtp variables */
    define('SMTP_HOST', 'sandbox.smtp.mailtrap.io');
    define('SMTP_USERNAME', 'f7cdfe30941438');
    define('SMTP_PASSWORD', 'deb2ecd305f70d');

    /* autoload classes */
    $autoload = function($class) {
        require_once('../classes/'.$class.'.php');
    };
    spl_autoload_register($autoload);
?>

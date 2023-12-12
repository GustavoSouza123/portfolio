<?php
    try {
        $pdo = new PDO('mysql:host='.DB_HOST, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('USE `'.DATABASE.'`');
    } catch(PDOException $e) {
        echo '<h2>Erro ao conectar no banco de dados.</h2>'.$e->getMessage();
    }
?>

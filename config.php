<?php
    define('USER', 'id17860668_logistikon');
    define('PASSWORD', '#boi&kI8%%c1z_\F');
    define('HOST', 'localhost');
    define('DATABASE', 'id17860668_esp8266');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
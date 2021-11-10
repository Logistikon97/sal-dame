<?php
/*CONECTA CON LA BASE DE DATOS. LA INFORMACIÓN QUE NESECITA ES EL USUARIO, CONTRASEÑA, HOST, NOMBRE DE BD */
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'ssaludo_online');
    //si no se logra conectar muestra la información del error.
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
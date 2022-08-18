<?php

    require_once 'global.php';

    $user = $_ENV['USER_DB'];
    $password = $_ENV['PASS_DB'];
    $database = $_ENV['NAME_DB'];
    $host = $_ENV['HOST_DB'];
    $port = '3306';

    $mysqli = new mysqli($host, $user, $password, $database, $port);

    if($mysqli->error){
        die("Falha ao conectar com o banco de dados");
    }

?>
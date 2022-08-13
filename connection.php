<?php

    $user = 'root';
    $password = '';
    $database = 'playhouse';
    $host = 'localhost';

    $mysqli = new mysqli($host, $user, $password, $database);

    if($mysqli->error){
        die("Falha ao conectar com o banco de dados");
    }

?>
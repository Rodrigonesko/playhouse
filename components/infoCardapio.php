<?php
session_start();
ob_start();
require_once '../connection.php';
require_once '../php/include/functions.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $select = $mysqli->query("SELECT * FROM cardapio_festa WHERE id_festa = '$id'");

    $row = $select->fetch_assoc();

    $tipoFesta = $row['tipo_festa'];

    if($tipoFesta == 'week'){
        include 'infoCardapioWeek.php';
    }

    if($tipoFesta == 'light'){
        include 'infoCardapioLight.php';
    }

    if($tipoFesta == 'play'){
        include 'infoCardapioPlay.php';
    }

    if($tipoFesta == 'house'){
        include 'infoCardapioHouse.php';
    }

}
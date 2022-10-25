<?php
session_start();
ob_start();
require_once '../../connection.php';
require_once '../include/functions.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];

if (isset($_GET['id'])) {

    $nome = $_GET['nome'];
    $idade = $_GET['idade'];
    $id = $_GET['id'];

    $mysqli->query("UPDATE controle_entrada SET nome_convidado = '$nome', idade='$idade' WHERE id='$id'");

    echo 'ok';

}

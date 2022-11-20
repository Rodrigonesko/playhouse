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

if(isset($_POST['adicionar-item'])){
    $item = $_POST['item'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    $result = $mysqli->prepare("INSERT INTO inventario (item, quantidade, categoria) VALUES (?,?,?)");
    $result->bind_param("sss", $item, $quantidade, $categoria);
    $result->execute();
    $_SESSION['msg'] = "<p class='success'>Novo item criado com sucesso!</p>";
    header("Location: ../../inventario.php");

}
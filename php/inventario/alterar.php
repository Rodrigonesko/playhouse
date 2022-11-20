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

if (isset($_POST['salvar'])) {
    $id = $_GET['id'];
    $select = $mysqli->query("SELECT * FROM inventario WHERE id='$id'");
    $row = $select->fetch_assoc();
    $item = $row['item'];
    $quantidadeBanco = $row['quantidade'];
    $quantidadeAlterada = $_POST['alterar-valor'];
    $novaQuantidade = $quantidadeBanco + $quantidadeAlterada;

    $update = $mysqli->prepare("UPDATE inventario SET quantidade = ? WHERE id = ?");
    $update->bind_param("si", $novaQuantidade, $id);
    $update->execute();
    $_SESSION['msg'] = "<p class='success'>Item: $item alterado sua quantidade com sucesso!</p>";
    header("Location: ../../inventario.php");

}

if(isset($_POST['excluir'])){
    $id = $_GET['id'];
    
    $delete = $mysqli->prepare("DELETE FROM inventario WHERE id=?");
    $delete->bind_param('i', $id);
    $delete->execute();
    $_SESSION['msg'] = "<p class='success'>Item: deletado com sucesso!</p>";
    header("Location: ../../inventario.php");
}

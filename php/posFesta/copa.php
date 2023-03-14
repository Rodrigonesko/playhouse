<?php

session_start();
ob_start();
require_once '../../connection.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];
if (!$adm) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa ser administrador para acessar este Painel!</p>";
    header("Location: dashboard.php");
}

if (isset($_POST['adicionar'])) {
    $id = $_GET['id_festa'];
    $item = $_POST['copa_item'];
    $quantidade = $_POST['copa_quantidade'];
    $categoria = 'Copa';

    $insert = $mysqli->prepare("INSERT INTO gastos_extras (id_festa, item, quantidade, categoria) VALUES (?,?,?,?)");
    $insert->bind_param('isss', $id, $item, $quantidade, $categoria);
    $insert->execute();

    if ($insert->affected_rows > 0) {
        $_SESSION['msg'] = "<p class='success'>Item adicionado com sucesso!</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$id");
    } else {
        $_SESSION['msg'] = "<p class='warning'>Algo deu errado</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$id");
    }
}

if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $idFesta = $_GET['id_festa'];

    $delete = $mysqli->prepare("DELETE FROM gastos_extras WHERE id=?");
    $delete->bind_param('i', $id);
    $delete->execute();

    if ($delete->affected_rows > 0) {
        $_SESSION['msg'] = "<p class='success'>Item deletado com sucesso!</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$idFesta");
    } else {
        $_SESSION['msg'] = "<p class='warning'>Algo deu errado</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$idFesta");
    }
}

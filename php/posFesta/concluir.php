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

if (isset($_POST['concluir'])) {
    $id = $_GET['id'];
    $concluido = 2;

    $update = $mysqli->prepare("UPDATE festas SET concluido = ? WHERE id=?");
    $update->bind_param('ii', $concluido, $id);
    $update->execute();

    if ($update->affected_rows > 0) {
        $_SESSION['msg'] = "<p class='success'>Pós festa concluido com sucesso!</p>";
        header("Location: ../../posFesta.php");
    } else {
        $_SESSION['msg'] = "<p class='warning'>Algo deu errado</p>";
        header("Location: ../../posFesta.php");
    }
}

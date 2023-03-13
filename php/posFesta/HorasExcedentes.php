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

if (isset($_POST['adicionar_horas'])) {
    $id = $_GET['id'];
    $horasExcedentes = $_POST['horas_excedentes'];
    $valorHorasExcedentes = $_POST['valor_horas_excedentes'];

    $update = $mysqli->prepare("UPDATE festas SET horas_excedentes=?, valor_horas_excedentes=? WHERE id=?");
    $update->bind_param('ssi', $horasExcedentes, $valorHorasExcedentes, $id);
    $update->execute();

    if ($update->affected_rows > 0) {
        $_SESSION['msg'] = "<p class='success'>Festa cadastrada com sucesso!</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$id");
    } else {
        $_SESSION['msg'] = "<p class='warning'>Algo deu errado</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$id");
    }
}

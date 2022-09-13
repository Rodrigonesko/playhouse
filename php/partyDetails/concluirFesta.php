<?php
session_start();
ob_start();
require_once '../../connection.php';
require_once '../../php/include/functions.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];

if (isset($_POST['concluir'])) {

    $id = $_POST['concluir'];
    $concluiu = 1;

    $update = $mysqli->prepare("UPDATE festas SET concluido=? WHERE id=?");
    $update->bind_param('ii', $concluiu, $id);
    $update->execute();

    $_SESSION['msg'] = "<p class='success'>Festa concluida com sucesso!</p>";

    header("Location: ../../partyDetails.php?id=$id");

}

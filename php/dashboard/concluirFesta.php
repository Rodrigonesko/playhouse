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
error_reporting(0);

if($_POST['concluir-festa']){
        $id = $_POST['concluir-festa'];
        $concluiu = 1;

        $update = $mysqli->prepare("UPDATE festas SET concluido=? WHERE id=?");
        $update->bind_param('ii', $concluiu, $id);
        $update->execute();

        $insert = $mysqli->prepare("INSERT INTO gastos_extras (id_festa) VALUES (?)");
        $insert->bind_param('i', $id);
        $insert->execute();

        $_SESSION['msg'] = "<p class='success'>Festa $id concluida com sucesso!</p>";

        header("Location: ../../dashboard.php");
}
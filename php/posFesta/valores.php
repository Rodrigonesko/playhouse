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

if (isset($_POST['salvar'])) {
    $id = $_GET['id'];
    $valor = $_POST['valor'];
    $valorPago = $_POST['valor_pago'];
    $valorExcedente = $_POST['valor_excedente'];

    echo $valor, $valorPago, $valorExcedente;

    $update = $mysqli->prepare("UPDATE festas SET valor=?, valor_pago=?, valor_excedente=? WHERE id=?");
    $update->bind_param("sssi", $valor, $valorPago, $valorExcedente, $id);
    $update->execute();

    if ($update->affected_rows > 0) {
        $_SESSION['msg'] = "<p class='success'>Valores atualizados com sucesso!</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$id");
    } else {
        $_SESSION['msg'] = "<p class='warning'>Algo deu errado</p>";
        header("Location: ../../pos-festa-detalhes.php?id=$id");
    }
}

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
    $id = $_GET['id'];
    $valorAdicionado = $_POST['valorAdicionado'];
    $status = 'A pagar';

    $select = $mysqli->query("SELECT * FROM festas WHERE id='$id'");
    $row = $select->fetch_assoc();

    if(!$row['valor_pago']){
        $row['valor_pago'] = 0;
    }

    $novoValorPago = $row['valor_pago'] + $valorAdicionado;

    if ($novoValorPago > 0) {
        $status = 'Pré pago';
    }

    if ($novoValorPago >= $row['valor']) {
        $status = 'Pago';
    }


    $insert = $mysqli->prepare("UPDATE festas SET valor_pago=?, status=? WHERE id=?");
    $insert->bind_param('ssi', $novoValorPago, $status, $id);
    $insert->execute();

    if ($insert->affected_rows != 0) {
        echo 'alterado';
    } else {
        echo 'não alterado';
    }
}

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

date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['cadastrar'])) {
    $dados = [
        $id = $_GET['id'],
        $nome = $_POST['nome'],
        $telefone = $_POST['telefone'],
        $idade = $_POST['idade'],
        $data = date('Y-m-d H:i:s'),
        $cpf = $_POST['cpf']
    ];

    $insert = $mysqli->prepare("INSERT INTO controle_entrada (id_festa, nome_convidado, telefone, idade, data, cpf) VALUES (?,?,?,?,?,?)");
    $insert->execute($dados);

    $_SESSION['msg'] = "<p class='success'>Convidado cadastrado com sucesso!</p>";

    header("Location: ../../controle-entrada.php?id=$id");
}

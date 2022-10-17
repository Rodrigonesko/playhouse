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

if (isset($_POST['salvar'])) {

    $idFesta = $_GET['id'];

    //Decoração

    $data = [
        $fornecedoresDecoracao = $_POST['fornecedores-decoracao'],
        $telefoneDecoracao = $_POST['telefone-decoracao'],
        $dataDecoracao = $_POST['data-decoracao'],
        $porDecoracao = $_POST['por-decoracao'],
        $confirmadoDecoracao = $_POST['confirmado-decoracao'],
        $idFesta
    ];



    $insertDecoracao = $mysqli->prepare("UPDATE decoracao SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $insertDecoracao->execute($data);
    //Papelaria

    $data = [
        $fornecedoresPapelaria = $_POST['fornecedores-papelaria'],
        $telefonePapelaria = $_POST['telefone-papelaria'],
        $dataPapelaria = $_POST['data-papelaria'],
        $porPapelaria = $_POST['por-papelaria'],
        $confirmadoPapelaria = $_POST['confirmado-papelaria'],
        $idFesta
    ];

    $insertPapelaria = $mysqli->prepare("UPDATE papelaria SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $insertPapelaria->execute($data);

    //Convite

    $data = [
        $fornecedoresConvite = $_POST['fornecedores-convite'],
        $telefoneConvite = $_POST['telefone-convite'],
        $dataConvite = $_POST['data-convite'],
        $porConvite = $_POST['por-convite'],
        $confirmadoConvite = $_POST['confirmado-convite'],
        $idFesta
    ];

    $insertConvite = $mysqli->prepare("UPDATE convite SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $insertConvite->execute($data);

    //bolo fake

    $data = [
        $fornecedoresBoloFake = $_POST['fornecedores-bolo-fake'],
        $telefoneBoloFake = $_POST['telefone-bolo-fake'],
        $dataBoloFake = $_POST['data-bolo-fake'],
        $porBoloFake = $_POST['por-bolo-fake'],
        $confirmadoBoloFake = $_POST['confirmado-bolo-fake'],
        $idFesta
    ];



    $inserBoloFake = $mysqli->prepare("UPDATE bolo_fake SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $inserBoloFake->execute($data);

    //Salgados

    $data = [
        $fornecedoresSalgados = $_POST['fornecedores-salgados'],
        $telefoneSalgados = $_POST['telefone-salgados'],
        $dataSalgados = $_POST['data-salgados'],
        $porSalgados = $_POST['por-salgados'],
        $confirmadoSalgados = $_POST['confirmado-salgados'],
        $idFesta
    ];



    $inserSalgados = $mysqli->prepare("UPDATE salgados SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $inserSalgados->execute($data);

    //doces

    $data = [
        $fornecedoresDoces = $_POST['fornecedores-doces'],
        $telefoneDoces = $_POST['telefone-doces'],
        $dataDoces = $_POST['data-doces'],
        $porDoces = $_POST['por-doces'],
        $confirmadoDoces = $_POST['confirmado-doces'],
        $idFesta
    ];



    $insertDoces = $mysqli->prepare("UPDATE doces_festa SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $insertDoces->execute($data);

    //espumone

    $data = [
        $fornecedoresEspumone = $_POST['fornecedores-espumone'],
        $telefoneEspumone = $_POST['telefone-espumone'],
        $dataEspumone = $_POST['data-espumone'],
        $porEspumone = $_POST['por-espumone'],
        $confirmadoEspumone = $_POST['confirmado-espumone'],
        $idFesta
    ];


    $insertEspumone = $mysqli->prepare("UPDATE espumone SET fornecedores=?, telefone=?, data=?, por=?, confirmado=? WHERE id_festa=?");
    $insertEspumone->execute($data);

    $_SESSION['msg'] = "<p class='success'>Atualizado com sucesso!</p>";

    header("Location: ../../info-fornecedores.php?id=$idFesta");
    
}

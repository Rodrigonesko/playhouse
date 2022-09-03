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

    $tipoFesta = $_POST['tipo-festa'];
    $id = $_POST['id'];

    if (isset($_POST['refrigerante'])) {
        $refrigerante = 'Sim';
    } else {
        $refrigerante = '';
    }

    if (isset($_POST['agua'])) {
        $agua = 'Sim';
    } else {
        $agua = '';
    }

    if (isset($_POST['suco-laranja'])) {
        $sucoLaranja = 'Sim';
    } else {
        $sucoLaranja = '';
    }

    if (isset($_POST['suco-uva'])) {
        $sucoUva = 'Sim';
    } else {
        $sucoUva = '';
    }


    if (isset($_POST['cha-gelado'])) {
        $chaGelado = 'Sim';
    } else {
        $chaGelado = '';
    }

    if ($tipoFesta == 'week') {
        $data = [
            $mesaBoasVindas1 = $_POST['opcao-1-mesa'],
            $mesaBoasVindas2 = $_POST['opcao-2-mesa'],

            $bebidaExtra = $_POST['bebidas-extras'],

            $salgados1 = $_POST['salgados-1'],
            $salgados2 = $_POST['salgados-2'],
            $salgados3 = $_POST['salgados-3'],
            $salgados4 = $_POST['salgados-4'],
            $salgados5 = $_POST['salgados-5'],
            $salgados6 = $_POST['salgados-6'],

            $quantidadeSalgados1 = $_POST['quantidade-salgados-1'],
            $quantidadeSalgados2 = $_POST['quantidade-salgados-2'],
            $quantidadeSalgados3 = $_POST['quantidade-salgados-3'],
            $quantidadeSalgados4 = $_POST['quantidade-salgados-4'],
            $quantidadeSalgados5 = $_POST['quantidade-salgados-5'],
            $quantidadeSalgados6 = $_POST['quantidade-salgados-6'],

            $finger1 = $_POST['finger-1'],
            $finger2 = $_POST['finger-2'],

            $miniChurros = $_POST['mini-churros'],
            $bolo = $_POST['bolo'],

            $docesSimples1 = $_POST['simples-1'],
            $docesSimples2 = $_POST['simples-2'],
            $docesSimples3 = $_POST['simples-3'],
            $docesEspeciais1 = $_POST['especiais-1'],
            $docesEspeciais2 = $_POST['especiais-2'],

            $quantidadeSimples1 = $_POST['quantidade-simples-1'],
            $quantidadeSimples2 = $_POST['quantidade-simples-2'],
            $quantidadeSimples3 = $_POST['quantidade-simples-3'],

            $quantidadeEspecial1 = $_POST['quantidade-especiais-1'],
            $quantidadeEspecial2 = $_POST['quantidade-especiais-2'],

            $refrigerante,
            $agua,
            $sucoLaranja,
            $sucoUva,
            $chaGelado,
            $tipoFesta,

            $id

        ];

        $update = $mysqli->prepare("UPDATE cardapio_festa SET 

        mesa_boas_vindas_1 = ?,
        mesa_boas_vindas_2 = ?,
        bebida_extra_1 = ?,
        salgado_1 =?,
        salgado_2 =?,
        salgado_3 =?,
        salgado_4 =?,
        salgado_5 =?,
        salgado_6 =?,
        quantidade_salgado_1 = ?,
        quantidade_salgado_2 = ?,
        quantidade_salgado_3 = ?,
        quantidade_salgado_4 = ?,
        quantidade_salgado_5 = ?,
        quantidade_salgado_6 = ?,
        finger_1 = ?,
        finger_2 = ?,
        mini_churros = ?,
        bolo = ?,
        doce_simples_1 = ?,
        doce_simples_2 = ?,
        doce_simples_3 = ?,
        doce_especial_1 = ?,
        doce_especial_2 = ?,
        quantidade_doce_simples_1 = ?,
        quantidade_doce_simples_2 = ?,
        quantidade_doce_simples_3 = ?,
        quantidade_doce_especial_1 = ?,
        quantidade_doce_especial_2 = ?,
        refrigerante = ?,
        agua = ?,
        suco_laranja = ?,
        suco_uva = ?,
        cha_gelado = ?,
        tipo_festa = ?

         WHERE id_festa = ?");
    }

    if ($tipoFesta == 'light' || $tipoFesta == 'play') {
        $data = [
            $mesaBoasVindas1 = $_POST['opcao-1-mesa'],
            $mesaBoasVindas2 = $_POST['opcao-2-mesa'],
            $mesaBoasVindas3 = $_POST['opcao-3-mesa'],

            $entrada = $_POST['entrada'],

            $bebidaExtra = $_POST['bebidas-extras'],

            $salgados1 = $_POST['salgados-1'],
            $salgados2 = $_POST['salgados-2'],
            $salgados3 = $_POST['salgados-3'],
            $salgados4 = $_POST['salgados-4'],
            $salgados5 = $_POST['salgados-5'],
            $salgados6 = $_POST['salgados-6'],

            $quantidadeSalgados1 = $_POST['quantidade-salgados-1'],
            $quantidadeSalgados2 = $_POST['quantidade-salgados-2'],
            $quantidadeSalgados3 = $_POST['quantidade-salgados-3'],
            $quantidadeSalgados4 = $_POST['quantidade-salgados-4'],
            $quantidadeSalgados5 = $_POST['quantidade-salgados-5'],
            $quantidadeSalgados6 = $_POST['quantidade-salgados-6'],

            $finger1 = $_POST['finger-1'],
            $finger2 = $_POST['finger-2'],

            $miniChurros = $_POST['mini-churros'],
            $bolo = $_POST['bolo'],

            $docesSimples1 = $_POST['simples-1'],
            $docesSimples2 = $_POST['simples-2'],
            $docesSimples3 = $_POST['simples-3'],
            $docesEspeciais1 = $_POST['especiais-1'],
            $docesEspeciais2 = $_POST['especiais-2'],
            $docesEspeciais3 = $_POST['especiais-3'],

            $quantidadeSimples1 = $_POST['quantidade-simples-1'],
            $quantidadeSimples2 = $_POST['quantidade-simples-2'],
            $quantidadeSimples3 = $_POST['quantidade-simples-3'],

            $quantidadeEspecial1 = $_POST['quantidade-especiais-1'],
            $quantidadeEspecial2 = $_POST['quantidade-especiais-2'],
            $quantidadeEspecial3 = $_POST['quantidade-especiais-3'],

            $refrigerante,
            $agua,
            $sucoLaranja,
            $sucoUva,
            $chaGelado,
            $tipoFesta,

            $id

        ];

        $update = $mysqli->prepare("UPDATE cardapio_festa SET 

        mesa_boas_vindas_1 = ?,
        mesa_boas_vindas_2 = ?,
        mesa_boas_vindas_3 = ?,
        entrada = ?,
        bebida_extra_1 = ?,
        salgado_1 =?,
        salgado_2 =?,
        salgado_3 =?,
        salgado_4 =?,
        salgado_5 =?,
        salgado_6 =?,
        quantidade_salgado_1 = ?,
        quantidade_salgado_2 = ?,
        quantidade_salgado_3 = ?,
        quantidade_salgado_4 = ?,
        quantidade_salgado_5 = ?,
        quantidade_salgado_6 = ?,
        finger_1 = ?,
        finger_2 = ?,
        mini_churros = ?,
        bolo = ?,
        doce_simples_1 = ?,
        doce_simples_2 = ?,
        doce_simples_3 = ?,
        doce_especial_1 = ?,
        doce_especial_2 = ?,
        doce_especial_3 = ?,
        quantidade_doce_simples_1 = ?,
        quantidade_doce_simples_2 = ?,
        quantidade_doce_simples_3 = ?,
        quantidade_doce_especial_1 = ?,
        quantidade_doce_especial_2 = ?,
        quantidade_doce_especial_3 = ?,
        refrigerante = ?,
        agua = ?,
        suco_laranja = ?,
        suco_uva = ?,
        cha_gelado = ?,
        tipo_festa = ?

         WHERE id_festa = ?");
    }

    // if ($tipoFesta == 'play') {

    // }

    if ($tipoFesta == 'house') {
        $data = [
            $mesaBoasVindas1 = $_POST['opcao-1-mesa'],
            $mesaBoasVindas2 = $_POST['opcao-2-mesa'],
            $mesaBoasVindas3 = $_POST['opcao-3-mesa'],
            $mesaBoasVindas4 = $_POST['opcao-4-mesa'],

            $entrada = $_POST['entrada'],

            $bebidaExtra = $_POST['bebidas-extras'],
            $bebidaExtra2 = $_POST['bebidas-extras-2'],

            $salgados1 = $_POST['salgados-1'],
            $salgados2 = $_POST['salgados-2'],
            $salgados3 = $_POST['salgados-3'],
            $salgados4 = $_POST['salgados-4'],
            $salgados5 = $_POST['salgados-5'],
            $salgados6 = $_POST['salgados-6'],
            $salgados6 = $_POST['salgados-7'],
            $salgados6 = $_POST['salgados-8'],

            $quantidadeSalgados1 = $_POST['quantidade-salgados-1'],
            $quantidadeSalgados2 = $_POST['quantidade-salgados-2'],
            $quantidadeSalgados3 = $_POST['quantidade-salgados-3'],
            $quantidadeSalgados4 = $_POST['quantidade-salgados-4'],
            $quantidadeSalgados5 = $_POST['quantidade-salgados-5'],
            $quantidadeSalgados6 = $_POST['quantidade-salgados-6'],
            $quantidadeSalgados7 = $_POST['quantidade-salgados-7'],
            $quantidadeSalgados8 = $_POST['quantidade-salgados-8'],

            $finger1 = $_POST['finger-1'],
            $finger2 = $_POST['finger-2'],

            $miniChurros = $_POST['mini-churros'],
            $brownie = $_POST['brownie'],
            $bolo = $_POST['bolo'],

            $docesSimples1 = $_POST['simples-1'],
            $docesSimples2 = $_POST['simples-2'],
            $docesSimples3 = $_POST['simples-3'],
            $docesSimples4 = $_POST['simples-4'],
            $docesEspeciais1 = $_POST['especiais-1'],
            $docesEspeciais2 = $_POST['especiais-2'],
            $docesEspeciais3 = $_POST['especiais-3'],
            $docesEspeciais4 = $_POST['especiais-4'],

            $quantidadeSimples1 = $_POST['quantidade-simples-1'],
            $quantidadeSimples2 = $_POST['quantidade-simples-2'],
            $quantidadeSimples3 = $_POST['quantidade-simples-3'],
            $quantidadeSimples4 = $_POST['quantidade-simples-4'],

            $quantidadeEspecial1 = $_POST['quantidade-especiais-1'],
            $quantidadeEspecial2 = $_POST['quantidade-especiais-2'],
            $quantidadeEspecial3 = $_POST['quantidade-especiais-3'],
            $quantidadeEspecial4 = $_POST['quantidade-especiais-4'],

            $refrigerante,
            $agua,
            $sucoLaranja,
            $sucoUva,
            $chaGelado,
            $tipoFesta,

            $id

        ];

        $update = $mysqli->prepare("UPDATE cardapio_festa SET 

        mesa_boas_vindas_1 = ?,
        mesa_boas_vindas_2 = ?,
        mesa_boas_vindas_3 = ?,
        mesa_boas_vindas_4 = ?,
        entrada = ?,
        bebida_extra_1 = ?,
        bebida_extra_2 = ?,
        salgado_1 =?,
        salgado_2 =?,
        salgado_3 =?,
        salgado_4 =?,
        salgado_5 =?,
        salgado_6 =?,
        salgado_7 =?,
        salgado_8 =?,
        quantidade_salgado_1 = ?,
        quantidade_salgado_2 = ?,
        quantidade_salgado_3 = ?,
        quantidade_salgado_4 = ?,
        quantidade_salgado_5 = ?,
        quantidade_salgado_6 = ?,
        quantidade_salgado_7 = ?,
        quantidade_salgado_8 = ?,
        finger_1 = ?,
        finger_2 = ?,
        mini_churros = ?,
        brownie = ?,
        bolo = ?,
        doce_simples_1 = ?,
        doce_simples_2 = ?,
        doce_simples_3 = ?,
        doce_simples_4 = ?,
        doce_especial_1 = ?,
        doce_especial_2 = ?,
        doce_especial_3 = ?,
        doce_especial_4 = ?,
        quantidade_doce_simples_1 = ?,
        quantidade_doce_simples_2 = ?,
        quantidade_doce_simples_3 = ?,
        quantidade_doce_simples_4 = ?,
        quantidade_doce_especial_1 = ?,
        quantidade_doce_especial_2 = ?,
        quantidade_doce_especial_3 = ?,
        quantidade_doce_especial_4 = ?,
        refrigerante = ?,
        agua = ?,
        suco_laranja = ?,
        suco_uva = ?,
        cha_gelado = ?,
        tipo_festa = ?

         WHERE id_festa = ?");
    }

    $update->execute($data);

    $_SESSION['msg'] = "<p class='success'>Atualizado com sucesso!</p>";

    header("Location: ../../partyDetails.php?id=$id");
}

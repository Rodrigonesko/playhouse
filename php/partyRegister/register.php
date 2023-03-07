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

if (isset($_POST['register'])) {

    $contratante = $_POST['contratante'];
    $tipoFesta = $_POST['tipo_festa'];
    $contrato = $_POST['contrato'];
    $valor = $_POST['valor'];

    $dataFesta = $_POST['data_festa'];
    $horarioInicio = $_POST['horario_inicio'];
    $horarioFim = $_POST['horario_fim'];
    $aniversariante = $_POST['aniversariante'];
    $idade = $_POST['idade'];
    $convidadosPagos = $_POST['convidados_pagos'];
    $convidadosPagantes = $_POST['convidados_pagantes'];
    $qunatidadeAdultos = $_POST['qtd_adultos'];
    $criancas4 = $_POST['criancas_4'];
    $criancas8 = $_POST['criancas_8'];
    $tema = $_POST['tema'];
    $corBalao = $_POST['cor_balao'];
    $tipoBaloes = $_POST['tipo_baloes'];
    $painel = $_POST['painel'];
    $tapete = $_POST['tapete'];
    $bebibaAlcoolica = $_POST['bebida_alcoolica'];
    $lembrancinhas = $_POST['lembrancinhas'];
    $docesDecorados = $_POST['doces_decorados'];
    $papelaria = $_POST['papelaria'];
    $retrospectiva = $_POST['retrospectiva'];
    $tipoMusica = $_POST['tipo_musica'];
    $personagemExterno = $_POST['personagem_externo'];

    $valorAdicional = $_POST['valor_adicional'];
    $decoracaExtra = $_POST['extra_decoracao'];
    $itemDecoracaoExtra = $_POST['extra_decoracao_opcao'];
    $flores = $_POST['flores'];
    $arvores = $_POST['arvores'];
    $quantidadeArvores = $_POST['quantas_arvores'];
    $folhas = $_POST['folhas'];
    $formihasEspeciais = $_POST['forminhas_especiais'];
    $observacoes = $_POST['observacoes'];

    $idData = transformDateToId($dataFesta);

    $insert = $mysqli->prepare("INSERT INTO festas (
                                                contratante,
                                                tipo_festa,
                                                contrato,
                                                data_festa, 
                                                horario_inicio, 
                                                horario_final, 
                                                aniversariante, 
                                                idade,
                                                convidados_pagos, 
                                                convidados_pagantes, 
                                                quantidade_adultos, 
                                                quantidade_0_4, 
                                                quantidade_5_8, 
                                                tema, 
                                                cor_baloes,
                                                tipo_baloes, 
                                                painel,
                                                mesas, 
                                                tapete, 
                                                bebida_alcoolica, 
                                                lembrancinhas, 
                                                doces_decorados, 
                                                papelaria, 
                                                retrospectiva, 
                                                tipo_musica, 
                                                personagem_externo,
                                                valor_adicional,
                                                decoracao_extra,
                                                item_decoracao_extra,
                                                flores,
                                                arvores,
                                                quantas_arvores,
                                                folhas,
                                                forminhas_especiais,
                                                observacoes,
                                                valor,
                                                id_data
                                                ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insert->bind_param('sssssssssssssssssssssssssssssssssssss', $contratante, $tipoFesta, $contrato, $dataFesta, $horarioInicio, $horarioFim, $aniversariante, $idade, $convidadosPagos, $convidadosPagantes, $qunatidadeAdultos, $criancas4, $criancas8, $tema, $corBalao, $tipoBaloes, $painel, $mesas, $tapete, $bebibaAlcoolica, $lembrancinhas, $docesDecorados, $papelaria, $retrospectiva, $tipoMusica, $personagemExterno, $valorAdicional, $decoracaExtra,  $itemDecoracaoExtra, $flores, $arvores, $quantidadeArvores, $folhas, $formihasEspeciais, $observacoes, $valor, $idData);
    $insert->execute();

    $idFesta = $mysqli->insert_id;

    //Insert table fornecedores

    //Decoração

    $fornecedoresDecoracao = $_POST['fornecedores-decoracao'];
    $telefoneDecoracao = $_POST['telefone-decoracao'];
    $dataDecoracao = $_POST['data-decoracao'];
    $porDecoracao = $_POST['por-decoracao'];
    $confirmadoDecoracao = $_POST['confirmado-decoracao'];

    $insertDecoracao = $mysqli->prepare("INSERT INTO decoracao (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertDecoracao->bind_param("ssssss", $idFesta, $fornecedoresDecoracao, $telefoneDecoracao, $dataDecoracao, $porDecoracao, $confirmadoDecoracao);
    $insertDecoracao->execute();
    //Papelaria

    $fornecedoresPapelaria = $_POST['fornecedores-papelaria'];
    $telefonePapelaria = $_POST['telefone-papelaria'];
    $dataPapelaria = $_POST['data-papelaria'];
    $porPapelaria = $_POST['por-papelaria'];
    $confirmadoPapelaria = $_POST['confirmado-papelaria'];

    $insertPapelaria = $mysqli->prepare("INSERT INTO papelaria (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertPapelaria->bind_param("ssssss", $idFesta, $fornecedoresPapelaria, $telefonePapelaria, $dataPapelaria, $porPapelaria, $confirmadoPapelaria);
    $insertPapelaria->execute();

    //Convite

    $fornecedoresConvite = $_POST['fornecedores-convite'];
    $telefoneConvite = $_POST['telefone-convite'];
    $dataConvite = $_POST['data-convite'];
    $porConvite = $_POST['por-convite'];
    $confirmadoConvite = $_POST['confirmado-convite'];

    $insertConvite = $mysqli->prepare("INSERT INTO convite (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertConvite->bind_param("ssssss", $idFesta, $fornecedoresConvite, $telefoneConvite, $dataConvite, $porConvite, $confirmadoConvite);
    $insertConvite->execute();

    //bolo fake

    $fornecedoresBoloFake = $_POST['fornecedores-bolo-fake'];
    $telefoneBoloFake = $_POST['telefone-bolo-fake'];
    $dataBoloFake = $_POST['data-bolo-fake'];
    $porBoloFake = $_POST['por-bolo-fake'];
    $confirmadoBoloFake = $_POST['confirmado-bolo-fake'];

    $insertBoloFake = $mysqli->prepare("INSERT INTO bolo_fake (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertBoloFake->bind_param("ssssss", $idFesta, $fornecedoresBoloFake, $telefoneBoloFake, $dataBoloFake, $porBoloFake, $confirmadoBoloFake);
    $insertBoloFake->execute();

    //Salgados

    $fornecedoresSalgados = $_POST['fornecedores-salgados'];
    $telefoneSalgados = $_POST['telefone-salgados'];
    $dataSalgados = $_POST['data-salgados'];
    $porSalgados = $_POST['por-salgados'];
    $confirmadoSalgados = $_POST['confirmado-salgados'];

    $insertSalgados = $mysqli->prepare("INSERT INTO salgados (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertSalgados->bind_param("ssssss", $idFesta, $fornecedoresSalgados, $telefoneSalgados, $dataSalgados, $porSalgados, $confirmadoSalgados);
    $insertSalgados->execute();

    //doces

    $fornecedoresDoces = $_POST['fornecedores-doces'];
    $telefoneDoces = $_POST['telefone-doces'];
    $dataDoces = $_POST['data-doces'];
    $porDoces = $_POST['por-doces'];
    $confirmadoDoces = $_POST['confirmado-doces'];

    $insertDoces = $mysqli->prepare("INSERT INTO doces_festa (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertDoces->bind_param("ssssss", $idFesta, $fornecedoresDoces, $telefoneDoces, $dataDoces, $porDoces, $confirmadoDoces);
    $insertDoces->execute();

    //espumone

    $fornecedoresEspumone = $_POST['fornecedores-espumone'];
    $telefoneEspumone = $_POST['telefone-espumone'];
    $dataEspumone = $_POST['data-espumone'];
    $porEspumone = $_POST['por-espumone'];
    $confirmadoEspumone = $_POST['confirmado-espumone'];

    $insertEspumone = $mysqli->prepare("INSERT INTO espumone (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertEspumone->bind_param("ssssss", $idFesta, $fornecedoresEspumone, $telefoneEspumone, $dataEspumone, $porEspumone, $confirmadoEspumone);
    $insertEspumone->execute();

    $fornecedoresEspumone = $_POST['fornecedores-espumone-2'];
    $telefoneEspumone = $_POST['telefone-espumone-2'];
    $dataEspumone = $_POST['data-espumone-2'];
    $porEspumone = $_POST['por-espumone-2'];
    $confirmadoEspumone = $_POST['confirmado-espumone-2'];

    $insertEspumone = $mysqli->prepare("INSERT INTO espumone_2 (id_festa, fornecedores, telefone, data, por, confirmado) VALUES (?,?,?,?,?,?)");
    $insertEspumone->bind_param("ssssss", $idFesta, $fornecedoresEspumone, $telefoneEspumone, $dataEspumone, $porEspumone, $confirmadoEspumone);
    $insertEspumone->execute();

    /* -------------------------------------------------------------------*/

    // Cardapio

    $mesaBoasVindas1 = $_POST['opcao-1-mesa'];
    $mesaBoasVindas2 = $_POST['opcao-2-mesa'];
    $mesaBoasVindas3 = $_POST['opcao-3-mesa'];
    $mesaBoasVindas4 = $_POST['opcao-4-mesa'];
    $outraMesaBoasVindas = $_POST['outra-mesa-boas-vindas'];

    $entrada = $_POST['entrada'];
    $outraEntrada = $_POST['outra-entrada'];

    $bebidaExtra = $_POST['bebidas-extras'];
    $bebidaExtra2 = $_POST['bebidas-extras-2'];
    $outraBebidaExtra = $_POST['outra-bebida-extra'];

    $salgados1 = $_POST['salgados-1'];
    $salgados2 = $_POST['salgados-2'];
    $salgados3 = $_POST['salgados-3'];
    $salgados4 = $_POST['salgados-4'];
    $salgados5 = $_POST['salgados-5'];
    $salgados6 = $_POST['salgados-6'];
    $salgados7 = $_POST['salgados-7'];
    $salgados8 = $_POST['salgados-8'];

    $quantidadeSalgados1 = $_POST['quantidade-salgados-1'];
    $quantidadeSalgados2 = $_POST['quantidade-salgados-2'];
    $quantidadeSalgados3 = $_POST['quantidade-salgados-3'];
    $quantidadeSalgados4 = $_POST['quantidade-salgados-4'];
    $quantidadeSalgados5 = $_POST['quantidade-salgados-5'];
    $quantidadeSalgados6 = $_POST['quantidade-salgados-6'];
    $quantidadeSalgados7 = $_POST['quantidade-salgados-7'];
    $quantidadeSalgados8 = $_POST['quantidade-salgados-8'];

    $outroSalgado = $_POST['outro-salgado'];

    $finger1 = $_POST['finger-1'];
    $finger2 = $_POST['finger-2'];
    $finger3 = $_POST['finger-3'];

    $miniChurros = $_POST['mini-churros'];
    $brownie = $_POST['brownie'];
    $bolo = $_POST['bolo'];
    $bolo2 = $_POST['bolo_2'];

    $docesSimples1 = $_POST['simples-1'];
    $docesSimples2 = $_POST['simples-2'];
    $docesSimples3 = $_POST['simples-3'];
    $docesSimples4 = $_POST['simples-4'];

    $docesEspeciais1 = $_POST['especiais-1'];
    $docesEspeciais2 = $_POST['especiais-2'];
    $docesEspeciais3 = $_POST['especiais-3'];
    $docesEspeciais4 = $_POST['especiais-4'];

    $outroDoce = $_POST['outro-doce'];

    $refrigerante = $_POST['refrigerante'];
    $agua = $_POST['agua'];
    $sucoLaranja = $_POST['suco-laranja'];
    $sucoUva = $_POST['suco-uva'];
    $chaGelado = $_POST['cha-gelado'];

    $insertCardapio = $mysqli->prepare("INSERT INTO cardapio_festa (id_festa, mesa_boas_vindas_1,  mesa_boas_vindas_2,  mesa_boas_vindas_3,  mesa_boas_vindas_4, entrada, bebida_extra_1, bebida_extra_2, salgado_1, salgado_2, salgado_3, salgado_4, salgado_5, salgado_6, salgado_7, salgado_8, finger_1, finger_2, mini_churros, brownie, bolo, doce_simples_1, doce_simples_2, doce_simples_3, doce_simples_4, doce_especial_1, doce_especial_2, doce_especial_3, doce_especial_4, refrigerante, agua, suco_laranja, suco_uva, cha_gelado, tipo_festa, finger_3, bolo_2, outro_salgado, outro_doce, outra_bebida_extra, outra_mesa_boas_vindas, outra_entrada)
    VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $insertCardapio->bind_param(
        "ssssssssssssssssssssssssssssssssssssssssss",
        $idFesta,
        $mesaBoasVindas1,
        $mesaBoasVindas2,
        $mesaBoasVindas3,
        $mesaBoasVindas4,
        $entrada,
        $bebidaExtra,
        $bebidaExtra2,
        $salgados1,
        $salgados2,
        $salgados3,
        $salgados4,
        $salgados5,
        $salgados6,
        $salgados7,
        $salgados8,
        $finger1,
        $finger2,
        $miniChurros,
        $brownie,
        $bolo,
        $docesSimples1,
        $docesSimples2,
        $docesSimples3,
        $docesSimples4,
        $docesEspeciais1,
        $docesEspeciais2,
        $docesEspeciais3,
        $docesEspeciais4,
        $refrigerante,
        $agua,
        $sucoLaranja,
        $sucoUva,
        $chaGelado,
        $tipoFesta,
        $finger3,
        $bolo2,
        $outroSalgado,
        $outroDoce,
        $outraBebidaExtra,
        $outraMesaBoasVindas,
        $outraEntrada
    );

    $insertCardapio->execute();

    $_SESSION['msg'] = "<p class='success'>Festa cadastrada com sucesso!</p>";

    header('Location: ../../partyRegister.php');
}

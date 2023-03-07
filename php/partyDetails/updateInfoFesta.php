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

    $data = [
        $status = $_POST["status"],
        $contratante = $_POST['contratante'],
        $tipoFesta = $_POST['tipo_festa'],
        $contrato = $_POST['contrato'],
        $dataFesta = $_POST['data_festa'],
        $horarioInicio = $_POST['horario_inicio'],
        $horarioFim = $_POST['horario_fim'],
        $aniversariante = $_POST['aniversariante'],
        $idade = $_POST['idade'],
        $convidadosPagos = $_POST['convidados_pagos'],
        $convidadosPagantes = $_POST['convidados_pagantes'],
        $qunatidadeAdultos = $_POST['quantidade_adultos'],
        $criancas4 = $_POST['quantidade_4'],
        $criancas8 = $_POST['quantidade_8'],
        $tema = $_POST['tema'],
        $corBalao = $_POST['cor_baloes'],
        $tipoBaloes = $_POST['tipo_baloes'],
        $painel = $_POST['painel'],
        $mesas = $_POST['mesas'],
        $tapete = $_POST['tapete'],
        $bebibaAlcoolica = $_POST['bebida_alcoolica'],
        $lembrancinhas = $_POST['lembrancinhas'],
        $docesDecorados = $_POST['doces_decorados'],
        $papelaria = $_POST['papelaria'],
        $retrospectiva = $_POST['retrospectiva'],
        $tipoMusica = $_POST['tipo_musica'],
        $personagemExterno = $_POST['personagem_externo'],
        $valorAdicional = $_POST['valor_adicional'],
        $decoracaExtra = $_POST['decoracao_extra'],
        $itemDecoracaoExtra = $_POST['item_decoracao_extra'],
        $flores = $_POST['flores'],
        $arvores = $_POST['arvores'],
        $quantidadeArvores = $_POST['quantidade_arvores'],
        $folhas = $_POST['folhas'],
        $formihasEspeciais = $_POST['forminhas_especiais'],
        $observacoes = $_POST['observacoes'],
        $valor = $_POST['valor'],
        $valorPago = $_POST['valor_pago'],
        $idData = transformDateToId($dataFesta),
        $idFesta = $_GET['id'],
    ];


    $update = $mysqli->prepare("UPDATE festas SET 
                                                status = ?,
                                                contratante=?,
                                                tipo_festa =?,
                                                contrato=?,
                                                data_festa=?,
                                                horario_inicio=?,
                                                horario_final=?,
                                                aniversariante=?,
                                                idade=?,
                                                convidados_pagos=?,
                                                convidados_pagantes=?,
                                                quantidade_adultos=?,
                                                quantidade_0_4=?,
                                                quantidade_5_8=?,
                                                tema=?,
                                                cor_baloes=?,
                                                tipo_baloes=?,
                                                painel=?,
                                                mesas=?,
                                                tapete=?,
                                                bebida_alcoolica=?,
                                                lembrancinhas=?,
                                                doces_decorados=?,
                                                papelaria=?,
                                                retrospectiva=?,
                                                tipo_musica=?,
                                                personagem_externo=?,
                                                valor_adicional=?,
                                                decoracao_extra=?,
                                                item_decoracao_extra=?,
                                                flores=?,
                                                arvores=?,
                                                quantas_arvores=?,
                                                folhas=?,
                                                forminhas_especiais=?,
                                                observacoes=?,
                                                valor=?,
                                                valor_pago=?,
                                                id_data=?
                                                WHERE id=? ");
    $update->execute($data);

    $_SESSION['msg'] = "<p class='success'>Atualizado com sucesso!</p>";

    header("Location: ../../info-festa.php?id=$idFesta");
}

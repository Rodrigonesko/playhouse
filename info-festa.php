<?php
session_start();
ob_start();
require_once 'connection.php';
require_once 'php/include/functions.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/info-festa.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="section-info-festa-container">
            <div class="info-festa-container">
                <div class="title">
                    <h3>Informações sobre a festa</h3>
                </div>
                <div class="info-festa">
                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $result = $mysqli->query("SELECT * FROM festas WHERE id='$id'");

                        $row = $result->fetch_assoc();

                        $contratante = $row['contratante'];
                        $tipoFesta = $row['tipo_festa'];
                        $contrato = $row['contrato'];
                        $dataFesta = $row['data_festa'];
                        $horarioInicio = $row['horario_inicio'];
                        $horarioFim = $row['horario_final'];
                        $aniversariante = $row['aniversariante'];
                        $idade = $row['idade'];
                        $convidadosPagos = $row['convidados_pagos'];
                        $convidadosPagantes = $row['convidados_pagantes'];
                        $quantidadeAdultos = $row['quantidade_adultos'];
                        $quantidadeCriancas4 = $row['quantidade_0_4'];
                        $quantidadeCriancas8 = $row['quantidade_5_8'];
                        $tema = $row['tema'];
                        $corBaloes = $row['cor_baloes'];
                        $tipoBaloes = $row['tipo_baloes'];
                        $painel = $row['painel'];
                        $mesas = $row['mesas'];
                        $tapete = $row['tapete'];
                        $bebidaAlcoolica = $row['bebida_alcoolica'];
                        $lembrancinhas = $row['lembrancinhas'];
                        $docesDecorados = $row['doces_decorados'];
                        $papelaria = $row['papelaria'];
                        $retrospectiva = $row['retrospectiva'];
                        $tipoMusica = $row['tipo_musica'];
                        $personagemExterno = $row['personagem_externo'];
                        $valorAdicional = $row['valor_adicional'];
                        $decoracaoExtra = $row['decoracao_extra'];
                        $itemDecoracaoExtra = $row['item_decoracao_extra'];
                        $flores = $row['flores'];
                        $arvores = $row['arvores'];
                        $quantidadeArvores = $row['quantas_arvores'];
                        $folhas = $row['folhas'];
                        $forminhasEspeciais = $row['forminhas_especiais'];
                        $observacoes = $row['observacoes'];
                        $status = $row['status'];
                        $concluido = $row['concluido'];
                    }

                    ?>
                    <form action="php/partyDetails/updateInfoFesta.php?<?php echo $id ?>" method="post">
                        <div class="info-festa-container">
                            <div class="title">
                                <h3>Informações da Festa</h3><input type="text" name="id" value="<?php echo $id ?>">
                                <select name="status" id="status">
                                    <?php
                                    $select = $mysqli->query("SELECT * FROM status");
                                    while ($row = $select->fetch_assoc()) {
                                        $opcao = $row['status'];
                                        if ($opcao == $status) {
                                            echo "<option value='$opcao' selected>$opcao</option>";
                                            continue;
                                        }
                                        echo "<option value='$opcao' >$opcao</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="info-principais">
                                <label for="contratante">Contratante</label>
                                <input type="text" name="contratante" id="contratante" value="<?php echo $contratante; ?>">
                                <label for="contratante">Tipo de Festa</label>
                                <input type="text" name="tipo_festa" id="tipo_festa" value="<?php echo $tipoFesta; ?>">
                                <label for="contratante">Contrato</label>
                                <input type="text" name="contrato" id="contrato" value="<?php echo $contrato; ?>">
                            </div>
                            <div class="subtitle">
                                <h4>Informações para confirmar com os Pais</h4>
                            </div>
                            <div class="data-info">
                                <label for="data_festa">Data da festa</label>
                                <input type="date" name="data_festa" id="data_festa" value="<?php echo $dataFesta ?>">
                                <label for="horario_inicio">Horario Inicio</label>
                                <input type="time" name="horario_inicio" id="horario_inicio" value="<?php echo $horarioInicio ?>">
                                <label for="horario_fim">Horario de Final</label>
                                <input type="time" name="horario_fim" id="horario_fim" value="<?php echo $horarioFim ?>">
                            </div>
                            <div class="aniversariante-info">
                                <label for="aniversariante">Aniversariante</label>
                                <input type="text" name="aniversariante" id="aniversariante" value="<?php echo $aniversariante ?>">
                                <label for="idade">idade</label>
                                <input type="number" name="idade" id="idade" value="<?php echo $idade ?>">
                            </div>
                            <div class="convidados-info">
                                <label for="convidados_pagos">Convidados Pagos</label>
                                <input type="number" name="convidados_pagos" id="convidados_pagos" value="<?php echo $convidadosPagos ?>">
                                <label for="convidados_pagantes">Convidados Pagantes</label>
                                <input type="number" name="convidados_pagantes" id="convidados_pagantes" value="<?php echo $convidadosPagantes ?>">
                                <label for="quantidade_adultos">Quantidade Adultos</label>
                                <input type="number" name="quantidade_adultos" id="quantidade_adultos" value="<?php echo $quantidadeAdultos ?>">
                                <label for="quantidade_4">Crianças de 0 a 4</label>
                                <input type="number" name="quantidade_4" id="quantidade_4" value="<?php echo $quantidadeCriancas4 ?>">
                                <label for="quantidade_8">Crianças de 5 a 8</label>
                                <input type="number" name="quantidade_8" id="quantidade_8" value="<?php echo $quantidadeCriancas8 ?>">
                            </div>
                            <div class="decoracao-info">
                                <label for="tema">Tema</label>
                                <input type="text" name="tema" id="tema" value="<?php echo $tema ?>">
                                <label for="cor_baloes">Cor dos Balões</label>
                                <input type="text" name="cor_baloes" id="cor_baloes" value="<?php echo $corBaloes ?>">
                                <label for="tipo_baloes">Tipo Balões</label>
                                <input type="text" name="tipo_baloes" id="tipo_baloes" value="<?php echo $tipoBaloes ?>">
                            </div>
                            <div class="decoracao-info">
                                <label for="painel">Painel</label>
                                <input type="text" name="painel" id="painel" value="<?php echo $painel ?>">
                                <label for="mesas">Mesas</label>
                                <input type="text" name="mesas" id="mesas" value="<?php echo $mesas ?>">
                                <label for="tapete">Tapete</label>
                                <input type="text" name="tapete" id="tapete" value="<?php echo $tapete ?>">
                            </div>
                            <div class="decoracao-info">
                                <label for="bebida_alcoolica">Bebida Alcoólica</label>
                                <input type="text" name="bebida_alcoolica" id="bebida_alcoolica" value="<?php echo $bebidaAlcoolica ?>">
                                <label for="lembrancinhas">Lembrancinhas</label>
                                <input type="text" name="lembrancinhas" id="lembrancinhas" value="<?php echo $lembrancinhas ?>">
                                <label for="doces_decorados">Doces Decorados</label>
                                <input type="text" name="doces_decorados" id="doces_decorados" value="<?php echo $docesDecorados ?>">
                            </div>
                            <div class="decoracao-info">
                                <label for="papelaria">Papelaria</label>
                                <input type="text" name="papelaria" id="papelaria" value="<?php echo $papelaria ?>">
                                <label for="retrospectiva">Retrospectiva</label>
                                <input type="text" name="retrospectiva" id="retrospectiva" value="<?php echo $retrospectiva ?>">
                                <label for="tipo_musica">Tipo de Música</label>
                                <input type="text" name="tipo_musica" id="tipo_musica" value="<?php echo $tipoMusica ?>">
                                <label for="personagem_externo">Personagem Externo</label>
                                <input type="text" name="personagem_externo" id="personagem_externo" value="<?php echo $personagemExterno ?>">
                            </div>
                            <div class="subtitle">
                                <h4>Itens Adicionais</h4>
                            </div>
                            <div class="itens-adicionais-info">
                                <label for="valor_adicional">Valor Adicional</label>
                                <input type="text" name="valor_adicional" id="valor_adicional" value="<?php echo $valorAdicional ?>">
                            </div>
                            <div class="itens-adicionais-info">
                                <label for="decoracao_extra">Decoração Extra</label>
                                <input type="text" name="decoracao_extra" id="decoracao_extra" value="<?php echo $decoracaoExtra ?>">
                                <label for="item_decoracao_extra">Qual?</label>
                                <input type="text" name="item_decoracao_extra" id="item_decoracao_extra" value="<?php echo $itemDecoracaoExtra ?>">
                            </div>
                            <div class="itens-adicionais-info">
                                <label for="flores">Flores</label>
                                <input type="text" name="flores" id="flores" value="<?php echo $flores ?>">
                            </div>
                            <div class="itens-adicionais-info">
                                <label for="arvores">Árvores</label>
                                <input type="text" name="arvores" id="arvores" value="<?php echo $arvores ?>">
                                <label for="quantidade_arvores">Quantas?</label>
                                <input type="text" name="quantidade_arvores" id="quantidade_arvores" value="<?php echo $quantidadeArvores ?>">
                            </div>
                            <div class="itens-adicionais-info">
                                <label for="folhas">Valor Folhas</label>
                                <input type="text" name="folhas" id="folhas" value="<?php echo $folhas ?>">
                            </div>
                            <div class="itens-adicionais-info">
                                <label for="forminhas_especiais">Forminhas Especiais</label>
                                <input type="text" name="forminhas_especiais" id="forminhas_especiais" value="<?php echo $forminhasEspeciais ?>">
                            </div>
                            <div class="info-observacoes">
                                <label for="observacoes">Observações</label>
                                <input name="observacoes" id="observacoes" value="<?php echo $observacoes ?>"></input>
                            </div>
                            <div class="btn-container">
                                <button class="salvar-btn" name="salvar">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/info-festa.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" defer></script>
    <title>Dashboard</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="section">
            <div class="container box">
                <div class="">
                    <h3 class="is-size-4">Informações</h3>
                </div>
                <div class="msg">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="info-festa">
                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $result = $mysqli->query("SELECT * FROM festas WHERE id='$id'");

                        $row = $result->fetch_assoc();

                        $valor = $row['valor'];
                        $valorPago = $row['valor_pago'];
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

                        $arrTiposFestas = ['week', 'light', 'play', 'house'];
                    }

                    ?>
                    <form action="php/partyDetails/updateInfoFesta.php?id=<?php echo $id ?>" method="post">
                        <div class="">
                            <div class="info-principais box">
                                <div class="subtitle">
                                    <h4>Informações da Festa</h4>
                                </div>
                                <div class="is-flex is-align-items-center info-festa">
                                    <label for="status">Situação </label>
                                    <div class="select is-small">
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
                                    <label for="valor">Valor</label>
                                    <input type="text" name="valor" id="valor" value="<?php echo $valor ?>" class="input is-small">
                                    <label for="valor_pago">Valor pago</label>
                                    <input type="text" name="valor_pago" id="valor_pago" value="<?php echo $valorPago ?>" class="input is-small">
                                </div>
                                <div class="is-flex is-align-items-center info-festa">
                                    <label for="contratante">Contratante</label>
                                    <input type="text" name="contratante" id="contratante" class="input is-small" value="<?php echo $contratante; ?>">
                                    <label for="tipo_festa">Tipo de Festa</label>
                                    <div class="select is-small">
                                        <select name="tipo_festa" id="tipo_festa">
                                            <?php
                                            foreach ($arrTiposFestas as $festa) {
                                                if ($festa == $tipoFesta) {
                                                    echo "<option value='$festa' selected>$festa</option>";
                                                } else {
                                                    echo "<option value='$festa'>$festa</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="contrato">Contrato</label>
                                    <div class="select is-small">
                                        <select name="contrato" id="contrato">
                                            <?php
                                            $arrContrato = ['Sim', 'Não'];
                                            foreach ($arrContrato as $itemArrContrato) {
                                                if ($contrato == $itemArrContrato) {
                                                    echo "<option value='$itemArrContrato' selected>$itemArrContrato</option>";
                                                } else {
                                                    echo "<option value='$itemArrContrtao'>$itemArrContrato</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="subtitle">
                                    <h4>Informações para confirmar com os Pais</h4>
                                </div>
                                <div class="data-info is-flex is-align-items-center">
                                    <label for="data_festa">Data da festa</label>
                                    <input type="date" name="data_festa" id="data_festa" value="<?php echo $dataFesta ?>" class="input is-small">
                                    <label for="horario_inicio">Horario Inicio</label>
                                    <input type="time" name="horario_inicio" id="horario_inicio" value="<?php echo $horarioInicio ?>" class="input is-small">
                                    <label for="horario_fim">Horario de Final</label>
                                    <input type="time" name="horario_fim" id="horario_fim" value="<?php echo $horarioFim ?>" class="input is-small">
                                </div>
                                <div class="aniversariante-info is-flex is-align-items-center">
                                    <label for="aniversariante">Aniversariante</label>
                                    <input type="text" name="aniversariante" id="aniversariante" value="<?php echo $aniversariante ?>" class="input is-small">
                                    <label for="idade">idade</label>
                                    <input type="number" name="idade" id="idade" value="<?php echo $idade ?>" class="input is-small">
                                </div>
                                <div class="convidados-info is-flex is-align-items-center">
                                    <label for="convidados_pagos">Convidados Pagos</label>
                                    <input type="number" name="convidados_pagos" id="convidados_pagos" value="<?php echo $convidadosPagos ?>" class="input is-small">
                                    <label for="convidados_pagantes">Convidados Pagantes</label>
                                    <input type="number" name="convidados_pagantes" id="convidados_pagantes" value="<?php echo $convidadosPagantes ?>" class="input is-small">
                                    <label for="quantidade_adultos">Quantidade Adultos</label>
                                    <input type="number" name="quantidade_adultos" id="quantidade_adultos" value="<?php echo $quantidadeAdultos ?>" class="input is-small">
                                </div>
                                <div class="convidados-info is-flex is-align-items-center">
                                    <label for="quantidade_4">Crianças de 0 a 4</label>
                                    <input type="number" name="quantidade_4" id="quantidade_4" value="<?php echo $quantidadeCriancas4 ?>" class="input is-small">
                                    <label for="quantidade_8">Crianças de 5 a 8</label>
                                    <input type="number" name="quantidade_8" id="quantidade_8" value="<?php echo $quantidadeCriancas8 ?>" class="input is-small">
                                </div>
                                <div class="decoracao-info is-flex is-align-items-center">
                                    <label for="tema">Tema</label>
                                    <input type="text" name="tema" id="tema" value="<?php echo $tema ?>" class="input is-small">
                                    <label for="cor_baloes">Cor dos Balões</label>
                                    <input type="text" name="cor_baloes" id="cor_baloes" value="<?php echo $corBaloes ?>" class="input is-small">
                                    <label for="tipo_baloes">Tipo Balões</label>
                                    <input type="text" name="tipo_baloes" id="tipo_baloes" value="<?php echo $tipoBaloes ?>" class="input is-small">
                                </div>
                                <div class="decoracao-info is-flex is-align-items-center">
                                    <label for="painel">Painel</label>
                                    <input type="text" name="painel" id="painel" value="<?php echo $painel ?>" class="input is-small">
                                    <label for="mesas">Mesas</label>
                                    <input type="text" name="mesas" id="mesas" value="<?php echo $mesas ?>" class="input is-small">
                                    <label for="tapete">Tapete</label>
                                    <input type="text" name="tapete" id="tapete" value="<?php echo $tapete ?>" class="input is-small">
                                </div>
                                <div class="decoracao-info is-flex is-align-items-center">
                                    <label for="bebida_alcoolica">Bebida Alcoólica</label>
                                    <input type="text" name="bebida_alcoolica" id="bebida_alcoolica" value="<?php echo $bebidaAlcoolica ?>" class="input is-small">
                                    <label for="lembrancinhas">Lembrancinhas</label>
                                    <input type="text" name="lembrancinhas" id="lembrancinhas" value="<?php echo $lembrancinhas ?>" class="input is-small">
                                    <label for="doces_decorados">Doces Decorados</label>
                                    <input type="text" name="doces_decorados" id="doces_decorados" value="<?php echo $docesDecorados ?>" class="input is-small">
                                </div>
                                <div class="decoracao-info is-flex is-align-items-center">
                                    <label for="papelaria">Papelaria</label>
                                    <input type="text" name="papelaria" id="papelaria" value="<?php echo $papelaria ?>" class="input is-small">
                                    <label for="retrospectiva">Retrospectiva</label>
                                    <input type="text" name="retrospectiva" id="retrospectiva" value="<?php echo $retrospectiva ?>" class="input is-small">
                                    <label for="tipo_musica">Tipo de Música</label>
                                    <input type="text" name="tipo_musica" id="tipo_musica" value="<?php echo $tipoMusica ?>" class="input is-small">
                                    <label for="personagem_externo">Personagem Externo</label>
                                    <input type="text" name="personagem_externo" id="personagem_externo" value="<?php echo $personagemExterno ?>" class="input is-small">
                                </div>
                            </div>
                            <div class="box">
                                <div class="subtitle">
                                    <h4>Itens Adicionais</h4>
                                </div>
                                <div class="itens-adicionais-info is-flex is-align-items-center">
                                    <label for="valor_adicional">Valor Adicional</label>
                                    <input type="text" name="valor_adicional" id="valor_adicional" value="<?php echo $valorAdicional ?>" class="input is-small">
                                </div>
                                <div class="itens-adicionais-info is-flex is-align-items-center">
                                    <label for="decoracao_extra">Decoração Extra</label>
                                    <input type="text" name="decoracao_extra" id="decoracao_extra" value="<?php echo $decoracaoExtra ?>" class="input is-small">
                                    <label for="item_decoracao_extra">Qual?</label>
                                    <input type="text" name="item_decoracao_extra" id="item_decoracao_extra" value="<?php echo $itemDecoracaoExtra ?>" class="input is-small">
                                </div>
                                <div class="itens-adicionais-info is-flex is-align-items-center">
                                    <label for="flores">Flores</label>
                                    <input type="text" name="flores" id="flores" value="<?php echo $flores ?>" class="input is-small">
                                </div>
                                <div class="itens-adicionais-info is-flex is-align-items-center">
                                    <label for="arvores">Árvores</label>
                                    <input type="text" name="arvores" id="arvores" value="<?php echo $arvores ?>" class="input is-small">
                                    <label for="quantidade_arvores">Quantas?</label>
                                    <input type="text" name="quantidade_arvores" id="quantidade_arvores" value="<?php echo $quantidadeArvores ?>" class="input is-small">
                                </div>
                                <div class="itens-adicionais-info is-flex is-align-items-center">
                                    <label for="folhas">Valor Folhas</label>
                                    <input type="text" name="folhas" id="folhas" value="<?php echo $folhas ?>" class="input is-small">
                                </div>
                                <div class="itens-adicionais-info is-flex is-align-items-center">
                                    <label for="forminhas_especiais">Forminhas Especiais</label>
                                    <input type="text" name="forminhas_especiais" id="forminhas_especiais" value="<?php echo $forminhasEspeciais ?>" class="input is-small">
                                </div>
                                <div class="info-observacoes">
                                    <label for="observacoes">Observações</label>
                                    <textarea name="observacoes" id="observacoes" class="textarea"><?php echo $observacoes ?></textarea>
                                </div>
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
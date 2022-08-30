<?php

session_start();
ob_start();
require_once 'connection.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/partyRegister.css">
    <link rel="stylesheet" href="css/cardapio.css">
    <title>Cadastro Festas</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="section-container-register">
            <form action="" class="form">

                <h1 class="text-center">Formulário de Registro</h1>

                <!-- Progress bar -->
                <!-- <div class="progress-bar">

                </div> -->
                <div class="progress-bar">
                    <div class="progress" id="progress"></div>
                    <div class="progress-step progress-step-active" data-title="Informações da festa">1</div>
                    <div class="progress-step" id="progress-step-2" data-title="Informações de fornecedores">2</div>
                    <div class="progress-step" id="progress-step-3" data-title="Cardápio e escalas">3</div>
                </div>

                <div class="page page-step page-step-active" id="page-1">
                    <div class="title">
                        <h2 class="text-center">Informações da festa</h2>
                    </div>

                    <div class="input-box">
                        <label for="contratante" class="label">Contratante:</label>
                        <input type="text" class="page-1-input" id="contratante" name="contratante">
                    </div>
                    <div class="input-box">
                        <label for="tipo-festa" class="label">Tipo da Festa:</label>
                        <select class="page-1-input" name="tipo_festa" id="tipo_festa">
                            <option value=""></option>
                            <option value="week">Week</option>
                            <option value="light">Light</option>
                            <option value="play">Play</option>
                            <option value="house">House</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="contrato" class="label">Contrato:</label>
                        <input type="text" class="page-1-input" id="contrato" name="contrato">
                    </div>
                    <div class="title">
                        <h3 class="text-center">Informações para confirmar com os pais</h3>
                    </div>
                    <div class="input-box">
                        <label for="data_festa" class="label">Data da festa:</label>
                        <input type="date" class="page-1-input" id="data_festa" name="data_festa">
                    </div>
                    <div class="input-box">
                        <label for="horario_inicio" class="label">Horário de início:</label>
                        <input type="time" class="page-1-input" id="horario_inicio" name="horario_inicio">
                    </div>
                    <div class="input-box">
                        <label for="horario_fim" class="label">Horário de final:</label>
                        <input type="time" class="page-1-input" id="horario_fim" name="horario_fim">
                    </div>
                    <div class="input-box">
                        <label for="aniversariante" class="label">Aniversariante:</label>
                        <input type="text" class="page-1-input" id="aniversariante" name="aniversariante">
                    </div>
                    <div class="input-box">
                        <label for="idade" class="label">idade:</label>
                        <input type="number" class="page-1-input" id="idade" name="idade">
                    </div>
                    <div class="input-box">
                        <label for="convidados_pagos" class="label">Convidados Pagos:</label>
                        <input type="number" class="page-1-input" id="convidados_pagos" name="convidados_pagos">
                    </div>
                    <div class="input-box">
                        <label for="convidados_pagantes" class="label">Convidados Pagantes:</label>
                        <input type="number" class="page-1-input" id="convidados_pagantes" name="convidados_pagantes">
                    </div>
                    <div class="input-box">
                        <label for="qtd_adultos" class="label">Quantidade de Adultos:</label>
                        <input type="text" class="page-1-input" id="qtd_adultos" name="qtd_adultos">
                    </div>
                    <div class="input-box">
                        <label for="criancas_4" class="label">Crianças de 0 a 4 anos:</label>
                        <input type="number" class="page-1-input" id="criancas_4" name="criancas_4">
                    </div>
                    <div class="input-box">
                        <label for="criancas_8" class="label">Crianças de 5 a 8 anos:</label>
                        <input type="number" class="page-1-input" id="criancas_8" name="criancas_8">
                    </div>
                    <div class="input-box">
                        <label for="tema" class="label">Tema:</label>
                        <input type="text" class="page-1-input" id="tema" name="tema">
                    </div>
                    <div class="input-box">
                        <label for="cor_balao" class="label">Cor dos Balões:</label>
                        <input type="text" class="page-1-input" id="cor_balao" name="cor_balao">
                    </div>
                    <div class="input-box">
                        <label for="tipo_baloes" class="label">Tipo dos Balões:</label>
                        <input type="text" class="page-1-input" id="tipo_baloes" name="tipo_baloes">
                    </div>
                    <div class="input-box">
                        <label for="painel" class="label">Painel:</label>
                        <input type="text" class="page-1-input" id="painel" name="painel">
                    </div>
                    <div class="input-box">
                        <label for="tapete" class="label">Tapete:</label>
                        <input type="text" class="page-1-input" id="tapete" name="tapete">
                    </div>
                    <div class="input-box">
                        <label for="bebida_alcoolica" class="label">Bebida Alcoólica:</label>
                        <input type="text" class="page-1-input" id="bebida_alcoolica" name="bebida_alcoolica">
                    </div>
                    <div class="input-box">
                        <label for="lembrancinhas" class="label">Lembrancinhas:</label>
                        <input type="text" class="page-1-input" id="lembrancinhas" name="lembrancinhas">
                    </div>
                    <div class="input-box">
                        <label for="doces_decorados" class="label">Doces decorados:</label>
                        <input type="text" class="page-1-input" id="doces_decorados" name="doces_decorados">
                    </div>
                    <div class="input-box">
                        <label for="papelaria" class="label">Papelaria:</label>
                        <input type="text" class="page-1-input" id="papelaria" name="papelaria">
                    </div>
                    <div class="input-box">
                        <label for="retrospectiva" class="label">Retrospectiva:</label>
                        <input type="text" class="page-1-input" id="retrospectiva" name="retrospectiva">
                    </div>
                    <div class="input-box">
                        <label for="tipo_musica" class="label">Tipo de música:</label>
                        <input type="text" class="page-1-input" id="tipo_musica" name="tipo_musica">
                    </div>
                    <div class="input-box">
                        <label for="personagem_externo" class="label">Personagem externo:</label>
                        <input type="text" class="page-1-input" id="personagem_externo" name="personagem_externo">
                    </div>
                    <div class="title">
                        <h4>Itens Adicionais</h4>
                    </div>
                    <div class="input-box">
                        <label for="valor_adicional">Valor adicional:</label>
                        <input type="text" class="page-1-input" id="valor_adicional" name="valor_adicional">
                    </div>
                    <div class="input-box">
                        <label for="extra_decoracao">Itens extra da decoração:</label>
                        <input type="text" class="page-1-input" id="extra_decoracao" name="extra_decoracao">
                    </div>
                    <div class="input-box">
                        <label for="extra_decoracao_opcao">Qual?</label>
                        <input type="text" class="page-1-input" id="extra_decoracao_opcao" name="extra_decoracao_opcao">
                    </div>
                    <div class="input-box">
                        <label for="flores">Flores:</label>
                        <input type="text" class="page-1-input" id="flores" name="flores">
                    </div>
                    <div class="input-box">
                        <label for="arvores">Árvores:</label>
                        <input type="text" class="page-1-input" id="arvores" name="arvores">
                    </div>
                    <div class="input-box">
                        <label for="quantas_arvores">Quantas:</label>
                        <input type="text" class="page-1-input" id="quantas_arvores" name="quantas_arvores">
                    </div>
                    <div class="input-box">
                        <label for="folhas">Folhas:</label>
                        <input type="text" class="page-1-input" id="folhas" name="folhas">
                    </div>
                    <div class="input-box">
                        <label for="forminhas_especiais">Forminhas Especiais:</label>
                        <input type="text" class="page-1-input" id="forminhas_especiais" name="forminhas_especiais">
                    </div>
                    <div class="observation-box">
                        <label for="observacoes">Observações:</label>
                        <textarea name="observacoes" class="page-1-input" id="observacoes" cols="60" rows="5"></textarea>
                    </div>
                    <div class="container-btn">
                        <button class="btn-next" class="page-1-input" id="btn-next-1" type="button">Próximo</button>
                    </div>
                </div>

                <div class="page page-step" id="page-2">
                    <div class="title">
                        <h2>Informações de Fornecedores</h2>
                    </div>
                    <div class="container-fornecedores">
                        <table>
                            <thead>
                                <tr>
                                    <th>item</th>
                                    <th>Fornecedores</th>
                                    <th>Telefone</th>
                                    <th>Data</th>
                                    <th>Por</th>
                                    <th>Confirmado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Decoração</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-decoracao" name="fornecedores-decoracao"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-decoracao" name="telefone-decoracao"></td>
                                    <td><input type="date" class="page-2-input" id="data-decoracao" name="data-decoracao"></td>
                                    <td><input type="text" class="page-2-input" id="por-decoracao" name="por-decoracao"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-decoracao" name="confirmado-decoracao"></td>
                                </tr>
                                <tr>
                                    <td>Papelaria</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-papelaria" name="fornecedores-papelaria"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-papelaria" name="telefone-papelaria"></td>
                                    <td><input type="date" class="page-2-input" id="data-papelaria" name="data-papelaria"></td>
                                    <td><input type="text" class="page-2-input" id="por-papelaria" name="por-papelaria"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-papelaria" name="confirmado-papelaria"></td>
                                </tr>
                                <tr>
                                    <td>Convite</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-convite" name="fornecedores-convite"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-convite" name="telefone-convite"></td>
                                    <td><input type="date" class="page-2-input" id="data-convite" name="data-convite"></td>
                                    <td><input type="text" class="page-2-input" id="por-convite" name="por-convite"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-convite" name="confirmado-convite"></td>
                                </tr>
                                <tr>
                                    <td>Bolo Fake</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-bolo-fake" name="fornecedores-bolo-fake"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-bolo-fake" name="telefone-bolo-fake"></td>
                                    <td><input type="date" class="page-2-input" id="data-bolo-fake" name="data-bolo-fake"></td>
                                    <td><input type="text" class="page-2-input" id="por-bolo-fake" name="por-bolo-fake"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-bolo-fake" name="confirmado-bolo-fake"></td>
                                </tr>
                                <tr>
                                    <td>Salgados</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-salgadados" name="fornecedores-salgadados"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-salgadados" name="telefone-salgadados"></td>
                                    <td><input type="date" class="page-2-input" id="data-salgadados" name="data-salgadados"></td>
                                    <td><input type="text" class="page-2-input" id="por-salgadados" name="por-salgadados"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-salgadados" name="confirmado-salgadados"></td>
                                </tr>
                                <tr>
                                    <td>Doces</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-doces" name="fornecedores-doces"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-doces" name="telefone-doces"></td>
                                    <td><input type="date" class="page-2-input" id="data-doces" name="data-doces"></td>
                                    <td><input type="text" class="page-2-input" id="por-doces" name="por-doces"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-doces" name="confirmado-doces"></td>
                                </tr>
                                <tr>
                                    <td>Bolo (espumone)</td>
                                    <td><input type="text" class="page-2-input" id="fornecedores-espumone" name="fornecedores-espumone"></td>
                                    <td><input type="text" class="page-2-input" id="telefone-espumone" name="telefone-espumone"></td>
                                    <td><input type="date" class="page-2-input" id="data-espumone" name="data-espumone"></td>
                                    <td><input type="text" class="page-2-input" id="por-espumone" name="por-espumone"></td>
                                    <td><input type="text" class="page-2-input" id="confirmado-espumone" name="confirmado-espumone"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="containter-btn">
                        <button class="btn-next" id="btn-prev-1" type="button">Anterior</button>
                        <button class="btn-next" id="btn-next-2" type="button">Próximo</button>
                    </div>
                </div>
                <div class="page page-step" id="page-3">
                    <div class="title">
                        <h2>Cardápio e Escalas</h2>
                    </div>
                    <div class="subtitle">
                        <h3>Cardápio</h3>
                    </div>
                    <div id="result">

                    </div>

                    <div class="containter-btn">
                        <button class="btn-next" id="btn-prev-2" type="button">Anterior</button>
                        <button class="btn-next" id="btn-registrar" type="button">Registrar</button>
                    </div>
                </div>

            </form>

        </section>
    </main>

    <script src="js/partyRegister.js"></script>
</body>

</html>
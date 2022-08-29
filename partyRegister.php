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
                <div class="progress-bar">
                    <div class="progress-step progress-step-active" data-title="Informações da festa">1</div>
                    <div class="progress-step" data-title="Informações de fornecedores">2</div>
                    <div class="progress-step" data-title="Cardápio e escalas">3</div>
                </div>

                <div class="page page-step page-step-active">
                    <div class="title">
                        <h2 class="text-center">Informações da festa</h2>
                    </div>

                    <div class="input-box">
                        <label for="contratante" class="label">Contratante:</label>
                        <input type="text" id="contratante" name="contratante">
                    </div>
                    <div class="input-box">
                        <label for="tipo-festa" class="label">Tipo da Festa:</label>
                        <input type="text" id="tipo-festa" name="tipo-festa">
                    </div>
                    <div class="input-box">
                        <label for="contrato" class="label">Contrato:</label>
                        <input type="text" id="contrato" name="contrato">
                    </div>
                    <div class="title">
                        <h3 class="text-center">Informações para confirmar com os pais</h3>
                    </div>
                    <div class="input-box">
                        <label for="data_festa" class="label">Data da festa:</label>
                        <input type="date" id="data_festa" name="data_festa">
                    </div>
                    <div class="input-box">
                        <label for="horario_inicio" class="label">Horário de início:</label>
                        <input type="time" id="horario_inicio" name="horario_inicio">
                    </div>
                    <div class="input-box">
                        <label for="horario_fim" class="label">Horário de final:</label>
                        <input type="time" id="horario_fim" name="horario_fim">
                    </div>
                    <div class="input-box">
                        <label for="aniversariante" class="label">Aniversariante:</label>
                        <input type="text" id="aniversariante" aniversariante="name">
                    </div>
                    <div class="input-box">
                        <label for="idade" class="label">idade:</label>
                        <input type="number" id="idade" name="idade">
                    </div>
                    <div class="input-box">
                        <label for="convidados_pagos" class="label">Convidados Pagos:</label>
                        <input type="number" id="convidados_pagos" name="convidados_pagos">
                    </div>
                    <div class="input-box">
                        <label for="convidados_pagantes" class="label">Convidados Pagantes:</label>
                        <input type="number" id="convidados_pagantes" name="convidados_pagantes">
                    </div>
                    <div class="input-box">
                        <label for="qtd_adultos" class="label">Quantidade de Adultos:</label>
                        <input type="text" id="qtd_adultos" name="qtd_adultos">
                    </div>
                    <div class="input-box">
                        <label for="criancas_4" class="label">Crianças de 0 a 4 anos:</label>
                        <input type="number" id="criancas_4" name="criancas_4">
                    </div>
                    <div class="input-box">
                        <label for="criancas_8" class="label">Crianças de 5 a 8 anos:</label>
                        <input type="number" id="criancas_8" name="criancas_8">
                    </div>
                    <div class="input-box">
                        <label for="tema" class="label">Tema:</label>
                        <input type="text" id="tema" name="tema">
                    </div>
                    <div class="input-box">
                        <label for="cor_balao" class="label">Cor dos Balões:</label>
                        <input type="text" id="cor_balao" name="cor_balao">
                    </div>
                    <div class="input-box">
                        <label for="tipo_baloes" class="label">Tipo dos Balões:</label>
                        <input type="text" id="tipo_baloes" name="tipo_baloes">
                    </div>
                    <div class="input-box">
                        <label for="painel" class="label">Painel:</label>
                        <input type="text" id="painel" name="painel">
                    </div>
                    <div class="input-box">
                        <label for="tapete" class="label">Tapete:</label>
                        <input type="text" id="tapete" name="tapete">
                    </div>
                    <div class="input-box">
                        <label for="bebida_alcoolica" class="label">Bebida Alcoólica:</label>
                        <input type="text" id="bebida_alcoolica" name="bebida_alcoolica">
                    </div>
                    <div class="input-box">
                        <label for="lembrancinhas" class="label">Lembrancinhas:</label>
                        <input type="text" id="lembrancinhas" name="lembrancinhas">
                    </div>
                    <div class="input-box">
                        <label for="doces_decorados" class="label">Doces decorados:</label>
                        <input type="text" id="doces_decorados" name="doces_decorados">
                    </div>
                    <div class="input-box">
                        <label for="papelaria" class="label">Papelaria:</label>
                        <input type="text" id="papelaria" name="papelaria">
                    </div>
                    <div class="input-box">
                        <label for="retrospectiva" class="label">Retrospectiva:</label>
                        <input type="text" id="retrospectiva" name="retrospectiva">
                    </div>
                    <div class="input-box">
                        <label for="tipo_musica" class="label">Tipo de música:</label>
                        <input type="text" id="tipo_musica" name="tipo_musica">
                    </div>
                    <div class="input-box">
                        <label for="personagem_externo" class="label">Personagem externo:</label>
                        <input type="text" id="personagem_externo" name="personagem_externo">
                    </div>
                    <div class="title">
                        <h4>Itens Adicionais</h4>
                    </div>
                    <div class="input-box">
                        <label for="valor_adicional">Valor adicional:</label>
                        <input type="text" id="valor_adicional" name="valor_adicional">
                    </div>
                    <div class="input-box">
                        <label for="extra_decoracao">Itens extra da decoração:</label>
                        <input type="text" id="extra_decoracao" name="extra_decoracao">
                    </div>
                    <div class="input-box">
                        <label for="extra_decoracao_opcao">Qual?</label>
                        <input type="text" id="extra_decoracao_opcao" name="extra_decoracao_opcao">
                    </div>
                    <div class="input-box">
                        <label for="flores">Flores:</label>
                        <input type="text" id="flores" name="flores">
                    </div>
                    <div class="input-box">
                        <label for="arvores">Árvores:</label>
                        <input type="text" id="arvores" name="arvores">
                    </div>
                    <div class="input-box">
                        <label for="quantas_arvores">Quantas:</label>
                        <input type="text" id="quantas_arvores" name="quantas_arvores">
                    </div>
                    <div class="input-box">
                        <label for="folhas">Folhas:</label>
                        <input type="text" id="folhas" name="folhas">
                    </div>
                    <div class="input-box">
                        <label for="forminhas_especiais">Forminhas Especiais:</label>
                        <input type="text" id="forminhas_especiais" name="forminhas_especiais">
                    </div>
                    <div class="observation-box">
                        <label for="observacoes">Observações:</label>
                        <textarea name="observacoes" id="observacoes" cols="60" rows="5"></textarea>
                    </div>
                </div>
                <div class="container-btn">
                    <button class="btn-next" type="button">Próximo</button>
                </div>
                <div class="page page-step">
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
                                    <td><input type="text" id="fornecedores-decoracao" name="fornecedores-decoracao"></td>
                                    <td><input type="text" id="telefone-decoracao" name="telefone-decoracao"></td>
                                    <td><input type="text" id="data-decoracao" name="data-decoracao"></td>
                                    <td><input type="text" id="por-decoracao" name="por-decoracao"></td>
                                    <td><input type="text" id="confirmado-decoracao" name="confirmado-decoracao"></td>
                                </tr>
                                <tr>
                                    <td>Papelaria</td>
                                    <td><input type="text" id="fornecedores-papelaria" name="fornecedores-papelaria"></td>
                                    <td><input type="text" id="telefone-papelaria" name="telefone-papelaria"></td>
                                    <td><input type="text" id="data-papelaria" name="data-papelaria"></td>
                                    <td><input type="text" id="por-papelaria" name="por-papelaria"></td>
                                    <td><input type="text" id="confirmado-papelaria" name="confirmado-papelaria"></td>
                                </tr>
                                <tr>
                                    <td>Convite</td>
                                    <td><input type="text" id="fornecedores-convite" name="fornecedores-convite"></td>
                                    <td><input type="text" id="telefone-convite" name="telefone-convite"></td>
                                    <td><input type="text" id="data-convite" name="data-convite"></td>
                                    <td><input type="text" id="por-convite" name="por-convite"></td>
                                    <td><input type="text" id="confirmado-convite" name="confirmado-convite"></td>
                                </tr>
                                <tr>
                                    <td>Bolo Fake</td>
                                    <td><input type="text" id="fornecedores-bolo-fake" name="fornecedores-bolo-fake"></td>
                                    <td><input type="text" id="telefone-bolo-fake" name="telefone-bolo-fake"></td>
                                    <td><input type="text" id="data-bolo-fake" name="data-bolo-fake"></td>
                                    <td><input type="text" id="por-bolo-fake" name="por-bolo-fake"></td>
                                    <td><input type="text" id="confirmado-bolo-fake" name="confirmado-bolo-fake"></td>
                                </tr>
                                <tr>
                                    <td>Salgados</td>
                                    <td><input type="text" id="fornecedores-salgadados" name="fornecedores-salgadados"></td>
                                    <td><input type="text" id="telefone-salgadados" name="telefone-salgadados"></td>
                                    <td><input type="text" id="data-salgadados" name="data-salgadados"></td>
                                    <td><input type="text" id="por-salgadados" name="por-salgadados"></td>
                                    <td><input type="text" id="confirmado-salgadados" name="confirmado-salgadados"></td>
                                </tr>
                                <tr>
                                    <td>Doces</td>
                                    <td><input type="text" id="fornecedores-doces" name="fornecedores-doces"></td>
                                    <td><input type="text" id="telefone-doces" name="telefone-doces"></td>
                                    <td><input type="text" id="data-doces" name="data-doces"></td>
                                    <td><input type="text" id="por-doces" name="por-doces"></td>
                                    <td><input type="text" id="confirmado-doces" name="confirmado-doces"></td>
                                </tr>
                                <tr>
                                    <td>Bolo (espumone)</td>
                                    <td><input type="text" id="fornecedores-espumone" name="fornecedores-espumone"></td>
                                    <td><input type="text" id="telefone-espumone" name="telefone-espumone"></td>
                                    <td><input type="text" id="data-espumone" name="data-espumone"></td>
                                    <td><input type="text" id="por-espumone" name="por-espumone"></td>
                                    <td><input type="text" id="confirmado-espumone" name="confirmado-espumone"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="containter-btn">
                        <button class="btn-next" type="button">Próximo</button>
                    </div>
                </div>
                <div class="page page-step page-step-active">
                    <div class="title">
                        <h2>Cardápio e Escalas</h2>
                    </div>
                    <div class="subtitle">
                        <h3>Cardápio</h3>
                    </div>
                    <?php
                        include 'components/cardapioWeek.html';
                    ?>
                </div>
            </form>

        </section>
    </main>

</body>

</html>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/partyRegister.css">
    <link rel="stylesheet" href="css/cardapio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" defer></script>
    <script src="js/partyRegister.js" defer></script>
    <title>Cadastro Festas</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="section-container-register section">

            <?php

            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?>

            <form action="php/partyRegister/register.php" method="POST" class="form">

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
                        <input type="text" class="input" placeholder="Contratante" id="contratante" name="contratante">
                    </div>
                    <div class="input-box select">
                        <label for="tipo-festa" class="label">Tipo da Festa:</label>
                        <select name="tipo_festa" id="tipo_festa">
                            <option value=""></option>
                            <option value="week">Week</option>
                            <option value="light">Light</option>
                            <option value="play">Play</option>
                            <option value="house">House</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="contrato" class="label">Contrato:</label>
                        <input type="text" class="input" id="contrato" placeholder="Contrato" name="contrato">
                    </div>
                    <div class="input-box">
                        <label for="valor" class="label">Valor:</label>
                        <input type="text" class="input" id="valor" placeholder="Valor" name="valor">
                    </div>
                    <div class="title">
                        <h3 class="text-center">Informações para confirmar com os pais</h3>
                    </div>
                    <div class="input-box">
                        <label for="data_festa" class="label">Data da festa:</label>
                        <input type="date" class="input" id="data_festa" name="data_festa" placeholder="Data da Festa">
                    </div>
                    <div class="input-box">
                        <label for="horario_inicio" class="label">Horário de início:</label>
                        <input type="time" class="input" id="horario_inicio" name="horario_inicio" placeholder="Horario de Início">
                    </div>
                    <div class="input-box">
                        <label for="horario_fim" class="label">Horário de final:</label>
                        <input type="time" class="input" id="horario_fim" name="horario_fim" placeholder="Horário Final">
                    </div>
                    <div class="input-box">
                        <label for="aniversariante" class="label">Aniversariante:</label>
                        <input type="text" class="input" id="aniversariante" name="aniversariante" placeholder="Aniversariante">
                    </div>
                    <div class="input-box">
                        <label for="idade" class="label">idade:</label>
                        <input type="text" class="input" id="idade" name="idade" placeholder="Idade">
                    </div>
                    <div class="input-box">
                        <label for="convidados_pagos" class="label">Convidados Pagos:</label>
                        <input type="number" class="input" id="convidados_pagos" name="convidados_pagos" placeholder="Convidados Pagos">
                    </div>
                    <div class="input-box">
                        <label for="convidados_pagantes" class="label">Convidados Pagantes:</label>
                        <input type="number" class="input" id="convidados_pagantes" name="convidados_pagantes" placeholder="Convidados Pagantes">
                    </div>
                    <div class="input-box">
                        <label for="qtd_adultos" class="label">Quantidade de Adultos:</label>
                        <input type="text" class="input" id="qtd_adultos" name="qtd_adultos" placeholder="Quantidade de Adultos">
                    </div>
                    <div class="input-box">
                        <label for="criancas_4" class="label">Crianças de 0 a 4 anos:</label>
                        <input type="number" class="input" id="criancas_4" name="criancas_4" placeholder="Crianças de 0 a 4 Anos">
                    </div>
                    <div class="input-box">
                        <label for="criancas_8" class="label">Crianças de 5 a 8 anos:</label>
                        <input type="number" class="input" id="criancas_8" name="criancas_8" placeholder="Crianças de 5 a 8 anos">
                    </div>
                    <div class="input-box">
                        <label for="tema" class="label">Tema:</label>
                        <input type="text" class="input" id="tema" name="tema" placeholder="Tema">
                    </div>
                    <div class="input-box">
                        <label for="cor_balao" class="label">Cor dos Balões:</label>
                        <input type="text" class="input" id="cor_balao" name="cor_balao" placeholder="Cor dos Balões">
                    </div>
                    <div class="input-box">
                        <label for="tipo_baloes" class="label">Tipo dos Balões:</label>
                        <input type="text" class="input" id="tipo_baloes" name="tipo_baloes" placeholder="Tipo dos Balões">
                    </div>
                    <div class="input-box">
                        <label for="painel" class="label">Painel:</label>
                        <input type="text" class="input" id="painel" name="painel" placeholder="Painel">
                    </div>
                    <div class="input-box">
                        <label for="tapete" class="label">Tapete:</label>
                        <input type="text" class="input" id="tapete" name="tapete" placeholder="Tapete">
                    </div>
                    <div class="input-box">
                        <label for="bebida_alcoolica" class="label">Bebida Alcoólica:</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="Sim" name="bebida_aloolica_resposta" class="bebida_alcoolica">
                                Sim
                            </label>
                            <label class="radio">
                                <input type="radio" checked value="Não" name="bebida_aloolica_resposta" class="bebida_alcoolica">
                                Não
                            </label>
                        </div>
                        <input type="text" class="input none" id="bebida_alcoolica" name="bebida_alcoolica" placeholder="Bebida Alcoólica">
                    </div>
                    <div class="input-box">
                        <label for="lembrancinhas" class="label">Lembrancinhas:</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="Sim" name="lembrancinhas_resposta" class="lembrancinhas">
                                Sim
                            </label>
                            <label class="radio">
                                <input type="radio" checked value="Não" name="lembrancinhas_resposta" class="lembrancinhas">
                                Não
                            </label>
                        </div>
                        <input type="text" class="input none" id="lembrancinhas" name="lembrancinhas" placeholder="Lembrancinhas">
                    </div>
                    <div class="input-box">
                        <label for="doces_decorados" class="label">Doces decorados:</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="Sim" name="doces_decorados_resposta" class="doces_decorados">
                                Sim
                            </label>
                            <label class="radio">
                                <input type="radio" checked value="Não" name="doces_decorados_resposta" class="doces_decorados">
                                Não
                            </label>
                        </div>
                        <input type="text" class="input none" id="doces_decorados" name="doces_decorados" placeholder="Doces Decorados">
                    </div>
                    <div class="input-box">
                        <label for="papelaria" class="label">Papelaria:</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="Sim" name="papelaria_resposta" class="papelaria">
                                Sim
                            </label>
                            <label class="radio">
                                <input type="radio" checked value="Não" name="papelaria_resposta" class="papelaria">
                                Não
                            </label>
                        </div>
                        <input type="text" class="input none" id="papelaria" name="papelaria" placeholder="Papelaria">
                    </div>
                    <div class="input-box">
                        <label for="retrospectiva" class="label">Retrospectiva:</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="Sim" name="retrospectiva_resposta" class="retrospectiva">
                                Sim
                            </label>
                            <label class="radio">
                                <input type="radio" checked value="Não" name="retrospectiva_resposta" class="retrospectiva">
                                Não
                            </label>
                        </div>
                        <input type="text" class="input none" id="retrospectiva" name="retrospectiva" placeholder="Retrospectiva">
                    </div>
                    <div class="input-box">
                        <label for="personagem_externo" class="label">Personagem externo:</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="Sim" name="personagem_externo_resposta" class="personagem_externo">
                                Sim
                            </label>
                            <label class="radio">
                                <input type="radio" checked value="Não" name="personagem_externo_resposta" class="personagem_externo">
                                Não
                            </label>
                        </div>
                        <input type="text" class="input none" id="personagem_externo" name="personagem_externo" placeholder="Personagem Externo">
                    </div>
                    <div class="input-box">
                        <label for="tipo_musica" class="label">Tipo de música:</label>
                        <input type="text" class="input" id="tipo_musica" name="tipo_musica" placeholder="Tipo de música">
                    </div>

                    <div class="title">
                        <h4>Itens Adicionais</h4>
                    </div>
                    <div class="input-box">
                        <label for="valor_adicional">Valor adicional:</label>
                        <input type="text" class="input" id="valor_adicional" name="valor_adicional" placeholder="Valor Adicional">
                    </div>
                    <div class="input-box">
                        <label for="extra_decoracao">Itens extra da decoração:</label>
                        <input type="text" class="input" id="extra_decoracao" name="extra_decoracao" placeholder="Itens extra de decoração">
                    </div>
                    <div class="input-box">
                        <label for="extra_decoracao_opcao">Qual?</label>
                        <input type="text" class="input" id="extra_decoracao_opcao" name="extra_decoracao_opcao" placeholder="Qual?">
                    </div>
                    <div class="input-box">
                        <label for="flores">Flores:</label>
                        <input type="text" class="input" id="flores" name="flores" placeholder="Flores">
                    </div>
                    <div class="input-box">
                        <label for="arvores">Árvores:</label>
                        <input type="text" class="input" id="arvores" name="arvores" placeholder="Árvores">
                    </div>
                    <div class="input-box">
                        <label for="quantas_arvores">Quantas:</label>
                        <input type="text" class="input" id="quantas_arvores" name="quantas_arvores" placeholder="Quantas">
                    </div>
                    <div class="input-box">
                        <label for="folhas">Folhas:</label>
                        <input type="text" class="input" id="folhas" name="folhas" placeholder="Folhas">
                    </div>
                    <div class="input-box">
                        <label for="forminhas_especiais">Forminhas Especiais:</label>
                        <input type="text" class="input" id="forminhas_especiais" name="forminhas_especiais" placeholder="Forminhas Especiais">
                    </div>
                    <div class="observation-box">
                        <label for="observacoes">Observações:</label>
                        <textarea name="observacoes" class="textarea" placeholder="Observações" id="observacoes" cols="60" rows="5"></textarea>
                    </div>
                    <div class="container-btn">
                        <button class="btn-next" class="input" id="btn-next-1" type="button">Próximo</button>
                    </div>
                </div>

                <div class="page page-step" id="page-2">
                    <div class="title">
                        <h2>Informações de Fornecedores</h2>
                    </div>
                    <div class="center-div container">
                        <table class="table scroll-table">
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
                                    <td>
                                        <label class="checkbox">
                                            Decoração
                                            <input type="checkbox" checked id="decoracao">
                                        </label>
                                    </td>
                                    <td class="decoracao"><input type="text" class="input is-small" id="fornecedores-decoracao" name="fornecedores-decoracao"></td>
                                    <td class="decoracao"><input type="text" class="input is-small" id="telefone-decoracao" name="telefone-decoracao"></td>
                                    <td class="decoracao"><input type="date" class="input is-small" id="data-decoracao" name="data-decoracao"></td>
                                    <td class="decoracao"><input type="text" class="input is-small" id="por-decoracao" name="por-decoracao"></td>
                                    <td class="decoracao"><input type="text" class="input is-small" id="confirmado-decoracao" name="confirmado-decoracao"></td>
                                </tr>
                                <tr>
                                    <td>Papelaria</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-papelaria" name="fornecedores-papelaria"></td>
                                    <td><input type="text" class="input is-small" id="telefone-papelaria" name="telefone-papelaria"></td>
                                    <td><input type="date" class="input is-small" id="data-papelaria" name="data-papelaria"></td>
                                    <td><input type="text" class="input is-small" id="por-papelaria" name="por-papelaria"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-papelaria" name="confirmado-papelaria"></td>
                                </tr>
                                <tr>
                                    <td>Convite</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-convite" name="fornecedores-convite"></td>
                                    <td><input type="text" class="input is-small" id="telefone-convite" name="telefone-convite"></td>
                                    <td><input type="date" class="input is-small" id="data-convite" name="data-convite"></td>
                                    <td><input type="text" class="input is-small" id="por-convite" name="por-convite"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-convite" name="confirmado-convite"></td>
                                </tr>
                                <tr>
                                    <td>Bolo Fake</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-bolo-fake" name="fornecedores-bolo-fake"></td>
                                    <td><input type="text" class="input is-small" id="telefone-bolo-fake" name="telefone-bolo-fake"></td>
                                    <td><input type="date" class="input is-small" id="data-bolo-fake" name="data-bolo-fake"></td>
                                    <td><input type="text" class="input is-small" id="por-bolo-fake" name="por-bolo-fake"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-bolo-fake" name="confirmado-bolo-fake"></td>
                                </tr>
                                <tr>
                                    <td>Salgados</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-salgadados" name="fornecedores-salgadados"></td>
                                    <td><input type="text" class="input is-small" id="telefone-salgadados" name="telefone-salgadados"></td>
                                    <td><input type="date" class="input is-small" id="data-salgadados" name="data-salgadados"></td>
                                    <td><input type="text" class="input is-small" id="por-salgadados" name="por-salgadados"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-salgadados" name="confirmado-salgadados"></td>
                                </tr>
                                <tr>
                                    <td>Doces</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-doces" name="fornecedores-doces"></td>
                                    <td><input type="text" class="input is-small" id="telefone-doces" name="telefone-doces"></td>
                                    <td><input type="date" class="input is-small" id="data-doces" name="data-doces"></td>
                                    <td><input type="text" class="input is-small" id="por-doces" name="por-doces"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-doces" name="confirmado-doces"></td>
                                </tr>
                                <tr>
                                    <td>Bolo (espumone)</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-espumone" name="fornecedores-espumone"></td>
                                    <td><input type="text" class="input is-small" id="telefone-espumone" name="telefone-espumone"></td>
                                    <td><input type="date" class="input is-small" id="data-espumone" name="data-espumone"></td>
                                    <td><input type="text" class="input is-small" id="por-espumone" name="por-espumone"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-espumone" name="confirmado-espumone"></td>
                                </tr>
                                <tr>
                                    <td>Bolo 2 (espumone)</td>
                                    <td><input type="text" class="input is-small" id="fornecedores-espumone-2" name="fornecedores-espumone-2"></td>
                                    <td><input type="text" class="input is-small" id="telefone-espumone-2" name="telefone-espumone-2"></td>
                                    <td><input type="date" class="input is-small" id="data-espumone-2" name="data-espumone-2"></td>
                                    <td><input type="text" class="input is-small" id="por-espumone-2" name="por-espumone-2"></td>
                                    <td><input type="text" class="input is-small" id="confirmado-espumone-2" name="confirmado-espumone-2"></td>
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
                        <button class="btn-next" name="register" id="btn-registrar" type="submit">Registrar</button>
                    </div>
                </div>

            </form>

        </section>
    </main>


</body>

</html>
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
    <link rel="stylesheet" href="css/info-fornecedores.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $select = $mysqli->query("SELECT * FROM decoracao WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresDecoracao = $row['fornecedores'];
            $telefoneDecoracao = $row['telefone'];
            $dataDecoracao = $row['data'];
            $porDecoracao = $row['por'];
            $confirmadoDecoracao = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM papelaria WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresPapelaria = $row['fornecedores'];
            $telefonePapelaria = $row['telefone'];
            $dataPapelaria = $row['data'];
            $porPapelaria = $row['por'];
            $confirmadoPapelaria = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM convite WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresConvite = $row['fornecedores'];
            $telefoneConvite = $row['telefone'];
            $dataConvite = $row['data'];
            $porConvite = $row['por'];
            $confirmadoConvite = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM bolo_fake WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresBoloFake = $row['fornecedores'];
            $telefoneBoloFake = $row['telefone'];
            $dataBoloFake = $row['data'];
            $porBoloFake = $row['por'];
            $confirmadoBoloFake = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM salgados WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresSalgados = $row['fornecedores'];
            $telefoneSalgados = $row['telefone'];
            $dataSalgados = $row['data'];
            $porSalgados = $row['por'];
            $confirmadoSalgados = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM doces_festa WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresDoces = $row['fornecedores'];
            $telefoneDoces = $row['telefone'];
            $dataDoces = $row['data'];
            $porDoces = $row['por'];
            $confirmadoDoces = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM espumone WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresEspumone = $row['fornecedores'];
            $telefoneEspumone = $row['telefone'];
            $dataEspumone = $row['data'];
            $porEspumone = $row['por'];
            $confirmadoEspumone = $row['confirmado'];

            $select = $mysqli->query("SELECT * FROM espumone_2 WHERE id_festa='$id'");

            $row = $select->fetch_assoc();

            $fornecedoresEspumone2 = $row['fornecedores'];
            $telefoneEspumone2 = $row['telefone'];
            $dataEspumone2 = $row['data'];
            $porEspumone2 = $row['por'];
            $confirmadoEspumone2 = $row['confirmado'];


            $opcoesConfirmado = ['Sim', 'Não', 'Pré-reserva'];
        }
        ?>
    </header>
    <main>
        <form class="section" action="php/partyDetails/updateInfoFornecedores.php?id=<?php echo $id ?>" method="post">
            <div class="container">
                <div class="title">
                    <h3>Informações dos Fornecedores</h3>
                </div>
                <div class="msg">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="s-flex is-align-items-center is-justify-content-center">
                    <table class="table scroll-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>fornecedores</th>
                                <th>telefone</th>
                                <th>Data</th>
                                <th>Por</th>
                                <th>Confirmado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Decoração</td>
                                <td><input type="text" value="<?php echo $fornecedoresDecoracao ?>" id="fornecedores-decoracao" name="fornecedores-decoracao" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneDecoracao ?>" id="telefone-decoracao" name="telefone-decoracao" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataDecoracao ?>" id="data-decoracao" name="data-decoracao" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porDecoracao ?>" id="por-decoracao" name="por-decoracao" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-decoracao" id="confirmado-decoracao">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoDecoracao) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Papelaria</td>
                                <td><input type="text" value="<?php echo $fornecedoresPapelaria ?>" id="fornecedores-papelaria" name="fornecedores-papelaria" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefonePapelaria ?>" id="telefone-papelaria" name="telefone-papelaria" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataPapelaria ?>" id="data-papelaria" name="data-papelaria" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porPapelaria ?>" id="por-papelaria" name="por-papelaria" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-papelaria" id="confirmado-papelaria">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoPapelaria) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Convite</td>
                                <td><input type="text" value="<?php echo $fornecedoresConvite ?>" id="fornecedores-convite" name="fornecedores-convite" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneConvite ?>" id="telefone-convite" name="telefone-convite" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataConvite ?>" id="data-convite" name="data-convite" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porConvite ?>" id="por-convite" name="por-convite" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-convite" id="confirmado-convite">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoConvite) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bolo Fake</td>
                                <td><input type="text" value="<?php echo $fornecedoresBoloFake ?>" id="fornecedores-bolo-fake" name="fornecedores-bolo-fake" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneBoloFake ?>" id="telefone-bolo-fake" name="telefone-bolo-fake" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataBoloFake ?>" id="data-bolo-fake" name="data-bolo-fake" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porBoloFake ?>" id="por-bolo-fake" name="por-bolo-fake" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-bolo-fake" id="confirmado-bolo-fake">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoBoloFake) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Salgados</td>
                                <td><input type="text" value="<?php echo $fornecedoresSalgados ?>" id="fornecedores-salgadados" name="fornecedores-salgados" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneSalgados ?>" id="telefone-salgados" name="telefone-salgados" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataSalgados ?>" id="data-salgados" name="data-salgados" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porSalgados ?>" id="por-salgados" name="por-salgados" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-salgados" id="confirmado-salgados">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoSalgados) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Doces</td>
                                <td><input type="text" value="<?php echo $fornecedoresDoces ?>" id="fornecedores-doces" name="fornecedores-doces" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneDoces ?>" id="telefone-doces" name="telefone-doces" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataDoces ?>" id="data-doces" name="data-doces" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porDoces ?>" id="por-doces" name="por-doces" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-doces" id="confirmado-doces">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoDoces) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bolo (espumone)</td>
                                <td><input type="text" value="<?php echo $fornecedoresEspumone ?>" id="fornecedores-espumone" name="fornecedores-espumone" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneEspumone ?>" id="telefone-espumone" name="telefone-espumone" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataEspumone ?>" id="data-espumone" name="data-espumone" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porEspumone ?>" id="por-espumone" name="por-espumone" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-espumone" id="confirmado-espumone">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoEspumone) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Bolo 2 (espumone)</td>
                                <td><input type="text" value="<?php echo $fornecedoresEspumone2 ?>" id="fornecedores-espumone-2" name="fornecedores-espumone-2" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $telefoneEspumone2 ?>" id="telefone-espumone-2" name="telefone-espumone-2" class="input is-small"></td>
                                <td><input type="date" value="<?php echo $dataEspumone2 ?>" id="data-espumone-2" name="data-espumone-2" class="input is-small"></td>
                                <td><input type="text" value="<?php echo $porEspumone2 ?>" id="por-espumone-2" name="por-espumone-2" class="input is-small"></td>
                                <td>
                                    <div class="select is-small">
                                        <select name="confirmado-espumone-2" id="confirmado-espumone-2">
                                            <?php
                                            foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                                if ($opcaoConfirmado == $confirmadoEspumone2) {
                                                    echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                                } else {
                                                    echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn-container">
                        <button class="salvar-btn" name="salvar">Salvar</button>
                    </div>

                </div>
            </div>
        </form>
    </main>
</body>
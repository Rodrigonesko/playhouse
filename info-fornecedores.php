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

            $opcoesConfirmado = ['Sim', 'Não', 'Pré-reserva'];
        }
        ?>
    </header>
    <main>
        <form action="php/partyDetails/updateInfoFornecedores.php?id=<?php echo $id ?>" method="post">
            <div class="info-fornecedores-container">
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
                <div class="table-container">
                    <table>
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
                                <td><input type="text" value="<?php echo $fornecedoresDecoracao ?>" id="fornecedores-decoracao" name="fornecedores-decoracao"></td>
                                <td><input type="text" value="<?php echo $telefoneDecoracao ?>" id="telefone-decoracao" name="telefone-decoracao"></td>
                                <td><input type="date" value="<?php echo $dataDecoracao ?>" id="data-decoracao" name="data-decoracao"></td>
                                <td><input type="text" value="<?php echo $porDecoracao ?>" id="por-decoracao" name="por-decoracao"></td>
                                <td><select name="confirmado-decoracao" id="confirmado-decoracao">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoDecoracao) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Papelaria</td>
                                <td><input type="text" value="<?php echo $fornecedoresPapelaria ?>" id="fornecedores-papelaria" name="fornecedores-papelaria"></td>
                                <td><input type="text" value="<?php echo $telefonePapelaria ?>" id="telefone-papelaria" name="telefone-papelaria"></td>
                                <td><input type="date" value="<?php echo $dataPapelaria ?>" id="data-papelaria" name="data-papelaria"></td>
                                <td><input type="text" value="<?php echo $porPapelaria ?>" id="por-papelaria" name="por-papelaria"></td>
                                <td><select name="confirmado-papelaria" id="confirmado-papelaria">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoPapelaria) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Convite</td>
                                <td><input type="text" value="<?php echo $fornecedoresConvite ?>" id="fornecedores-convite" name="fornecedores-convite"></td>
                                <td><input type="text" value="<?php echo $telefoneConvite ?>" id="telefone-convite" name="telefone-convite"></td>
                                <td><input type="date" value="<?php echo $dataConvite ?>" id="data-convite" name="data-convite"></td>
                                <td><input type="text" value="<?php echo $porConvite ?>" id="por-convite" name="por-convite"></td>
                                <td><select name="confirmado-convite" id="confirmado-convite">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoConvite) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Bolo Fake</td>
                                <td><input type="text" value="<?php echo $fornecedoresBoloFake ?>" id="fornecedores-bolo-fake" name="fornecedores-bolo-fake"></td>
                                <td><input type="text" value="<?php echo $telefoneBoloFake ?>" id="telefone-bolo-fake" name="telefone-bolo-fake"></td>
                                <td><input type="date" value="<?php echo $dataBoloFake ?>" id="data-bolo-fake" name="data-bolo-fake"></td>
                                <td><input type="text" value="<?php echo $porBoloFake ?>" id="por-bolo-fake" name="por-bolo-fake"></td>
                                <td><select name="confirmado-bolo-fake" id="confirmado-bolo-fake">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoBoloFake) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Salgados</td>
                                <td><input type="text" value="<?php echo $fornecedoresSalgados ?>" id="fornecedores-salgadados" name="fornecedores-salgados"></td>
                                <td><input type="text" value="<?php echo $telefoneSalgados ?>" id="telefone-salgados" name="telefone-salgados"></td>
                                <td><input type="date" value="<?php echo $dataSalgados ?>" id="data-salgados" name="data-salgados"></td>
                                <td><input type="text" value="<?php echo $porSalgados ?>" id="por-salgados" name="por-salgados"></td>
                                <td><select name="confirmado-salgados" id="confirmado-salgados">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoSalgados) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Doces</td>
                                <td><input type="text" value="<?php echo $fornecedoresDoces ?>" id="fornecedores-doces" name="fornecedores-doces"></td>
                                <td><input type="text" value="<?php echo $telefoneDoces ?>" id="telefone-doces" name="telefone-doces"></td>
                                <td><input type="date" value="<?php echo $dataDoces ?>" id="data-doces" name="data-doces"></td>
                                <td><input type="text" value="<?php echo $porDoces ?>" id="por-doces" name="por-doces"></td>
                                <td><select name="confirmado-doces" id="confirmado-doces">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoDoces) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Bolo (espumone)</td>
                                <td><input type="text" value="<?php echo $fornecedoresEspumone ?>" id="fornecedores-espumone" name="fornecedores-espumone"></td>
                                <td><input type="text" value="<?php echo $telefoneEspumone ?>" id="telefone-espumone" name="telefone-espumone"></td>
                                <td><input type="date" value="<?php echo $dataEspumone ?>" id="data-espumone" name="data-espumone"></td>
                                <td><input type="text" value="<?php echo $porEspumone ?>" id="por-espumone" name="por-espumone"></td>
                                <td><select name="confirmado-espumone" id="confirmado-espumone">
                                        <?php
                                        foreach ($opcoesConfirmado as $opcaoConfirmado) {
                                            if ($opcaoConfirmado == $confirmadoEspumone) {
                                                echo "<option value='$opcaoConfirmado' selected>$opcaoConfirmado</option>";
                                            } else {
                                                echo "<option value='$opcaoConfirmado'>$opcaoConfirmado</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
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
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
    <link rel="stylesheet" href="css/info-cardapio.css">
    <title>Cardápio</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';

        $id = $_GET['id'];

        $select = $mysqli->query("SELECT * FROM festas WHERE id='$id'");

        $arrAssoc = $select->fetch_assoc();

        $tipoFesta = $arrAssoc['tipo_festa'];
        $contratante = $arrAssoc['contratante'];
        $aniversariante = $arrAssoc['aniversariante'];

        ?>
    </header>
    <main>

        <section class="section">
            <div class="container box">
                <div class="title">
                    <h3>Cardápio <span id="tipo-festa"><?php echo $tipoFesta ?></span></h3>
                </div>
                <div>
                    <p>Contratante: <span id="contrantante"><?php echo $contratante ?></span></p>
                    <p>Aniversariante: <span id="aniversariante"><?php echo $aniversariante ?></span></p>
                </div>
                <div class="msg">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="info-cardapio">
                    <?php
                    switch ($tipoFesta) {
                        case 'week':
                            include 'components/infoCardapioWeek.php';
                            break;
                        case 'light':
                            include 'components/infoCardapioLight.php';
                            break;
                        case 'play':
                            include 'components/infoCardapioPlay.php';
                            break;
                        case 'house':
                            include 'components/infoCardapioHouse.php';
                            break;
                        default:

                            break;
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>
    <script src="js/ajaxCardapio.js"></script>
</body>
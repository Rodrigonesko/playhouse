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
    <link rel="stylesheet" href="css/partyDetails.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="section-subheader-container">
            <div class="subheader-container">
                <button id="btn-info-festa" class="btn-info">Informações da Festa</button>
                <button id="btn-info-fornecedores" class="btn-info">Informações Fornecedores</button>
                <button id="btn-info-cardapio" class="btn-info">Informações do Cardápio</button>
                <button id="btn-info-escala" class="btn-info">Escala</button>
            </div>
        </section>
        <div>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                $id = $_GET['id'];

                $select = $mysqli->query("SELECT concluido FROM festas WHERE id='$id'");

                $row = $select->fetch_assoc();

                $concluido = $row['concluido'];

            ?>
        </div>
        
        <form action="php/partyDetails/concluirFesta.php" class="form-concluir" method="POST">
            <?php

                if(!$concluido){
                   echo "<button value='$id' class='concluir' name='concluir'>Concluir</button>";
                }

            ?>
            
        </form>
        <section class="section-details-container" id="section-details-container">

        </section>

    </main>
    <script src="js/partyDetails.js"></script>
</body>

</html>
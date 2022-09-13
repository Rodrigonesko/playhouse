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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/controleEntradaDetalhes.css">
    <title>Controle de Entrada</title>
</head>
<body>
<header>
        <?php
        include_once 'components/header.php';


        $id = $_GET['id'];

        ?>
    </header>
    <main>
        <section class="section-controle-container">
            <div class="controle-container">
                <div class="title">
                    <h3>Cadastro de Condidados</h3>
                    <h3>ID: <?php echo $id ?></h3>
                </div>
                <form method="POST" action="" class="inputs">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Telefone">
                    </div>
                    <div class="input-box">
                        <label for="idade">Idade</label>
                        <input type="number" name="idade" id="idade" placeholder="Idade">
                    </div>
                    <div class="button-container">
                        <button class="cadastrar" name="cadastrar" id="cadastrar">Cadastrar Convidado</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
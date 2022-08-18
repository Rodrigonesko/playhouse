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
        <section class="party-register">
            <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                }
            ?>
            <div class="title">
                <h2>FICHA TÉCNICA</h2>
            </div>
            <div class="subtitle">
                <h3>ESPECIFICAÇÕES DO CONTRATO</h3>
            </div>
            <form action="php/partyRegister/register.php" method="POST">
                <div class="column-2">
                    <div class="input-box">
                        <input class="input" type="text" name="party" id="party" required>
                        <span>Festa</span>
                    </div>
                    <div class="input-box">
                        <input class="input" type="text" name="n-people" id="n-people" required>
                        <span>N° Pessoas</span>
                    </div>
                </div>
                <div class="column-2">
                    <div class="input-box">
                        <input class="input" type="text" name="value" id="value" required>
                        <span>Valor</span>
                    </div>
                    <div class="input-box">
                        <input class="input" type="text" name="payment" id="payment" required>
                        <span>Forma de Pagamento</span>
                    </div>
                </div>
                <div class="subtitle">
                    <h3>DADOS</h3>
                </div>
                <div class="input-box">
                    <input class="input" type="text" name="name" id="name" required>
                    <span>Aniversariante</span>
                </div>
                <div class="input-box">
                    <input class="input" type="number" name="age" id="age" required>
                    <span>Idade a ser comemorada</span>
                </div>
                <div class="column-2">
                    <div class="input-box">
                        <input class="input" type="date" name="date" id="date">
                        <span>Data da festa</span>
                    </div>
                    <div class="input-box">
                        <input class="input" type="time" name="time" id="time">
                        <span>Horario</span>
                    </div>
                    <div class="input-box">
                        <input class="input" type="time" name="time-end" id="time-end">
                        <span>as</span>
                    </div>
                </div>
                <div class="input-box">
                    <input class="input" type="text" name="parents-name" id="parents-name" required>
                    <span>Nome dos Pais</span>
                </div>
                <div class="input-box">
                    <input class="input" type="tel" name="phone" id="phone" required>
                    <span>Telefone</span>
                </div>
                <div class="input-box">
                    <input class="input" type="text" name="email" id="email" required>
                    <span>Email</span>
                </div>
                <div class="btn-form">
                    <button name="register">Cadastrar</button>
                </div>
            </form>
        </section>
    </main>

</body>

</html>
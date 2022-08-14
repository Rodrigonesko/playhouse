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
if (!$adm) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa ser administrador para acessar este Painel!</p>";
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/userRegister.css">
    <title>Painel Admin</title>
</head>

<body>
    <header>
        <?php
        include 'components/header.php';
        ?>
    </header>
    <main>
        <section class="user-register-section">
        <div class="message">
                <?php
                    if(isset($_SESSION['msg'])){
                        echo  $_SESSION['msg'];
                        unset( $_SESSION['msg']);
                    }
                ?>
            </div>
            <div class="user-register-container">
                <div class="user-register-title">
                    <h3>Cadastro de Novo Usuário</h3>
                </div>
                <div class="user-register-form">
                    <form action="php/userRegister/userRegister.php" method="POST">
                        <input class="input-form" type="email" placeholder="E-mail" name="email" id="email" required>
                        <input class="input-form" type="text" placeholder="Nome" name="name" id="name" required>
                        <input class="input-form" type="password" placeholder="Senha" name="password" id="password" required>
                        <input class="input-form" type="password" placeholder="Confirmar Senha" name="confirm-password" id="confirm-password" required>
                        <div class="align">
                            <label class="label-form" for="admin">Administrador?</label>
                            <input class="input-form" type="checkbox" name="admin" id="admin">
                        </div>
                        <div class="user-register-container-btn">
                            <button class="user-register-btn" name="register" id="register">CADASTRAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>
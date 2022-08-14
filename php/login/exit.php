<?php
    session_start();
    ob_start();
    unset($_SESSION['id'], $_SESSION['username'], $_SESSION['name']);
    $_SESSION['msg'] = "<p class='success'>Deslogado com sucesso!</p>";

    header("Location: ../../index.php");
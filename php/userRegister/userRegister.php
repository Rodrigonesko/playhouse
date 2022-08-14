<?php

    session_start();
    ob_start();
    require_once '../../connection.php';
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

    if(isset($_POST['register'])){
        $username = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
        if(isset($_POST['admin'])){
            $adm = 1;
        } else {
            $adm = 0;
        }
        

        echo "$username, $name, $password, $confirmPassword, $adm";

        $result = $mysqli->prepare("SELECT id FROM users WHERE username=?");
        $result->bind_param("s", $username);
        $result->execute();
        $result->bind_result($id);
        $result->fetch();
        if(!$id){
            if($password == $confirmPassword){
                $newPassword = password_hash($password, PASSWORD_DEFAULT);
                $insert = $mysqli->prepare("INSERT INTO users (username, name, password, adm) VALUES (?,?,?,?)");
                $insert->bind_param("ssss", $username, $name, $newPassword, $adm);
                $insert->execute();
                $_SESSION['msg'] = "<p class='success'>Novo usuario criado com sucesso!</p>";
                header("Location: ../../userRegister.php");
            } else {
                $_SESSION['msg'] = "<p class='warning'>Senhas não conferem</p>";
                header("Location: ../../userRegister.php");
            }
        } else {
            $_SESSION['msg'] = "<p class='warning'>Usuario ja existente no sistema</p>";
            header("Location: ../../userRegister.php");
        }
    }
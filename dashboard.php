<?php
    session_start();
    ob_start();
    require_once 'connection.php';
    if(!isset($_SESSION['id'])){
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
    <title>Dashboard</title>
</head>
<body>
    <header>
        <?php
            include_once 'components/header.php';
        ?>
    </header>
    <h1>Bem vindo <?php echo $name; ?>!</h1>
    <a href="php/login/exit.php">Sair</a>
</body>
</html>
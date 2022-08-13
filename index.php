<?php
    require_once 'connection.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login PlayHouse</title>
</head>

<body>
    <main>
        <section class="login-section">
            <div class="login-container">
                <form action="php/login/login-validation.php" method="POST">
                    <div class="login-logo">
                        <img src="public/imgs/logo.png" alt="logo playhouse">
                    </div>
                    <div class="login-title">
                        <h3>Faça seu Login</h3>
                    </div>
                    <div class="login-inputs">
                        <input class="login-input" type="text" name="email" id="email" placeholder="Email">
                        <input class="login-input" type="password" name="password" id="password" placeholder="Senha">
                    </div>
                    <div class="login-container-button">
                        <button class="login-button" name="enter" id="enter">ENTRAR</button>
                    </div>
                    <div class="login-container-forgot-password">
                        <a href="#" class="link-forgot-psw">Esqueci minha senha</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="js/index.js"></script>
</body>

</html>
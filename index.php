<?php
    session_start();
    ob_start();
    require_once 'connection.php';

    if(isset($_SESSION['name'])){
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
    <link rel="stylesheet" href="css/login.css">
    <title>Login PlayHouse</title>
</head>

<body>
    <main>
        <section class="login-section">
            <div class="login-container">
                <form action="" method="POST">
                    <div class="login-logo">
                        <img src="public/imgs/logo.png" alt="logo playhouse">
                    </div>
                    <div class="login-title">
                        <h3>Faça seu Login</h3>
                    </div>
                    <?php
                        if(isset($_POST['enter'])){
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $result = $mysqli->prepare("SELECT id, username, password, name, adm FROM users WHERE username=?");
                            $result->bind_param("s", $email);
                            $result->execute();
                            $result->bind_result($id, $username, $pass, $name, $adm);
                            $result->fetch();
                            if($id){
                                if(password_verify($password, $pass)){
                                    $_SESSION['name'] = $name;
                                    $_SESSION['username'] = $username;
                                    $_SESSION['id'] = $id;
                                    $_SESSION['adm'] = $adm;
                                    header("Location: dashboard.php");
                                } else {
                                    $_SESSION['msg'] = "<p class='warning'>Erro: Usuário ou Senha inválidos</p>";
                                }
                            } else {
                                $_SESSION['msg'] = "<p class='warning'>Erro: Usuário ou Senha inválidos</p>";
                            } 
                        }

                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }

                    ?>
                    <div class="login-inputs">
                        <input class="login-input" type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($email)){ echo $email; } ?>" required>
                        <input class="login-input" type="password" name="password" id="password" placeholder="Senha" required>
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
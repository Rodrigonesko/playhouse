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
    <link rel="stylesheet" href="css/info-escala.css">
    <title>Escala</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';

        $id = $_GET['id'];

        ?>
    </header>
    <main>
        <section class="section-escala-container">
            <div class="escala-container">
                <div class="title">
                    <h3>Escala</h3>
                </div>
                <form action="#" method="post">
                    <div class="row">
                        <div class="input-single">
                            <input type="text" name="nome-gerente" id="nome-gerente" class="input" required>
                            <label for="nome-gerente">Gerente</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="telefone-gerente" id="telefone-gerente" class="input" required>
                            <label for="telefone-gerente">Telefone</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="horario-gerente" id="horario-gerente" class="input"  required>
                            <label for="horario-gerente">Horário</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="posicao-gerente" id="posicao-gerente" class="input" value="Gerente" required>
                            <label for="posicao-gerente">Posição</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="valor-gerente" id="valor-gerente" class="input" required>
                            <label for="valor-gerente">Valor</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-single">
                            <input type="text" name="nome-gerente" id="nome-gerente" class="input" required>
                            <label for="nome-gerente">Gerente</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="telefone-gerente" id="telefone-gerente" class="input" required>
                            <label for="telefone-gerente">Telefone</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="horario-gerente" id="horario-gerente" class="input"  required>
                            <label for="horario-gerente">Horário</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="posicao-gerente" id="posicao-gerente" class="input" value="Gerente" required>
                            <label for="posicao-gerente">Posição</label>
                        </div>
                        <div class="input-single">
                            <input type="text" name="valor-gerente" id="valor-gerente" class="input" required>
                            <label for="valor-gerente">Valor</label>
                        </div>
                    </div>


                </form>
            </div>
        </section>
    </main>
</body>

</html>
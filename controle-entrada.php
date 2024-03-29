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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/controle-entrada.css">
    <script src="./js/controleEntrada.js" defer></script>
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
        <section class="section-controle-container section">
            <div>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </div>
            <div class="box">
                <div class="title">
                    <h3>Cadastro de Convidados</h3>
                    <h3>ID: <?php echo $id ?></h3>
                </div>
                <form method="POST" action="php/controleEntrada/adicionarConvidado.php?id=<?php echo $id; ?>" class="inputs">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="input" placeholder="Nome" required>
                    </div>
                    <div class="input-box">
                        <label for="idade">Idade</label>
                        <input type="number" name="idade" id="idade" class="input" placeholder="Idade" required>
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="input" placeholder="Telefone">
                    </div>
                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="input" placeholder="CPF">
                    </div>

                    <div class="button-container">
                        <button class="cadastrar" name="cadastrar" id="cadastrar">Cadastrar Convidado</button>
                    </div>
                </form>
            </div>
            <div class="box">
                <div id="convidado-atualizado">

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Horario</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $select = $mysqli->query("SELECT nome_convidado, idade, id ,data FROM controle_entrada WHERE id_festa='$id'");

                        while ($row = $select->fetch_assoc()) {

                            $horario = explode(' ', $row['data']);
                            $horario = $horario[1];
                            $idConvidado = $row['id'];

                            echo "<tr>";
                            echo "<td class='nome-convidado'>" . $row['nome_convidado'] . "</td>";
                            echo "<td class='idade-convidado'>" . $row['idade'] . "</td>";
                            echo "<td>" . $horario . "</td>";
                            echo "<td><button class='editar-convidado' value='$idConvidado'>Editar</button></td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

</html>
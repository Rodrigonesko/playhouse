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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/inventario.css">
    <title>Inventario</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';

        ?>
    </header>
    <main>
        <section class="section">
            <div class="container">
                <div class="title">
                    <h3>Inventário</h3>
                </div>
                <div class="filters">
                    <span>Filtros</span>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="inventario">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Quantidade</th>
                                <th>Categoria</th>
                                <th>Alterar Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $mysqli->query("SELECT * FROM inventario");
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                echo "<tr>";
                                echo "<form action='php/inventario/alterar.php?id=$id' method='POST' >";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['item'] . "</td>";
                                echo "<td>" . $row['quantidade'] . "</td>";
                                echo "<td>" . $row['categoria'] . "</td>";
                                echo "<td><input type='number' name='alterar-valor' class='input'></td>";
                                echo "<td><button name='salvar' class='salvar-valor btn'>Salvar</button></td>";
                                echo "<td><button name='excluir' class='excluir-item btn'>Excluir</button></td>";
                                echo "</form>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="adicionar-itens">
                    <div class="title">
                        <h3>Adicionar Item</h3>
                    </div>
                    <form action="php/inventario/adicionar.php" method="POST" class="form-adiciona-item">
                        <div class="input-box">
                            <label for="item">Item: </label>
                            <input type="text" name="item" id="item" placeholder="Item" class="input">
                        </div>
                        <div class="input-box">
                            <label for="quantidade">Quantidade: </label>
                            <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade" value="0" class="input">
                        </div>
                        <div class="input-box">
                            <div class="select">
                                <select name="categoria" id="categoria">
                                    <option value="">Categoria</option>
                                    <option value="descartaveis">Descartaveis</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-box">
                            <button class="button-adicionar" name="adicionar-item">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
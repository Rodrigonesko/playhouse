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
    <link rel="stylesheet" href="css/pos-festa.css">
    <script src="js/dashboard.js" defer></script>
    <title>Pós Festa</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="parties-section-container">
            <div>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <div class="filters">
                <h3>Filtros</h3>
            </div>
            <div class="table-container">

                <table>
                    <thead>
                        <tr id="header-tr">
                            <th>ID</th>
                            <th>Contratante</th>
                            <th>Data</th>
                            <th>Tipo Festa</th>
                            <th>Aniversariante</th>
                            <th>Situação</th>
                            <th>Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $mysqli->query("SELECT id, contratante, data_festa, tipo_festa, aniversariante, status FROM festas WHERE concluido = 1");

                        while ($row = $result->fetch_assoc()) {

                            $id = $row['id'];
                            $contratante = $row['contratante'];

                            echo "<tr class='body-tr'>";
                            echo "<td>$id</td>";
                            echo "<td>" . $row['contratante'] . "</td>";
                            echo "<td>" . transformDate($row['data_festa']) . "</td>";
                            echo "<td>" . $row['tipo_festa'] . "</td>";
                            echo "<td>" . $row['aniversariante'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo  "<td class='detalhes'>
                                    <a href='pos-festa-detalhes.php?id=$id'>Pós Festa</a>
                        </td>";
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
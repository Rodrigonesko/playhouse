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
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="parties-section-container">
            <div class="filters">
                <h3>Filtros</h3>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr id="header-tr">
                            <th>ID</th>
                            <th>Festa</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Aniversariante</th>
                            <th>Situação</th>
                            <th>Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $mysqli->query("SELECT id, party, date_party, value, name FROM parties");

                        while ($row = $result->fetch_assoc()) {

                            $id = $row['id'];

                            echo "<tr class='body-tr'>";
                            echo "<td>$id</td>";
                            echo "<td>" . $row['party'] . "</td>";
                            echo "<td>" . transformDate($row['date_party']) . "</td>";
                            echo "<td>" . $row['value'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . "Pago/A pagar" . "</td>";
                            echo "<td>
                                    <a class='details-button' href='partyDetails.php?id=$id'>Detalhes</a>
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
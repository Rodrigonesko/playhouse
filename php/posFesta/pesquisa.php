<?php
session_start();
ob_start();
require_once '../../connection.php';
require_once '../include/functions.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];

if ($_GET['pesquisa']) {
    $pesquisa = $_GET['pesquisa'];

    $select = $mysqli->query("SELECT * FROM festas WHERE id_data LIKE '$pesquisa%' OR contratante LIKE'$pesquisa%' OR aniversariante LIKE '$pesquisa%'");
    while ($row = $select->fetch_assoc()) {
        if ($row['concluido'] == 1) {
            $id = $row['id'];
            $idData = $row['id_data'];
            $contratante = $row['contratante'];

            echo "<tr class='body-tr'>";
            echo "<td>$idData</td>";
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
    }
}

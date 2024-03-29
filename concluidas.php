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
    <link rel="stylesheet" href="css/pos-festa.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" defer></script>
    <script src="js/concluidas.js" defer></script>
    <title>Concluídas</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';
        ?>
    </header>
    <main>
        <section class="parties-section-container section">
            <div>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <div class="container">
                <div class="mb-6 is-flex">
                    <form action="#" id="form-pesquisa">
                        <input type="text" class="input" placeholder="ID, Contrante ou Aniversariante" id="pesquisa">
                        <button class="button is-info">Buscar</button>
                    </form>
                    <button class="button is-link" id="limpa-filtro">Limpar Filtro</button>
                    <button class='button is-link is-loading loading none' id="loading"></button>
                </div>
                <div class="is-flex is-justify-content-center">
                    <table class="table scroll-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Contratante</th>
                                <th>Data</th>
                                <th>Tipo Festa</th>
                                <th>Aniversariante</th>
                                <th>Situação</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php

                            $result = $mysqli->query("SELECT id, contratante, id_data, data_festa, tipo_festa, aniversariante, status FROM festas WHERE concluido = 2");

                            while ($row = $result->fetch_assoc()) {

                                $id = $row['id'];
                                $contratante = $row['contratante'];

                                if ($row['status'] == '' || $row['status'] == 'A pagar') {
                                    echo "<tr class='has-background-danger has-text-light'>";
                                } else if ($row['status'] == 'Pré pago') {
                                    echo "<tr class='has-background-warning'>";
                                } else {
                                    echo "<tr>";
                                }

                                echo "<td>" . $row['id_data'] . "</td>";
                                echo "<td>" . $row['contratante'] . "</td>";
                                echo "<td>" . transformDate($row['data_festa']) . "</td>";
                                echo "<td>" . $row['tipo_festa'] . "</td>";
                                echo "<td>" . $row['aniversariante'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo  "<td class='detalhes'>
                        
                                <a href='info-festa.php?id=$id' class='info-festa' >
                                Info Festa&nbsp;
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                                </a>
                                <a href='info-fornecedores.php?id=$id' class='info-fornecedores' >
                                Fornecedores&nbsp;
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-truck' viewBox='0 0 16 16'>
                                    <path d='M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z'/>
                                </svg>
                                </a>
                                <a href='info-cardapio.php?id=$id' class='info-cardapio' >
                                Cardápio&nbsp;
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clipboard-check' viewBox='0 0 16 16'>
                                    <path fill-rule='evenodd' d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                                    <path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z'/>
                                    <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z'/>
                                </svg>
                                </a>
                                <a href='info-escala.php?id=$id' class='info-escala' >
                                Escala&nbsp;
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-video3' viewBox='0 0 16 16'>
                                    <path d='M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z'/>
                                    <path d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z'/>
                                </svg>
                                </a>
                                <a href='controle-entrada.php?id=$id' class='info-entrada' >
                                Controle Entrada&nbsp;
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-door-closed' viewBox='0 0 16 16'>
                                    <path d='M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z'/>
                                    <path d='M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z'/>
                                </svg>
                                </a>
                                <a href='pos-festa-detalhes.php?id=$id'>Pós Festa</a>
                                </td>";
                                echo "</tr>";
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
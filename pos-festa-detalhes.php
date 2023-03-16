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
    <link rel="stylesheet" href="css/pos-festa-detalhes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" defer></script>
    <title>Pos Festa Detalhes</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';

        $id = $_GET['id'];

        $select = $mysqli->query("SELECT * FROM festas WHERE id='$id'");

        $row = $select->fetch_assoc();

        $concluida = $row['concluido'];

        $valor = $row['valor'];
        $valorPago = $row['valor_pago'];
        $valorExcedente = $row['valor_excedente'];
        $valorTotal = $valor + $valorExcedente;
        $horasExcedentes = $row['horas_excedentes'];
        $valorHorasExcedentes = $row['valor_horas_excedentes'];

        $convidadosPagos = $row['convidados_pagos'] ? $row['convidados_pagos'] : 0;
        $adultos = $row['quantidade_adultos'] ? $row['quantidade_adultos'] : 0;
        $criancas0a4 = $row['quantidade_0_4'] ? $row['quantidade_0_4'] : 0;
        $criancas5a8 = $row['quantidade_5_8'] ? $row['quantidade_5_8'] : 0;
        $convidadosPagantes = $row['convidados_pagantes'] ? $row['convidados_pagantes'] : 0;
        $totalConvidados = $adultos + $criancas0a4 + $criancas5a8;

        $selectGastosExtras = $mysqli->query("SELECT * FROM gastos_extras WHERE id_festa='$id' AND categoria='Gasto extra'");

        $selectCopa = $mysqli->query("SELECT * FROM gastos_extras WHERE id_festa='$id' AND categoria='Copa'");

        $festaPagos = 0;
        $festaAdultos = 0;
        $festaCrianca0a4 = 0;
        $festaCrianca5a8 = 0;
        $festaPagantes = 0;
        $festaTotal = 0;

        $selectConvidados = $mysqli->query("SELECT * FROM controle_entrada WHERE id_festa='$id'");

        while ($row = $selectConvidados->fetch_assoc()) {
            if ($row['idade'] > 8) {
                $festaAdultos++;
            }
            if ($row['idade'] >= 5 && $row['idade'] <= 8) {
                $festaCrianca5a8++;
            }
            if ($row['idade'] <= 4) {
                $festaCrianca0a4++;
            }
        }

        $festaTotal =  $festaAdultos + $festaCrianca0a4 + $festaCrianca5a8;
        $festaPagantes = $festaAdultos + ($festaCrianca5a8 / 2);

        ?>
    </header>
    <main>
        <section class="section">
            <div class="container">
                <div class="box">
                    <div class="title">
                        Pós Festa
                    </div>
                    <?php
                    if ($concluida == 1) {
                        echo "<div class='mb-4'>
                        <form action='php/posFesta/concluir.php?id=$id' method='post'>
                            <button name='concluir' class='button is-success'>Concluir Pós Festa</button>
                        </form>

                    </div>";
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <div class="box">
                        <form action="php/posFesta/valores.php?id=<?php echo $id ?>" method="post">
                            <div class="subtitle is-flex is-align-items-center">
                                <span>Valor:</span> <input type="text" placeholder="Valor" class="input" name="valor" value="<?php echo $valor ?>">
                            </div>
                            <div class="subtitle is-flex is-align-items-center">
                                <span>Valor Excedente:</span> <input type="text" placeholder="Valor a mais" name="valor_excedente" class="input" value="<?php echo $valorExcedente ?>">
                            </div>
                            <div class="subtitle is-flex is-align-items-center">
                                <span>Valor Pago:</span> <input type="text" placeholder="Valor Pago" class="input" name="valor_pago" value="<?php echo $valorPago ?>">
                            </div>
                            <div class="subtitle is-flex is-align-items-center">
                                <span>Valor total:</span> <input type="text" placeholder="Valor Total" class="input" value="<?php echo $valorTotal ?>">
                            </div>
                            <div>
                                <button name="salvar" class="button">Salvar</button>
                            </div>
                        </form>
                    </div>
                    <div class="box">
                        <div class="subtitle">
                            Excedentes
                        </div>
                        <div class="is-flex">
                            <div class="p-5">
                                <div class="subtitle">
                                    Contrato
                                </div>
                                <div>
                                    <span>Convidados pagos: <strong><?php echo $convidadosPagos ?></strong></span>
                                </div>
                                <div>
                                    <span>Adultos: <strong><?php echo $adultos ?></strong></span>
                                </div>
                                <div>
                                    <span>Crianças de 0 a 4 anos: <strong><?php echo $criancas0a4 ?></strong></span>
                                </div>
                                <div>
                                    <span>Crianças de 5 a 8 anos: <strong><?php echo $criancas5a8 ?></strong></span>
                                </div>
                                <div>
                                    <span>Convidados pagantes: <strong><?php echo $convidadosPagantes ?></strong></span>
                                </div>
                                <div>
                                    <span>Total: <strong><?php echo $totalConvidados ?></strong></span>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="subtitle">
                                    Festa
                                </div>
                                <div>
                                    <span>Convidados pagos: <strong></strong></span>
                                </div>
                                <div>
                                    <span>Adultos: <strong><?php echo $festaAdultos ?></strong></span>
                                </div>
                                <div>
                                    <span>Crianças de 0 a 4 anos: <strong><?php echo $festaCrianca0a4 ?></strong></span>
                                </div>
                                <div>
                                    <span>Crianças de 5 a 8 anos: <strong><?php echo $festaCrianca5a8 ?></strong></span>
                                </div>
                                <div>
                                    <span>Convidados pagantes: <strong><?php echo $festaPagantes ?></strong></span>
                                </div>
                                <div>
                                    <span>Total: <strong><?php echo $festaTotal ?></strong></span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="box">
                        <div class="subtitle">
                            Horas a mais
                        </div>
                        <div>
                            <form action="php/posFesta/HorasExcedentes.php?id=<?php echo $id ?>" method="post">
                                <input type="text" name="horas_excedentes" id="horas_excedentes" placeholder="Horas Excedentes" class="input" value="<?php echo $horasExcedentes ?>">
                                <input type="text" name="valor_horas_excedentes" id="valor_horas_excedentes" class="input" placeholder="Valor Horas Excedentes" value="<?php echo $valorHorasExcedentes ?>">
                                <button class="button" name="adicionar_horas">Adicionar</button>
                            </form>
                        </div>
                    </div>
                    <div class="box">
                        <div class="subtitle">
                            Gastos extras
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <form action="php/posFesta/gastosExtras.php?id_festa=<?php echo $id ?>" method="post">
                                            <th><input type="text" name="gasto_extra_item" id="gasto_extra_item" placeholder="Item" class="input"></th>
                                            <th><input type="text" name="gasto_extra_quantidade" id="gasto_extra_quantidade" placeholder="Quantidade" class="input"></th>
                                            <th><input type="text" name="gasto_extra_valor" id="gasto_extra_valor" placeholder="Valor" class="input"></th>
                                            <th><button class="button" name="adicionar">Adicionar</button></th>
                                        </form>
                                    </tr>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantidade</th>
                                        <th>Valor</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $selectGastosExtras->fetch_assoc()) {
                                        $idItem = $row['id'];
                                        echo "<tr>";
                                        echo "<form action='php/posFesta/gastosExtras.php?id=$idItem&id_festa=$id' method='post'>";
                                        echo "<td>" . $row['item'] . "</td>";
                                        echo "<td>" . $row['quantidade'] . "</td>";
                                        echo "<td>" . $row['valor'] . "</td>";
                                        echo "<td><button class='button is-danger' name='delete'>Deletar</button></td>";
                                        echo "</form>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box">
                        <div class="subtitle">
                            Copa
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <form action="php/posFesta/copa.php?id_festa=<?php echo $id ?>" method="post">
                                            <th><input type="text" name="copa_item" id="copa_item" placeholder="Item" class="input"></th>
                                            <th><input type="text" name="copa_quantidade" id="copa_quantidade" placeholder="Quantidade" class="input"></th>
                                            <th><button class="button" name="adicionar">Adicionar</button></th>
                                        </form>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $selectCopa->fetch_assoc()) {
                                        $idItem = $row['id'];
                                        echo "<tr>";
                                        echo "<form action='php/posFesta/copa.php?id=$idItem&id_festa=$id' method='post'>";
                                        echo "<td>" . $row['item'] . "</td>";
                                        echo "<td>" . $row['quantidade'] . "</td>";
                                        echo "<td><button class='button is-danger' name='delete'>Deletar</button></td>";
                                        echo "</form>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
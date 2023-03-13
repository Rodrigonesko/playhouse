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

        $valor = $row['valor'];
        $valorPago = $row['valor_pago'];
        $valorExcedente = $row['valor_excedente'];
        $valorTotal = '';
        $horasExcedentes = $row['horas_excedentes'];
        $valorHorasExcedentes = $row['valor_horas_excedentes'];

        ?>
    </header>
    <main>
        <section class="section">
            <div class="container">
                <div class="box">
                    <div class="title">
                        Pós Festa
                    </div>
                    <div class="box">
                        <div class="subtitle is-flex is-align-items-center">
                            <span>Valor:</span> <input type="text" placeholder="Valor" class="input" value="<?php echo $valor ?>">
                        </div>
                        <div class="subtitle is-flex is-align-items-center">
                            <span>Valor Pago:</span> <input type="text" placeholder="Valor Pago" class="input">
                        </div>
                        <div class="subtitle is-flex is-align-items-center">
                            <span>Valor Excedente:</span> <input type="text" placeholder="Valor a mais" class="input">
                        </div>
                        <div class="subtitle is-flex is-align-items-center">
                            <span>Valor total:</span> <input type="text" placeholder="Valor Total" class="input">
                        </div>
                        <div>
                            <button class="button">Salvar</button>
                        </div>
                    </div>
                    <div class="box">
                        <div class="subtitle">
                            Excedentes
                        </div>
                        <div>
                            Convidados
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
                            <input type="text" name="gasto_extra_item" id="gasto_extra_item" placeholder="Item" class="input">
                            <input type="text" name="gasto_extra_quantidade" id="gasto_extra_quantidade" placeholder="Quantidade" class="input">
                            <input type="text" name="gasto_extra_valor" id="gasto_extra_valor" placeholder="Valor" class="input">
                            <button class="button">Adicionar</button>
                        </div>
                    </div>
                    <div class="box">
                        <div class="subtitle">
                            Copa
                        </div>
                        <div>
                            <input type="text" name="copa_item" id="copa_item" placeholder="Item" class="input">
                            <input type="text" name="copa_quantidade" id="copa_quantidade" placeholder="Quantidade" class="input">
                            <button class="button">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
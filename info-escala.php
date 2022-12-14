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
error_reporting(0);
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

        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id' AND cargo='Gerente'");

        $arrAux = $select->fetch_assoc();

        $nomeGerente = $arrAux['nome'];
        $telefoneGerente = $arrAux['telefone'];
        $horarioGerente = $arrAux['horario'];
        $valorGerente = $arrAux['valor'];
        $posicaoGerente = $arrAux['posicao'];

        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id' AND cargo='Cheff'");

        $arrAux = $select->fetch_assoc();

        $nomeChefe = $arrAux['nome'];
        $telefoneChefe = $arrAux['telefone'];
        $horarioChefe = $arrAux['horario'];
        $valorChefe = $arrAux['valor'];
        $posicaoChefe = $arrAux['posicao'];

        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id' AND cargo='Copa'");

        $arrAux = $select->fetch_assoc();

        $nomeCopa = $arrAux['nome'];
        $telefoneCopa = $arrAux['telefone'];
        $horarioCopa = $arrAux['horario'];
        $valorCopa = $arrAux['valor'];
        $posicaoCopa = $arrAux['posicao'];

        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id' AND cargo='Portaria'");

        $arrAux = $select->fetch_assoc();

        $nomePortaria = $arrAux['nome'];
        $telefonePortaria = $arrAux['telefone'];
        $horarioPortaria = $arrAux['horario'];
        $valorPortaria = $arrAux['valor'];
        $posicaoPortaria = $arrAux['posicao'];

        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id' AND cargo='Recep????o'");

        $arrAux = $select->fetch_assoc();

        $nomeRecepcao = $arrAux['nome'];
        $telefoneRecepcao = $arrAux['telefone'];
        $horarioRecepcao = $arrAux['horario'];
        $valorRecepcao = $arrAux['valor'];
        $posicaoRecepcao = $arrAux['posicao'];

        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id' AND cargo='Bal??es'");

        $arrAux = $select->fetch_assoc();

        $nomeBaloes = $arrAux['nome'];
        $telefoneBaloes = $arrAux['telefone'];
        $horarioBaloes = $arrAux['horario'];
        $valorBaloes = $arrAux['valor'];
        $posicaoBaloes = $arrAux['posicao'];

        ?>
    </header>
    <main>
        <section class="section-escala-container">
            <div class="escala-container">
                <div class="title">
                    <h3>Escala</h3>
                </div>
                <div class="msg">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <form action="php/escala/escala.php?id=<?php echo $id ?>" method="post">
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Gerente</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-gerente" id="nome-gerente" class="input" value="<?php echo $nomeGerente; ?>">
                                <label for="nome-gerente">Gerente</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-gerente" id="telefone-gerente" class="input" value="<?php echo $telefoneGerente; ?>">
                                <label for="telefone-gerente">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-gerente" id="horario-gerente" class="input" value="<?php echo $horarioGerente; ?>">
                                <label for="horario-gerente">Hor??rio</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-gerente" id="posicao-gerente" class="input" value="Gerente">
                                <label for="posicao-gerente">Posi????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-gerente" id="valor-gerente" class="input" value="<?php echo $valorGerente; ?>">
                                <label for="valor-gerente">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Cozinha</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-chefe" id="nome-chefe" class="input" value="<?php echo $nomeChefe ?>">
                                <label for="nome-chefe">Chefe</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-chefe" id="telefone-chefe" class="input" value="<?php echo $telefoneChefe ?>">
                                <label for="telefone-chefe">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-chefe" id="horario-chefe" class="input" value="<?php echo $horarioChefe ?>">
                                <label for="horario-chefe">Hor??rio</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-chefe" id="posicao-chefe" class="input" value="Cheff">
                                <label for="posicao-chefe">Posi????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-chefe" id="valor-chefe" class="input" value="<?php echo $valorChefe ?>">
                                <label for="valor-chefe">Valor</label>
                            </div>
                        </div>
                        <?php

                        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Auxiliar'");

                        while ($row = $select->fetch_assoc()) {
                            $arrAuxiliares[] = [
                                $row['nome'],
                                $row['telefone'],
                                $row['horario'],
                                $row['posicao'],
                                $row['valor']
                            ];
                        }

                        for ($i = 1; $i <= 3; $i++) {

                            $nome = $arrAuxiliares[$i - 1][0];
                            $telefone = $arrAuxiliares[$i - 1][1];
                            $horario = $arrAuxiliares[$i - 1][2];
                            $valor = $arrAuxiliares[$i - 1][4];

                            echo "
                        <div class='row'>
                        <div class='input-single'>
                            <input type='text' name='nome-auxiliar[]' id='nome-auxiliar-$i' class='input' value='$nome'>
                            <label for='nome-auxiliar-$i'>Auxiliar</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='telefone-auxiliar[]' id='telefone-auxiliar-$i' class='input' value='$telefone'>
                            <label for='telefone-auxiliar-$i'>Telefone</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='horario-auxiliar[]' id='horario-auxiliar-$i' class='input' value='$horario'>
                            <label for='horario-auxiliar-$i'>Hor??rio</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='posicao-auxiliar[]' id='posicao-auxiliar-$i' class='input' value='Auxiliar'>
                            <label for='posicao-auxiliar-$i'>Posi????o</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='valor-auxiliar[]' id='valor-auxiliar-$i' class='input' value='$valor'>
                            <label for='valor-auxiliar-$i'>Valor</label>
                        </div>
                    </div>
                        ";
                        }
                        ?>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Gar??om/Copa</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-copa" id="nome-copa" class="input" value="<?php echo $nomeCopa ?>">
                                <label for="nome-copa">Copa</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-copa" id="telefone-copa" class="input" value="<?php echo $telefoneCopa ?>">
                                <label for="telefone-copa">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-copa" id="horario-copa" class="input" value="<?php echo $horarioCopa ?>">
                                <label for="horario-copa">Hor??rio</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-copa" id="posicao-copa" class="input" value="Copa">
                                <label for="posicao-copa">Posi????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-copa" id="valor-copa" class="input" value="<?php echo $valorCopa ?>">
                                <label for="valor-copa">Valor</label>
                            </div>
                        </div>
                        <?php

                        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Gar??om'");

                        while ($row = $select->fetch_assoc()) {
                            $arrGarcons[] = [
                                $row['nome'],
                                $row['telefone'],
                                $row['horario'],
                                $row['posicao'],
                                $row['valor']
                            ];
                        }

                        for ($i = 1; $i <= 5; $i++) {

                            $nome = $arrGarcons[$i - 1][0];
                            $telefone = $arrGarcons[$i - 1][1];
                            $horario = $arrGarcons[$i - 1][2];
                            $valor = $arrGarcons[$i - 1][4];

                            echo "
                        <div class='row'>
                        <div class='input-single'>
                            <input type='text' name='nome-garcom[]' id='nome-garcom-$i' class='input' value='$nome'>
                            <label for='nome-garcom-$i'>Gar??om</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='telefone-garcom[]' id='telefone-garcom-$i' class='input' value='$telefone'>
                            <label for='telefone-garcom-$i'>Telefone</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='horario-garcom[]' id='horario-garcom-$i' class='input' value='$horario'>
                            <label for='horario-garcom-$i'>Hor??rio</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='posicao-garcom[]' id='posicao-garcom-$i' class='input' value='Gar??om'>
                            <label for='posicao-garcom-$i'>Posi????o</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='valor-garcom[]' id='valor-garcom-$i' class='input' value='$valor'>
                            <label for='valor-garcom-$i'>Valor</label>
                        </div>
                    </div>
                        ";
                        }
                        ?>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Portaria</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-portaria" id="nome-portaria" class="input" value="<?php echo $nomePortaria ?>">
                                <label for="nome-portaria">Portaria</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-portaria" id="telefone-portaria" class="input" value="<?php echo $telefonePortaria ?>">
                                <label for="telefone-portaria">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-portaria" id="horario-portaria" class="input" value="<?php echo $horarioPortaria ?>">
                                <label for="horario-portaria">Hor??rio</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-portaria" id="posicao-portaria" class="input" value="Portaria">
                                <label for="posicao-portaria">Posi????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-portaria" id="valor-portaria" class="input" value="<?php echo $valorPortaria ?>">
                                <label for="valor-portaria">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Recep????o</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-recepcao" id="nome-recepcao" class="input" value="<?php echo $nomeRecepcao ?>">
                                <label for="nome-recepcao">Recep????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-recepcao" id="telefone-recepcao" class="input" value="<?php echo $telefoneRecepcao ?>">
                                <label for="telefone-recepcao">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-recepcao" id="horario-recepcao" class="input" value="<?php echo $horarioRecepcao ?>">
                                <label for="horario-recepcao">Hor??rio</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-recepcao" id="posicao-recepcao" class="input" value="Recep????o">
                                <label for="posicao-recepcao">Posi????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-recepcao" id="valor-recepcao" class="input" value="<?php echo $valorRecepcao ?>">
                                <label for="valor-recepcao">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Monitores</h4>
                        </div>
                        <?php

                        $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Monitor'");

                        while ($row = $select->fetch_assoc()) {
                            $arrMonitores[] = [
                                $row['nome'],
                                $row['telefone'],
                                $row['horario'],
                                $row['posicao'],
                                $row['valor']
                            ];
                        }

                        for ($i = 1; $i <= 6; $i++) {

                            $nome = $arrMonitores[$i - 1][0];
                            $telefone = $arrMonitores[$i - 1][1];
                            $horario = $arrMonitores[$i - 1][2];
                            $valor = $arrMonitores[$i - 1][4];

                            echo "
                        <div class='row'>
                        <div class='input-single'>
                            <input type='text' name='nome-monitor[]' id='nome-monitor-$i' class='input' value='$nome'>
                            <label for='nome-monitor-$i'>Monitor</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='telefone-monitor[]' id='telefone-monitor-$i' class='input' value='$telefone'>
                            <label for='telefone-monitor-$i'>Telefone</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='horario-monitor[]' id='horario-monitor-$i' class='input' value='$horario'>
                            <label for='horario-monitor-$i'>Hor??rio</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='posicao-monitor[]' id='posicao-monitor-$i' class='input' value='Monitor'>
                            <label for='posicao-monitor-$i'>Posi????o</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='valor-monitor[]' id='valor-monitor-$i' class='input' value='$valor'>
                            <label for='valor-monitor-$i'>Valor</label>
                        </div>
                    </div>
                        ";
                        }
                        ?>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Bal??es</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-baloes" id="nome-baloes" class="input" value="<?php echo $nomeBaloes ?>">
                                <label for="nome-baloes">Bal??es</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-baloes" id="telefone-baloes" class="input" value="<?php echo $telefoneBaloes ?>">
                                <label for="telefone-baloes">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-baloes" id="horario-baloes" class="input" value="<?php echo $horarioBaloes ?>">
                                <label for="horario-baloes">Hor??rio</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-baloes" id="posicao-baloes" class="input" value="Bal??es">
                                <label for="posicao-baloes">Posi????o</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-baloes" id="valor-baloes" class="input" value="<?php echo $valorBaloes ?>">
                                <label for="valor-baloes">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button name="salvar" id="salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
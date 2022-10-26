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

        ?>
    </header>
    <main>
        <section class="section-escala-container">
            <div class="escala-container">
                <div class="title">
                    <h3>Escala</h3>
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
                                <label for="horario-gerente">Horário</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-gerente" id="posicao-gerente" class="input" value="Gerente">
                                <label for="posicao-gerente">Posição</label>
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
                                <label for="horario-chefe">Horário</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-chefe" id="posicao-chefe" class="input" value="Cheff">
                                <label for="posicao-chefe">Posição</label>
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

                            $nome = $arrAuxiliares[$i-1][0];
                            $telefone = $arrAuxiliares[$i-1][1];
                            $horario = $arrAuxiliares[$i-1][2];
                            $valor = $arrAuxiliares[$i-1][4];

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
                            <label for='horario-auxiliar-$i'>Horário</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='posicao-auxiliar[]' id='posicao-auxiliar-$i' class='input' value='Auxiliar'>
                            <label for='posicao-auxiliar-$i'>Posição</label>
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
                            <h4>Garçom/Copa</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-copa" id="nome-copa" class="input">
                                <label for="nome-copa">Copa</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-copa" id="telefone-copa" class="input">
                                <label for="telefone-copa">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-copa" id="horario-copa" class="input">
                                <label for="horario-copa">Horário</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-copa" id="posicao-copa" class="input" value="Copa">
                                <label for="posicao-copa">Posição</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-copa" id="valor-copa" class="input">
                                <label for="valor-copa">Valor</label>
                            </div>
                        </div>
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            echo "
                        <div class='row'>
                        <div class='input-single'>
                            <input type='text' name='nome-garcom-$i' id='nome-garcom-$i' class='input'>
                            <label for='nome-garcom-$i'>Garçom</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='telefone-garcom-$i' id='telefone-garcom-$i' class='input'>
                            <label for='telefone-garcom-$i'>Telefone</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='horario-garcom-$i' id='horario-garcom-$i' class='input'>
                            <label for='horario-garcom-$i'>Horário</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='posicao-garcom-$i' id='posicao-garcom-$i' class='input' value='Garçom'>
                            <label for='posicao-garcom-$i'>Posição</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='valor-garcom-$i' id='valor-garcom-$i' class='input'>
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
                                <input type="text" name="nome-portaria" id="nome-portaria" class="input">
                                <label for="nome-portaria">Portaria</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-portaria" id="telefone-portaria" class="input">
                                <label for="telefone-portaria">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-portaria" id="horario-portaria" class="input">
                                <label for="horario-portaria">Horário</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-portaria" id="posicao-portaria" class="input" value="Portaria">
                                <label for="posicao-portaria">Posição</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-portaria" id="valor-portaria" class="input">
                                <label for="valor-portaria">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Recepção</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-recepcao" id="nome-recepcao" class="input">
                                <label for="nome-recepcao">Recepção</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-recepcao" id="telefone-recepcao" class="input">
                                <label for="telefone-recepcao">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-recepcao" id="horario-recepcao" class="input">
                                <label for="horario-recepcao">Horário</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-recepcao" id="posicao-recepcao" class="input" value="Recepção">
                                <label for="posicao-recepcao">Posição</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-recepcao" id="valor-recepcao" class="input">
                                <label for="valor-recepcao">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Monitores</h4>
                        </div>
                        <?php
                        for ($i = 1; $i <= 6; $i++) {
                            echo "
                        <div class='row'>
                        <div class='input-single'>
                            <input type='text' name='nome-monitor-$i' id='nome-monitor-$i' class='input'>
                            <label for='nome-monitor-$i'>Monitor</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='telefone-monitor-$i' id='telefone-monitor-$i' class='input'>
                            <label for='telefone-monitor-$i'>Telefone</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='horario-monitor-$i' id='horario-monitor-$i' class='input'>
                            <label for='horario-monitor-$i'>Horário</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='posicao-monitor-$i' id='posicao-monitor-$i' class='input' value='Monitor'>
                            <label for='posicao-monitor-$i'>Posição</label>
                        </div>
                        <div class='input-single'>
                            <input type='text' name='valor-monitor-$i' id='valor-monitor-$i' class='input'>
                            <label for='valor-monitor-$i'>Valor</label>
                        </div>
                    </div>
                        ";
                        }
                        ?>
                    </div>
                    <div class="escala">
                        <div class="subtitle">
                            <h4>Balões</h4>
                        </div>
                        <div class="row">
                            <div class="input-single">
                                <input type="text" name="nome-baloes" id="nome-baloes" class="input">
                                <label for="nome-baloes">Balões</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="telefone-baloes" id="telefone-baloes" class="input">
                                <label for="telefone-baloes">Telefone</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="horario-baloes" id="horario-baloes" class="input">
                                <label for="horario-baloes">Horário</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="posicao-baloes" id="posicao-baloes" class="input" value="Balões">
                                <label for="posicao-baloes">Posição</label>
                            </div>
                            <div class="input-single">
                                <input type="text" name="valor-baloes" id="valor-baloes" class="input">
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
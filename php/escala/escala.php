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

if (isset($_POST['salvar'])) {
    $id = $_GET['id'];

    $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id'");

    if (mysqli_num_rows($select) == 0) {
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Gerente')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Cheff')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Copa')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Garçom')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Portaria')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Recepção')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Monitor')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Balões')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Camarim')");
    }

    /*---------------- Update Gerente ---------------*/

    $dados = [
        $nomeGerente = $_POST['nome-gerente'],
        $telefoneGerente = $_POST['telefone-gerente'],
        $horarioGerente = $_POST['horario-gerente'],
        $valorGerente = $_POST['valor-gerente'],
        $posicaoGerente = $_POST['posicao-gerente'],
        $id,
        'Gerente'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    /*---------------- Update Chefe ---------------*/

    $dados = [
        $nomeChefe = $_POST['nome-chefe'],
        $telefoneChefe = $_POST['telefone-chefe'],
        $horarioChefe = $_POST['horario-chefe'],
        $valorChefe = $_POST['valor-chefe'],
        $posicaoChefe = $_POST['posicao-chefe'],
        $id,
        'Cheff'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    /*---------------- Update Auxiliares Cozinha ---------------*/

    $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Auxiliar'");

    $flag = 0;

    while ($row = $select->fetch_assoc()) {

        $idAuxiliar = $row['id'];

        $dados = [
            $nomesAuxiliares = $_POST['nome-auxiliar'][$flag],
            $telefonesAuxiliares = $_POST['telefone-auxiliar'][$flag],
            $horariosAuxiliares = $_POST['horario-auxiliar'][$flag],
            $valorAuxliares = $_POST['valor-auxiliar'][$flag],
            $posicaoAuxiliares = $_POST['posicao-auxiliar'][$flag],
            $idAuxiliar
        ];

        $flag++;

        $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id=?");

        $update->execute($dados);
    }

    $flag = 0;

    /*---------------- Update Copa ---------------*/

    $dados = [
        $nomeChefe = $_POST['nome-copa'],
        $telefoneChefe = $_POST['telefone-copa'],
        $horarioChefe = $_POST['horario-copa'],
        $valorChefe = $_POST['valor-copa'],
        $posicaoChefe = $_POST['posicao-copa'],
        $id,
        'Copa'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    /*---------------- Update Garçons ---------------*/

    $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Garçom'");

    $flag = 0;

    while ($row = $select->fetch_assoc()) {

        $idGarcom = $row['id'];

        $dados = [
            $nomesGarcons = $_POST['nome-garcom'][$flag],
            $telefonesGarcons = $_POST['telefone-garcom'][$flag],
            $horariosGarcons = $_POST['horario-garcom'][$flag],
            $valorGarcons = $_POST['valor-garcom'][$flag],
            $posicaoGarcons = $_POST['posicao-garcom'][$flag],
            $idGarcom
        ];

        $flag++;

        $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id=?");

        $update->execute($dados);
    }

    $flag = 0;

    /*---------------- Update Portaria ---------------*/

    $dados = [
        $nomePortaria = $_POST['nome-portaria'],
        $telefonePortaria = $_POST['telefone-portaria'],
        $horarioPortaria = $_POST['horario-portaria'],
        $valorPortaria = $_POST['valor-portaria'],
        $posicaoPortaria = $_POST['posicao-portaria'],
        $id,
        'Portaria'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    /*---------------- Update Recepção ---------------*/

    $dados = [
        $nomeRecepcao = $_POST['nome-recepcao'],
        $telefoneRecepcao = $_POST['telefone-recepcao'],
        $horarioRecepcao = $_POST['horario-recepcao'],
        $valorRecepcao = $_POST['valor-recepcao'],
        $posicaoRecepcao = $_POST['posicao-recepcao'],
        $id,
        'Recepção'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    var_dump($telefonesAuxiliares);

    /*---------------- Update Garçons ---------------*/

    $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Monitor'");

    $flag = 0;

    while ($row = $select->fetch_assoc()) {

        $idMonitor = $row['id'];

        $dados = [
            $nomesMonitores = $_POST['nome-monitor'][$flag],
            $telefonesMonitores = $_POST['telefone-monitor'][$flag],
            $horariosMonitores = $_POST['horario-monitor'][$flag],
            $valorMonitores = $_POST['valor-monitor'][$flag],
            $posicaoMonitores = $_POST['posicao-monitor'][$flag],
            $idMonitor
        ];

        $flag++;

        $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id=?");

        $update->execute($dados);
    }

    $flag = 0;

    /*---------------- Update Balões ---------------*/

    $dados = [
        $nomeBaloes = $_POST['nome-baloes'],
        $telefoneBaloes = $_POST['telefone-baloes'],
        $horarioBaloes = $_POST['horario-baloes'],
        $valorBaloes = $_POST['valor-baloes'],
        $posicaoBaloes = $_POST['posicao-baloes'],
        $id,
        'Balões'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    /*---------------- Update Camarim ---------------*/

    $dados = [
        $nomeCamarim = $_POST['nome-camarim'],
        $telefoneCamarim = $_POST['telefone-camarim'],
        $horarioCamarim = $_POST['horario-camarim'],
        $valorCamarim = $_POST['valor-camarim'],
        $posicaoCamarim = $_POST['posicao-camarim'],
        $id,
        'Camarim'
    ];

    $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id_festa=? AND cargo=?");

    $update->execute($dados);

    $_SESSION['msg'] = "<p class='success'>Atualizado com sucesso!</p>";

    header("Location: ../../info-escala.php?id=$id");
}

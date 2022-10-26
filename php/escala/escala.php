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
    echo $id;

    $select = $mysqli->query("SELECT * FROM escala WHERE id_festa = '$id'");

    if (mysqli_num_rows($select) == 0) {
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Gerente')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Cheff')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Auxiliar')");
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Copa')");
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
        $mysqli->query("INSERT INTO escala (id_festa, cargo) VALUES ('$id', 'Balões')");
    }


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

    /* --------------- */

    $select = $mysqli->query("SELECT * FROM escala WHERE id_festa='$id' AND cargo='Auxiliar'");

    while ($row = $select->fetch_assoc()) {
    
        $idAuxiliar = $row['id'];

        $dados = [
            $nomesAuxiliares = $_POST['nome-auxiliar'],
            $telefonesAuxiliares = $_POST['telefone-auxiliar'],
            $horariosAuxiliares = $_POST['horario-auxiliar'],
            $valorAuxliares = $_POST['valor-auxiliar'],
            $posicaoAuxiliares = $_POST['posicao-auxiliar'],
            $idAuxiliar
        ];

        $update = $mysqli->prepare("UPDATE escala SET nome=?, telefone=?, horario=?, valor=?, posicao=? WHERE id=?");


    }

 

    var_dump($telefonesAuxiliares);

    //echo "$nomeGerente, $telefoneGerente, $horarioGerente, $posicaoGerente, $valorGerente";

}

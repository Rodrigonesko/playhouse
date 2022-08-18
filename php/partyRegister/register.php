<?php

session_start();
ob_start();
require_once '../../connection.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$name = $_SESSION['name'];
$adm = $_SESSION['adm'];
if (!$adm) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa ser administrador para acessar este Painel!</p>";
    header("Location: dashboard.php");
}

if(isset($_POST['register'])){
    $party = $_POST['party'];
    $nPeople = $_POST['n-people'];
    $value = $_POST['value'];
    $payment = $_POST['payment'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $timeEnd = $_POST['time-end'];
    $parentsName = $_POST['parents-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $insert = $mysqli->prepare("INSERT INTO parties (party, n_people, value, payment, name, age, date, time, time_end, parents_name, phone, email)
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
     $insert->bind_param('sissssisssss', $party, $nPeople, $value, $payment, $name, $age, $date, $time, $timeEnd, $parentsName, $phone, $email);
    $insert->execute();
    if($mysqli->affected_rows){
        $_SESSION['msg'] = "<p class='success'>Festa Cadastrada com Sucesso!</p>";
        header("Location: ../../partyRegister.php");
    } else {
        $_SESSION['msg'] = "<p class='warning'>Algo deu errado!</p>";
        header("Location: ../../partyRegister.php");
    }

}


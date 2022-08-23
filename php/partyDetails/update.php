<?php
session_start();
ob_start();
require_once '../../connection.php';
require_once '../include/functions.php';
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "<p class='warning'>Erro: Precisa estar logado para acessar o sistema!</p>";
    header("Location: index.php");
}
$adm = $_SESSION['adm'];

if (isset($_POST['save'])) {

    $id = $_POST['id'];
    $party = $_POST['party'];
    $nPeople = $_POST['n-people'];
    $value = $_POST['value'];
    $payment = $_POST['payment'];

    $update = $mysqli->prepare("UPDATE parties SET party=?, n_people=?, value=?, payment=? WHERE id=?");
    $update->bind_param('sissi', $party, $nPeople, $value, $payment, $id);
    $update->execute();

    //Data

    $name = $_POST['name'];
    $age = $_POST['age'];
    $dateParty = $_POST['date-party'];
    $time = $_POST['time'];
    $timeEnd = $_POST['time-end'];
    $parents = $_POST['parents'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $updateData = $mysqli->prepare("UPDATE parties SET name=?, age=?, date_party=?, time=?, time_end=?, parents_name=?, phone=?, email=? WHERE id=?");
    $updateData->bind_param("sissssssi", $name, $age, $dateParty, $time, $timeEnd, $parents, $phone, $email, $id);
    $update->execute();

    //Decoration

    $theme = $_POST['theme'];
    $provider = $_POST['provider'];
    $reservation = $_POST['reservation'];
    $reservationDate = $_POST['reservation-date'];
    $midContact = $_POST['mid-contact'];
    $colorBalloons = $_POST['color-balloons'];
    $furniture = $_POST['furniture'];
    $optional = $_POST['optional'];

    $updateDecoration = $mysqli->prepare("UPDATE parties SET theme=?, provider=?, reservation=?, reservation_date=?, mid_contact=?, color_balloons=?, furniture=?, optional=? WHERE id=?");
    $updateDecoration->bind_param('ssssssssi', $theme, $provider, $reservation, $reservationDate, $midContact, $colorBalloons, $furniture, $optional, $id);
    $updateDecoration->execute();

    //Alcoholic drinks

    $alcoholic = $_POST['alcoholic'];
    $alcoholicBuffet = $_POST['alcoholic-buffet'];
    $alcoholicBrand = $_POST['alcoholic-brand'];
    $otherDrink = $_POST['other-drink'];
    $souvenir = $_POST['souvenir'];
    $photographer = $_POST['photographer'];

    $updateDrinks = $mysqli->prepare("UPDATE parties SET alcoholic=?, alcoholic_buffet=?, alcoholic_brand=?, other_drink=?, souvenir=?, photographer=? WHERE id=?");
    $updateDrinks->bind_param('ssssssi', $alcoholic, $alcoholicBuffet, $alcoholicBrand, $otherDrink, $souvenir, $photographer, $id);
    $updateDrinks->execute();

    $_SESSION['msg'] = "<p class='success'>Atualizações realizadas com sucesso!</p>";

    header("Location: ../../partyDetails.php?id=$id");

}

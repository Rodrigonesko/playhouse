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
    <link rel="stylesheet" href="css/partyDetails.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <?php
        include_once 'components/header.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $mysqli->query("SELECT * FROM parties WHERE id='$id'");

            $row = $result->fetch_assoc();

            $party = $row['party'];
            $nPeolpe = $row['n_people'];
            $value = $row['value'];
            $payment = $row['payment'];
            $name = $row['name'];
            $age = $row['age'];
            $dateParty = $row['date_party'];
            $time = $row['time'];
            $timeEnd = $row['time_end'];
            $parentsName = $row['parents_name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $theme = $row['theme'];
            $provider = $row['provider'];
            $reservation = $row['reservation'];
            $reservationDate = $row['reservation_date'];
            $midContact = $row['mid_contact'];
            $colorBalloons = $row['color_balloons'];
            $furniture = $row['furniture'];
            $optional = $row['optional'];
            $alcoholic = $row['alcoholic'];
            $alcoholicBuffet = $row['alcoholic_buffet'];
            $alcoholicBrand = $row['alcoholic_brand'];
            $otherDrink = $row['other_drink'];
            $souvenir = $row['souvenir'];
            $photographer = $row['photographer'];
            $status = $row['status'];
        }

        ?>
    </header>
    <form action="php/partyDetails/update.php" method="POST" id="form">
        <main id="main">
            <section class="details-section-container">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <div class="title">
                    <h3><input type="text" name="id" value="<?php echo $id ?>" readonly /> Festa</h3>
                </div>
                <div class="details-container">
                    <div class="subtitle">
                        <h3>Especificações do Contrato</h3>
                    </div>
                    <div class="container-inputs">
                        <div class="input-box">
                            <label for="party">Festa: </label>
                            <input type="text" id="party" name="party" value="<?php echo $party ?>">
                            <label for="n-people">N° Pessoas: </label>
                            <input type="number" id="n-people" name="n-people" value="<?php echo $nPeolpe ?>">
                        </div>
                        <div class="input-box">
                            <label for="excedents">Convidados exdentes: </label>
                            <input type="text" id="excedents" name="excedents" value="<?php  ?>">
                        </div>
                        <div class="input-box">
                            <label for="value">Valor: </label>
                            <input type="text" id="value" name="value" value="<?php echo $value ?>">
                        </div>
                        <div class="input-box">
                            <label for="payment">Forma de Pagamento: </label>
                            <input type="text" id="payment" name="payment" value="<?php echo $payment ?>">
                        </div>
                    </div>
                    <div class="details-container">
                        <div class="subtitle">
                            <h3>Dados</h3>
                        </div>
                        <div class="input-box">
                            <label for="name">Aniversariante: </label>
                            <input type="text" name="name" id="name" value="<?php echo $name ?>">
                        </div>
                        <div class="input-box">
                            <label for="age">Idade a ser comemorada: </label>
                            <input type="text" name="age" id="age" value="<?php echo $age ?>">
                        </div>
                        <div class="input-box">
                            <label for="date-party">Data da festa: </label>
                            <input type="date" name="date-party" id="date-party" value="<?php echo $dateParty ?>">
                            <label for="time">Horário</label>
                            <input type="time" name="time" id="time" value="<?php echo $time ?>">
                            <label for="time-end">às</label>
                            <input type="time" name="time-end" id="time-end" value="<?php echo $timeEnd ?>">
                        </div>
                        <div class="input-box">
                            <label for="parents">Nome dos pais: </label>
                            <input type="text" name="parents" id="parents" value="<?php echo $parentsName ?>">
                        </div>
                        <div class="input-box">
                            <label for="phone">Telefone: </label>
                            <input type="text" name="phone" id="phone" value="<?php echo $phone ?>">
                        </div>
                        <div class="input-box">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="details-container">
                        <div class="subtitle">
                            <h3>Decoração</h3>
                        </div>
                        <div class="input-box">
                            <label for="theme">Tema da Festa:</label>
                            <input type="text" name="theme" id="theme" value="<?php echo $theme ?>">
                        </div>
                        <div class="input-box">
                            <label for="provider">Fornecedor: </label>
                            <input type="text" name="provider" id="provider" value="<?php echo $provider ?>">
                        </div>
                        <div class="input-box">
                            <label for="reservation">Reserva feita por: </label>
                            <input type="text" name="reservation" id="reservation" value="<?php echo $reservation ?>">
                            <label for="reservation-date">no dia: </label>
                            <input type="date" name="reservation-date" id="reservation-date" value="<?php echo $reservationDate ?>">
                        </div>
                        <div class="input-box">
                            <label for="mid_contact">Por meio do contato: </label>
                            <input type="text" name="mid-contact" id="mid_contact" value="<?php echo $midContact ?>">
                            <span>do Buffet Play House</span>
                        </div>
                        <div class="input-box">
                            <label for="color-balloons">Cor das bexigas: </label>
                            <input type="text" name="color-balloons" id="color-balloons" value="<?php echo $colorBalloons ?>">
                        </div>
                        <div class="input-box">
                            <label for="furniture">Mobiliario: </label>
                            <input type="text" name="furniture" id="furniture" value="<?php echo $furniture ?>">
                        </div>
                        <div class="input-box">
                            <label for="optional">Opcional: </label>
                            <input type="text" name="optional" id="optional" value="<?php echo $optional ?>">
                        </div>
                    </div>
                    <div class="details-container">
                        <div class="subtitle">
                            <h3>Bebidas Alcoólicas</h3>
                        </div>
                        <div class="input-box">
                            <span>Será servida cerveja?</span>
                            <input type="radio" name="alcoholic" id="alcoholic-yes" value='yes'>
                            <label for="alcoholic-yes">Sim</label>
                            <input type="radio" name="alcoholic" id="alcoholic-no" value='no'>
                            <label for="alcoholic-no">Não</label>
                        </div>
                        <div class="input-box">
                            <span>Vai adquirir do Buffet?</span>
                            <input type="radio" name="alcoholic-buffet" id="alcoholic-buffet-yes" value='yes'>
                            <label for="alcoholic-buffet-yes">Sim</label>
                            <input type="radio" name="alcoholic-buffet" id="alcoholic-buffet-no" value='no'>
                            <label for="alcoholic-buffet-no">Não</label>
                        </div>
                        <div class="input-box">
                            <label for="alcoholic-brand">Se sim qual marca deve ser servida? </label>
                            <input type="text" id="alcoholic-brand" name="alcoholic-brand">
                        </div>

                        <div class="input-box">
                            <span>Será servida outro tipo de bebida? </span>
                            <input type="radio" name="other-drink" id="other-drink-yes" value='yes'>
                            <label for="other-drink-yes">Sim</label>
                            <input type="radio" name="other-drink" id="other-drink-no" value='no'>
                            <label for="other-drink-no">Não</label>
                        </div>
                        <div class="input-box">
                            <label for="souvenir">Lembranças: </label>
                            <input type="text" name="souvenir" id="souvenir">
                        </div>
                        <div class="input-box">
                            <label for="photographer">Fotógrafo: </label>
                            <input type="text" name="photographer" id="photographer">
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div class="btns-container">
            <button class="save-button" name="save">Salvar</button>
            <button class="delete-button" name="delete">Excluir</button>
        </div>

    </form>
</body>

</html>
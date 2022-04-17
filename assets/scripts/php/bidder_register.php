<?php
    require './db_connection/connect.php';
    require './User.php';
    require './Bidder.php';

    $city = $_POST['city'];
    $address = $_POST['address'];
    $card_number = $_POST['cardnumber'];
    $card_name = $_POST['cardname'];
    $secutiry_code = $_POST['securitycode'];

    $user = User::findUser($_REQUEST['username']);

    $bidder = new Bidder(NULL, $user->user_name, $user->first_name, $user->last_name, $city, $address, $user->phone_number, $card_number, $card_name, $secutiry_code);
    $bidder->saveBidder();
    echo "<h4>Conta criada com sucesso!</h4>\n";
    echo "<p><a href=\"../../../index.php\">Pagina Inicial</a></p>\n";
?>
<?php
    require './db_connection/connect.php';
    require './User.php';

    $user_name = trim($_POST['updateusername']);
    $first_name = trim($_POST['updatefirstname']);
    $last_name = trim($_POST['updatelastname']);
    $email = trim($_POST['updateemail']);
    $phone_number = trim($_POST['updatecell']);
?>
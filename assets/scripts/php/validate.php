<?php
    session_start();
    require './db_connection/connect.php';

    $user_name = $_POST['userid'];
    $password = $_POST['password'];

    $query = "SELECT user_name FROM users where user_name = ? AND password = sha2(?, 256)";
    $stmt = $dbcon->prepare($query);
    $stmt->bind_param("ss", $user_name, $password);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();

    if(isset($name)) {
        echo "<h3>Bem vindo!</h3>\n";
        $_SESSION['login'] = $name;
        header("location: ../../../index.php");
    } else {
        echo "<h2>Palavra passe ou nome de usuário incorrecto.</h2>\n";
        echo "<a href=\"../../../userpage.php\">Tente de novo</a>\n";
    }
?>   
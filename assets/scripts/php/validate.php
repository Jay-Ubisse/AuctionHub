<?php
    session_start();
    require './db_connection/connect.php';

    $user_id = $_POST['userid'];
    $password = $_POST['password'];

    $query = "SELECT name FROM users where user_id = ? AND password = sha2(?, 256)";
    $stmt = $dbcon->prepare($query);
    $stmt->bind_param("ss", $user_id, $password);
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
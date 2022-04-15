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
        echo "<h2>Sorry, login incorrect</h2>\n";
        echo "<a href=\"../../../pages/userpage.php\">Please try again</a>\n";
    }
?>   
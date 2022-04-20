<?php
    require './db_connection/connect.php';
    require './User.php';

    $user_name = trim($_POST['username']);
    $first_name = trim($_POST['firstname']);
    $last_name = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['cell']);
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users where user_name = '$user_name' OR email = '$email'";
    $check_result = $dbcon->query($check_query);
    $dbcon->close();
    if($check_result->num_rows > 0) {
        echo "<h4>Nome de usuário ou email já registrado!</h4>\n";
        echo "<p><a href=\"../../../userpage.php\">Cique aqui</a> para voltar a tentar.</p>\n";
    } else {
        $user = new User($user_name, $first_name, $last_name, $email, $phone_number, $password);
        $user->saveUser();
        echo "<h4>Conta criada com sucesso!</h4>\n";
        echo "<p><a href=\"../../../userpage.php\">Cique aqui</a> para iniciar sessão.</p>\n";
    }
?>
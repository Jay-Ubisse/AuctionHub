<?php
    require './db_connection/connect.php';

    $user_name = $_POST['username'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['cell'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users where user_name = '$user_name' OR email = '$email'";
    $check_result = $dbcon->query($check_query);
    
    if($check_result->num_rows > 0) {
        echo "<h4>Nome de usuário ou email já registrado!</h4>\n";
        echo "<p><a href=\"../../../userpage.php\">Cique aqui</a> para voltar a tentar.</p>\n";
    } else {
        $save_query = "INSERT INTO users VALUES (?, ?, ?, ?, ?, SHA2(?, 256))";
        $stmt = $dbcon->prepare($save_query);
        $stmt->bind_param("ssssis", $user_name, $first_name, $last_name, $email, $phone_number, $password);
        $result = $stmt->execute();
        $dbcon->close();
        echo "<h4>Conta criada com sucesso!</h4>\n";
        echo "<p><a href=\"../../../userpage.php\">Cique aqui</a> para iniciar sessão.</p>\n";
    }
?>
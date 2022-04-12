<?php
    require './connect.php';

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $cell_number = $_POST['cell'];
    $password = $_POST['password'];

    $insert = "INSERT INTO users VALUES ('$user_name','$first_name', '$last_name', '$email', '$password', '$cell_number',  CURRENT_DATE)";
    $user_query = "SELECT * FROM users where user_name='$user_name'";
    $email_query = "SELECT * FROM users where email='$email'";
    $user_result = mysqli_query($con, $user_query);
    $email_result = mysqli_query($con, $email_query);

    if(mysqli_num_rows($user_result) > 0) {
        echo "<p>Nome de usuario ja existente";
    } else {
        if(mysqli_num_rows($email_result) > 0) {
            echo "<p>Ja existe uma conta registada com esse email";
        } else {
            $insert_result = mysqli_query($con, $insert);
            echo "<p>Conta criada com sucesso!";
        }
    }
?>   
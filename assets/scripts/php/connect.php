<?php
    require './configuration.php';

    $con = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD, DATA_BASE);
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
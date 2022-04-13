<?php
    require('./config.php');

    $dbcon = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DATA_BASE);
    if ($dbcon->connect_error) {
        die("Connection failed: " . $dbcon->connect_error);
    }
    
?>
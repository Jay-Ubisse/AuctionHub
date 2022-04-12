<?php
    require('./config.php');

    $db = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DATA_BASE);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
?>
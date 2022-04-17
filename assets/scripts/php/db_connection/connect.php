<?php
    require_once 'config.php';
    try {
        $dbcon = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DATA_BASE);
    } catch (Exception $e) {
        print "Connection failed: " . $e->getMessage();
    }
    catch (Error $e) {
        print "Connection failed: " . $e->getMessage();
    }
    
?>
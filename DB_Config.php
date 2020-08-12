<?php
    $user = '';
    $password = '';
    $host = '';
    $database = '';
    
    $mysqli = new mysqli($host, $user, $password, $database);
    $mysqli->set_charset('utf8mb4');
?>
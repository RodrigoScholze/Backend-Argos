<?php
    date_default_timezone_set('America/Sao_Paulo');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header('Content-type: application/json');

    $JSON = file_get_contents('php://input');
    $Dataset = json_decode($JSON);

    require_once 'Controllers.php';
?>
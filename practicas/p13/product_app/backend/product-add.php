<?php
    use TECWEB\MYAPI\Create\Create; 
    include_once __DIR__ . '/vendor/autoload.php';
    $productos = new Create('marketzone');
    $productos -> add(json_decode(file_get_contents('php://input'),true));
    echo $productos -> getData();
?>

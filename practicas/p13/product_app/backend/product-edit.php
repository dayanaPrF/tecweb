<?php
    use TECWEB\MYAPI\Update\Update; 
    include_once __DIR__ . '/vendor/autoload.php';
    $productos = new Update('marketzone');
    $productos->edit(json_decode(file_get_contents('php://input')));
    echo $productos->getData();
?>

<?php
    use TECWEB\MYAPI\Delete\Delete; 
    include_once __DIR__ . '/vendor/autoload.php';
    $productos = new Delete('marketzone');
    $productos->delete($_GET['id']);
    echo $productos->getData();
?>
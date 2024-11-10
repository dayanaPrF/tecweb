<?php
    use TECWEB\MYAPI\Read\Read; 
    include_once __DIR__ . '/vendor/autoload.php';
    $products = new Read('marketzone');
    $products->list();
    echo $products->getData();
?>
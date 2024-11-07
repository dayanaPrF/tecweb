<?php
    namespace ACTIVIDADES\DATABABASES;
    require_once 'myapi/Products.php';
    $productos = new Products();
    $productos->delete($_GET['id']);
    echo $productos->getData();
?>
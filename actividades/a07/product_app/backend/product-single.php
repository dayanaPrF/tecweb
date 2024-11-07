<?php
    namespace ACTIVIDADES\DATABABASES;
    require_once 'myapi/Products.php';
    $productos = new Products();
    $productos->single($_POST['id']);
    echo $productos->getData();
?>
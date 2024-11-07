<?php
    namespace ACTIVIDADES\DATABABASES;
    require_once 'myapi/Products.php';
    $productos = new Products();
    $productos->edit(json_decode(file_get_contents('php://input')));
    echo $productos->getData();
?>

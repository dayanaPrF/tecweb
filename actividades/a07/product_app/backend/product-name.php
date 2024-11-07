<?php
    namespace ACTIVIDADES\DATABABASES;
    require_once 'myapi/Products.php';
    $productos = new Products();
    $productos->getByName($_POST['nombre']);
?>

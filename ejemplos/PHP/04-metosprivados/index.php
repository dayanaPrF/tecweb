<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 3</title>
</head>
<body>
    <?php
    use EJEMPLOS\POO\Cabecera as Cabecera;
    require_once __DIR__.'/tabla.php';

    $tab = new Tabla(2, 3, 'border: 1px solid');
    $tab->cargar(0,0, 'A');
    $tab->cargar(0,1, 'B');
    $tab->cargar(0,2, 'C');
    $tab->cargar(1,0, 'D');
    $tab->cargar(1,1, 'E');
    $tab->cargar(1,2, 'F');
    $tab->graficar();


    ?>
</body>
</html>
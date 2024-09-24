<?php
// Iniciar la conexión a la base de datos
@$link = new mysqli('localhost', 'root', 'dayprzf24', 'marketzone');	

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

// Validar que los datos no estén vacíos
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_POST['imagen']; // Nombre de la imagen, por ejemplo: "Peluche_pikachu.jpg"

// Validar que no existan productos con el mismo nombre, marca y modelo
$consulta = "SELECT * FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";
$resultado = $link->query($consulta);

if ($resultado->num_rows > 0) {
    die('Error: Ya existe un producto con el mismo nombre, marca y modelo.');
}

// Concatenar la ruta de la imagen
$ruta_imagen = "img/" . $imagen; // "img/Peluche_pikachu.jpg"

// Crear la consulta de inserción
$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
        VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$ruta_imagen')";

if ($link->query($sql)) {
    $insert_id = $link->insert_id;
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro Completado</title>
        <style>
            body {margin: 20px; background-color: #C4DF9B; font-family: Verdana, Helvetica, sans-serif; font-size: 90%;}
            h1 {color: #005825; border-bottom: 1px solid #005825;}
            h2 {font-size: 1.2em; color: #4A0048;}
        </style>
    </head>
    <body>
        <h1>MUCHAS GRACIAS</h1>
        <p>Hemos recibido la siguiente información de tu registro:</p>
        <h2>Detalles del Producto:</h2>
        <ul>
            <li><strong>Nombre:</strong> <em>'.$nombre.'</em></li>
            <li><strong>Marca:</strong> <em>'.$marca.'</em></li>
            <li><strong>Modelo:</strong> <em>'.$modelo.'</em></li>
            <li><strong>Precio:</strong> <em>'.$precio.'</em></li>
            <li><strong>Detalles:</strong> <em>'.$detalles.'</em></li>
            <li><strong>Unidades:</strong> <em>'.$unidades.'</em></li>
            <li><strong>Imagen:</strong> <em>'.$ruta_imagen.'</em></li>
            <li><strong>ID del Producto:</strong> <em>'.$insert_id.'</em></li>
        </ul>
    </body>
    </html>';
} else {
    echo 'El Producto no pudo ser insertado =(';
}

// Cerrar la conexión
$link->close();
?>

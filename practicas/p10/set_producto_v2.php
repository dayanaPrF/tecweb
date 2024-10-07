<?php
// Iniciar la conexión a la base de datos
@$link = new mysqli('localhost', 'root', 'dayprzf24', 'marketzone');	

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

// Inicializar variables para mensajes
$success_message = '';
$error_message = '';

// Validar que los datos no estén vacíos
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
//$imagen = $_POST['imagen'];

// Validar que no existan productos con el mismo nombre, marca y modelo
$consulta = "SELECT * FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";
$resultado = $link->query($consulta);

if ($resultado->num_rows > 0) {
    // Mensaje de error si el producto ya existe
    $error_message = 'Error: Ya existe un producto con el mismo nombre, marca o modelo.';
} else {
    $ruta_imagen = 'img/' . basename($_FILES['imagen']['name']);
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_NO_FILE) {
            // Si no se subió, asignar la imagen predeterminada
            $ruta_imagen = 'img/defecto.jpg';
        } else {
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
                die('<h1>Error al subir la imagen</h1>');
            }
        }

    // Concatenar la ruta de la imagen
    /*$ruta_imagen = "img/" . $imagen;
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_NO_FILE) {
            // Si no se subió, asignar la imagen predeterminada
            $ruta_imagen = 'img/defecto.jpg';
        } else {
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
                die('<h1>Error al subir la imagen</h1>');
            }
        }*/


    // Crear la consulta de inserción
    //$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
        //    VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$ruta_imagen')";

        //$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
        //    VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$ruta_imagen', 0)";
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$ruta_imagen')";



    if ($link->query($sql)) {
        // Capturar el ID del producto insertado y mensaje de éxito
        $insert_id = $link->insert_id;
        $success_message = 'El producto ha sido registrado con éxito.';
    } else {
        // Mensaje de error si no se pudo insertar el producto
        $error_message = 'El Producto no pudo ser insertado =(';
    }
}

// Cerrar la conexión
$link->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Registro de Producto</title>
    <style type="text/css">
        body {margin: 20px; background-color: #C4DF9B; font-family: Verdana, Helvetica, sans-serif; font-size: 90%;}
        h1 {color: #005825; border-bottom: 1px solid #005825;}
        h2 {font-size: 1.2em; color: #4A0048;}
    </style>
</head>
<body>
    <h1><?php echo $success_message ? 'Producto Registrado' : 'Error en el Registro'; ?></h1>

    <?php if ($success_message): ?>
        <p><?php echo $success_message; ?> Aquí están los detalles:</p>
        <h2>Detalles del Producto:</h2>
        <ul>
            <li><strong>Nombre:</strong> <em><?php echo $nombre; ?></em></li>
            <li><strong>Marca:</strong> <em><?php echo $marca; ?></em></li>
            <li><strong>Modelo:</strong> <em><?php echo $modelo; ?></em></li>
            <li><strong>Precio:</strong> <em><?php echo $precio; ?></em></li>
            <li><strong>Detalles:</strong> <em><?php echo $detalles; ?></em></li>
            <li><strong>Unidades:</strong> <em><?php echo $unidades; ?></em></li>
            <li><strong>Imagen:</strong> <em><?php echo $ruta_imagen; ?></em></li>
            <li><strong>ID del Producto:</strong> <em><?php echo $insert_id; ?></em></li>
        </ul>
    <?php else: ?>
        <p><?php echo $error_message ? $error_message : 'Ocurrió un error desconocido.'; ?></p>
    <?php endif; ?>
</body>
</html>

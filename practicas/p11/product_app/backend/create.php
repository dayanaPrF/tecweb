<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */

        //Extraer datos del objeto JSON
        $nombre = $conexion->real_escape_string($jsonOBJ->nombre);
        $marca = $conexion->real_escape_string($jsonOBJ->marca);
        $modelo = $conexion->real_escape_string($jsonOBJ->modelo);
        $precio = $conexion->real_escape_string($jsonOBJ->precio);
        $detalles = $conexion->real_escape_string($jsonOBJ->detalles);
        $unidades = $conexion->real_escape_string($jsonOBJ->unidades);
        $ruta_imagen = $conexion->real_escape_string($jsonOBJ->imagen);


        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$ruta_imagen')";

        // Ejecutar la consulta y verificar el resultado
        if ($conexion->query($sql) === TRUE) {
            echo json_encode(['mensaje' => 'Producto insertado correctamente']);
        } else {
            echo json_encode(['mensaje' => 'Error: ' . $conexion->error]);
        }

        $conexion->close(); //Cierra la conexión después de procesar
    }
?>
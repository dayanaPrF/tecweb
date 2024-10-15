<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JASON A OBJETO
    $jsonOBJ = json_decode($producto);
    
    // Extraer datos del objeto JSON
    $nombre = $conexion->real_escape_string($jsonOBJ->nombre);
    $marca = $conexion->real_escape_string($jsonOBJ->marca);
    $modelo = $conexion->real_escape_string($jsonOBJ->modelo);
    $precio = $conexion->real_escape_string($jsonOBJ->precio);
    $detalles = $conexion->real_escape_string($jsonOBJ->detalles);
    $unidades = $conexion->real_escape_string($jsonOBJ->unidades);
    $ruta_imagen = $conexion->real_escape_string($jsonOBJ->imagen);

    // VALIDAR SI YA EXISTE EL PRODUCTO (nombre y eliminado = 0)
    $sql = "SELECT 1 FROM productos WHERE nombre = ? AND eliminado = 0";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $nombre);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["error" => "El producto ya existe"]);
    } else {
        // INSERTAR EL PRODUCTO
        $sql = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('sdissss', $nombre, $precio, $unidades, $modelo, $marca, $detalles, $ruta_imagen);

        if ($stmt->execute()) {
            echo json_encode(["mensaje" => "Producto agregado exitosamente"]);
        } else {
            echo json_encode(["error" => "Error al agregar el producto"]);
        }
    }

    $stmt->close(); // Cierra la declaración
    $conexion->close(); // Cierra la conexión después de procesar
}
?>

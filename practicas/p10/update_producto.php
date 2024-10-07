<?php
$link = mysqli_connect("localhost", "root", "dayprzf24", "marketzone");
if ($link === false) {
    die("ERROR: No pudo conectarse con la base de datos. " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = mysqli_real_escape_string($link, $_POST['precio']);
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);
    $unidades = mysqli_real_escape_string($link, $_POST['unidades']);
    $id = "SELECT id, imagen FROM productos WHERE nombre = '$nombre'";
    $result_id = mysqli_query($link, $id);
    if ($result_id && mysqli_num_rows($result_id) > 0) {
        $row = mysqli_fetch_assoc($result_id);
        $id_producto = $row['id'];
        $img_actual = $row['imagen'];
    } else {exit;}

    $nombre_imagen = $img_actual; 
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $directorio_destino = 'img/';
        $nombre_imagen_nueva = basename($_FILES['imagen']['name']);
        $ruta_completa = $directorio_destino . $nombre_imagen_nueva;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
            $nombre_imagen = $ruta_completa;
        }
    }
    $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades', imagen='$nombre_imagen'  WHERE id='$id_producto'";
    if (mysqli_query($link, $sql)) {
        echo "<h2>Se ha actualizado el producto exitosamente</h2>";
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>
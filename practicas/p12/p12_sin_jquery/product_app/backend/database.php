<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'dayprzf24',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Respuesta a formularios</title>
</head>
<body>
    <?php
    include 'funciones.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        // EJERCICIO 5 RESPUESTA
        if (isset($_POST['edad']) && isset($_POST['sexo']))
        {
            echo '<h2>Resultado ejercicio 5</h2>';
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) 
            {
                echo '<p>Bienvenida, usted está en el rango de edad permitido.</p>';
            } else {
                echo '<p>Lo sentimos, usted no cumple con los requisitos de edad o sexo.</p>';
            }
        }

        // EJERCICIO 6 RESPUESTA
        $listarTodos = isset($_POST['listarVehiculos']);
        $matricula = $_POST['matricula'];
        $band = false;
        if (isset($_POST['matricula']) && isset($_POST['enviarmatricula']))
        {
            $band = true;
            echo '<h2>Resultado ejercicio 6</h2>';
            $vehiculos = obtenerVehiculos();
            $vehiculo = buscarMatricula($vehiculos, $matricula);
            if ($vehiculo != null) 
            {
                echo '<h3>Detalles del vehiculo</h3>';
                echo '<pre>';
                print_r($vehiculos[$matricula]);
                echo '</pre>';
            } 
            else 
            {
                if (!empty($matricula))
                {
                    echo '<p>No se encontró un vehiculo con la matrícula: ' .$matricula. '</p>';
                }
            }
        } 
        if ($listarTodos && $_POST['listarVehiculos'] == 'true' && !$band) 
        {
            echo '<h2>Resultado ejercicio 6</h2>';
            echo '<h3>Lista de todos los vehiculos</h3>';
            $vehiculos = obtenerVehiculos();
            echo '<pre>';
            print_r($vehiculos);
            echo '</pre>';
        } 
        
    }
    ?>
</body>
</html>

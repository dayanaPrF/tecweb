<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Respuesta a formularios</title>
</head>
<body>
    <?php
    //EJERCICIO 5 RESPUESTA
    echo '<h2>Resultado ejercicio 5</h2>';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) 
            {
                echo '<p>Bienvenida, usted está en el rango de edad permitido.</p>';
            } else {
                echo '<p>Lo sentimos, usted no cumple con los requisitos de edad o sexo.</p>';
            }
        }
    }else{
        echo '<p>No se enviaron datos.</p>';
    }
    ?>
</body>
</html>

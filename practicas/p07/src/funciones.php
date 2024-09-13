<?php

    //Ejercicio 1
    function esMultiploDe5y7($numero) {
        if(isset($numero))
        {
            $num = $numero;
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    }

    //Ejercicio 2
    function secuencia() {
        $matriz = array(); $i = 0; $totalNumeros = 3;
        $n1 = rand(10, 99); $n2 = rand(10, 99); $n3 = rand(10, 99);
        $matriz[] = array($n1, $n2, $n3);
        $numFilas = 1;
        while (!($n1 % 2 != 0 && $n2 % 2 == 0 && $n3 % 2 != 0)) 
        {
            $i++;
            $n1 = rand(10, 99); $n2 = rand(10, 99); $n3 = rand(10, 99);
            $totalNumeros += 3;
            $matriz[] = array($n1, $n2, $n3);
            $numFilas++;
        }
        for ($j = 0; $j < $numFilas; $j++) 
        {
            echo '| ';
            for ($k = 0; $k < 2; $k++) 
            {
                echo $matriz[$j][$k] . ', ';
            }
            echo $matriz[$j][$k] . ' ';
            echo '|<br>';
        }
        echo '<p>' . $totalNumeros . ' números obtenidos en ' . ($i + 1) . ' iteraciones.</p>';
    }
    
    


    //Ejercicio 3
    function primerEnteroWhile($numeroDado){
        if(isset($numeroDado))
        {
            $num1 = $numeroDado; $num2 = aleatorioNoEntero();
            while (!(is_int($num2) && $num2 % $num1 == 0))
            {
                $num2 = aleatorioNoEntero();
            }
            echo 'El número '.$num2.' es entero y es multiplo de '.$num1;

        }
    }

    function primerEnteroDoWhile($numeroDado){
        if(isset($numeroDado))
        {
            $num1 = $numeroDado;
            do
            {
                $num2 = aleatorioNoEntero();
            } while (!(is_int($num2) && $num2 % $num1 == 0));
            echo 'El número '.$num2.' es entero y es múltiplo de '.$num1;
        }
    }

    function aleatorioNoEntero(){
        return rand(1,1000)/rand(1,1000);
    }


    //Ejercicio 4
    function indecesLetras(){
        $arreglo = array();
        for ($i = 97; $i <= 122; $i++) {
            $arreglo[$i] = chr($i);
        }

        //Tabla XHTML
        echo '<table border="1">';
        echo '<tr><th>Índice</th><th>Valor</th></tr>';
        foreach ($arreglo as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key .'</td>';
            echo '<td>' . $value .'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    //Ejercicio 6 (funcion para generar arreglo en codigo duro)
    function obtenerVehiculos(){
        $vehiculos = array(
            'ABC1234' => array(
                'Auto' => array(
                    'marca' => 'HONDA',
                    'modelo' => 2020,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Alfonzo Esparza',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => 'C.U., Jardines de San Manuel'
                )
            ),
            'XYZ5678' => array(
                'Auto' => array(
                    'marca' => 'MAZDA',
                    'modelo' => 2019,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Ma. del Consuelo Molina',
                    'ciudad' => 'Puebla, Pue.',
                    'direccion' => '97 oriente'
                )
            ),
            'DEF9012' => array(
                'Auto' => array(
                    'marca' => 'TOYOTA',
                    'modelo' => 2018,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Juan Perez',
                    'ciudad' => 'Monterrey, N.L.',
                    'direccion' => 'Calle Primavera 123'
                )
            ),
            'GHI3456' => array(
                'Auto' => array(
                    'marca' => 'FORD',
                    'modelo' => 2021,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Ana Gonzalez',
                    'ciudad' => 'Guadalajara, Jal.',
                    'direccion' => 'Av. Revolución 45'
                )
            ),
            'JKL7890' => array(
                'Auto' => array(
                    'marca' => 'CHEVROLET',
                    'modelo' => 2017,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Roberto Lopez',
                    'ciudad' => 'Querétaro, Qro.',
                    'direccion' => 'Calle Hidalgo 56'
                )
            ),
            'MNO1234' => array(
                'Auto' => array(
                    'marca' => 'NISSAN',
                    'modelo' => 2022,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Laura Martinez',
                    'ciudad' => 'Tijuana, BC.',
                    'direccion' => 'Blvd. Agua Caliente 789'
                )
            ),
            'PQR5678' => array(
                'Auto' => array(
                    'marca' => 'HYUNDAI',
                    'modelo' => 2019,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Carlos Ortiz',
                    'ciudad' => 'Mérida, Yuc.',
                    'direccion' => 'Av. Reforma 65'
                )
            ),
            'STU9012' => array(
                'Auto' => array(
                    'marca' => 'KIA',
                    'modelo' => 2020,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Sofia Ramirez',
                    'ciudad' => 'Cancún, Q. Roo',
                    'direccion' => 'Calle del Mar 90'
                )
            ),
            'VWX3456' => array(
                'Auto' => array(
                    'marca' => 'VOLKSWAGEN',
                    'modelo' => 2016,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Miguel Sanchez',
                    'ciudad' => 'León, Gto.',
                    'direccion' => 'Calle de la Paz 12'
                )
            ),
            'YZA7890' => array(
                'Auto' => array(
                    'marca' => 'BMW',
                    'modelo' => 2021,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Daniela Vega',
                    'ciudad' => 'Toluca, Edomex',
                    'direccion' => 'Av. Insurgentes 67'
                )
            ),
            'BCD2345' => array(
                'Auto' => array(
                    'marca' => 'MERCEDES',
                    'modelo' => 2022,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Luis Herrera',
                    'ciudad' => 'Ciudad de México, CDMX',
                    'direccion' => 'Colonia Roma 45'
                )
            ),
            'EFG6789' => array(
                'Auto' => array(
                    'marca' => 'AUDI',
                    'modelo' => 2018,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Paola Torres',
                    'ciudad' => 'Oaxaca, Oax.',
                    'direccion' => 'Av. Juárez 98'
                )
            ),
            'HIJ0123' => array(
                'Auto' => array(
                    'marca' => 'SEAT',
                    'modelo' => 2020,
                    'tipo' => 'hatchback'
                ),
                'Propietario' => array(
                    'nombre' => 'Ricardo Rios',
                    'ciudad' => 'Cuernavaca, Mor.',
                    'direccion' => 'Calle Las Flores 101'
                )
            ),
            'KLM4567' => array(
                'Auto' => array(
                    'marca' => 'TESLA',
                    'modelo' => 2021,
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Monica Suarez',
                    'ciudad' => 'Guadalajara, Jal.',
                    'direccion' => 'Calle Primavera 11'
                )
            ),
            'NOP8901' => array(
                'Auto' => array(
                    'marca' => 'JEEP',
                    'modelo' => 2019,
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Andrés Castro',
                    'ciudad' => 'Saltillo, Coah.',
                    'direccion' => 'Calle Real 33'
                )
            )
        );
        return $vehiculos;
    }

    function buscarMatricula($vehiculos, $matriculaB) {
        foreach ($vehiculos as $matricula => $vehiculo) {
            if ($matricula === $matriculaB) {
                return $vehiculo;
            }
        }
        return null;
    }

?>


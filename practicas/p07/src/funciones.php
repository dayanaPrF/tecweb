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
            for ($k = 0; $k < 3; $k++) 
            {
                echo $matriz[$j][$k] . ' ';
            }
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

    }
?>


<?php
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

    function secuencia() {
        $i = 1; $num = 3;
        $n1 = rand(10, 99); $n2 = rand(10, 99); $n3 = rand(10, 99);
        echo '|'.$n1.', '.$n2.', '.$n3.'|'.'<br>';
        while (!($n1 % 2 != 0 && $n2 % 2 == 0 && $n3 % 2 != 0)) 
        {
            $i++;
            $n1 = rand(10, 99); $n2 = rand(10, 99); $n3 = rand(10, 99);
            echo '|'.$n1.', '.$n2.', '.$n3.'|'.'<br>';
            $num += 3;
        }
        echo $num . ' números obtenidos en ' . $i . ' iteraciones.';
    }
    
?>


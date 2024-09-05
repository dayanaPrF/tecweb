<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Práctica 5 </title>
    </head>
    <body>
        <?php
            echo '<h1> EJERCICIOS PRACTICA 5</h1>';

            //EJERCICIO 1
            echo '<h2> Ejercicio 1</h2>';

            //Definicion de variables
            $_myvar = 'Soy la primera variable';
            $_7var = 725;
            /*myvar = 'Variable';*/
            $myvar = 3.1416;
            $var7 = true;
            $_element1 = 'D';
            /*$house*5 = '5690.1';*/

            echo '<i>$_myvar</i>: <b>VALIDA.</b> Comienza con signo de dolar, después un underscore seguido de letras. $_myvar = '.$_myvar.'<br>';
            echo '<i>$_7var</i>: <b>VALIDA.</b> Comienza con signo de dolar, después un underscore, posteriormente números y letras. $_7var = '.$_7var.'<br>';
            echo '<i>myvar</i>: <b>NO VALIDA.</b> No comienza con signo de dolar.'.'<br>';
            echo '<i>$myvar</i>: <b>VALIDA.</b> Comienza con signo de dolar seguido de letras. $myvar = '.$myvar.'<br>';
            echo '<i>$var7</i>: <b>VALIDA.</b> Comienza con signo de dolar seguido de letras y números. $var7 = '.$var7.'<br>';
            echo '<i>$_element1</i>: <b>VALIDA.</b> Comienza con signo de dolar, después un underscore, posteriormente números y letras. $_element1 = '.$_element1.'<br>';
            echo '<i>$house*5</i>: <b>NO VALIDA.</b> Contiene un caracter especial (*), y deben ser numeros y/o letras.'.'<br>';

            //Liberar variables del ejercicio 1
            unset($_myvar);
            unset($_7var);
            unset($myvar);
            unset($var7);
            unset($_element1);


            //EJERCICIO 2
            echo '<h2> Ejercicio 2</h2>';
            
            //Definicion de variables




        ?>
    </body>
</html>
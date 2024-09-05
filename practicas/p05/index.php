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
            $a = "ManejadorSQL";
            $b = 'MySQL';
            $c = &$a;

            echo '<b>Contenido de las variables:</b><br>';
            echo '<ul><li>$a = '.$a.'</li>';
            echo '<li>$b = '.$b.'</li>';
            echo '<li>$c = '.$c.'</li>';
            echo '</ul>';

            //Variables modificadas
            $a = "PHP server";
            $b = &$a;

            echo '<b>Contenido de las variables modificadas:</b><br>';
            echo '<ul><li>$a = '.$a.'</li>';
            echo '<li>$b = '.$b.'</li>';
            echo '<li>$c = '.$c.'</li>';
            echo '</ul>';

            //Descripcion de lo sucedido
            echo "<b>Explicacion:</b><br>";
            echo 'Las primeras asignaciones asignan directamente valores a las variables <i>$a, $b y $ c</i> 
            (donde $c contiene la referencia del contenido de $a por medio del operador &). En el segundo bloque se le asigna un 
            nuevo valor a $a, siendo este <b>PHP server</b>, posteriormente se le asigna el contenido de $a
            a la variable $b, y, ya que $c ya se le asignó el contenido de $a anteriormente, ahora se le asigna el 
            nuevo contenido, por lo que todas las variables imprimen <b>PHP server</b><br>';


            //Liberar variables del ejercicio 2
            unset($a);
            unset($b);
            unset($c);

            //EJERCICIO 3
            echo '<h2> Ejercicio 3</h2>';

            //Definicion de variables
            $a = "PHP5";
            echo 'Valor de $a= '.$a.'<br>';

            $z[] = &$a;
            echo 'Valor de $z[]=';
            var_dump($z);
            echo '<br>';

            $b = "5a version de PHP";
            echo 'Valor de $b= '.$b.'<br>';

            $c = $b*10;
            echo 'Valor de $c= '.$c.'<br>';

            $a .= $b;
            echo 'Valor de $a= '.$a.'<br>';

            $b *= $c;
            echo 'Valor de $b= '.$b.'<br>';

            $z[0] = "MySQL";
            echo 'Valor de $z[]=';
            var_dump($z);
            echo '<br>';

            //Liberar variables del ejercicio 3
            unset($a);
            unset($z);
            unset($b);
            unset($c);

            
            
            //EJERCICIO 4
            echo '<h2> Ejercicio 4</h2>';
            echo '<b>Variables del ejercicio 3 usando $GLOBALS</b>';

            $a = "PHP5";
            $z[] = &$a;
            $b = "5a version de PHP";
            $c = $b*10;
            $a .= $b;
            $b *= $c;
            $z[0] = "MySQL";

            function variablesGlobales() {
                echo '<ul>';
                echo '<li>$GLOBALS[\'a\'] = '.$GLOBALS['a'].'</li>';
                echo '<li>$GLOBALS[\'b\'] = '.$GLOBALS['b'].'</li>';
                echo '<li>$GLOBALS[\'c\'] = '.$GLOBALS['c'].'</li>';
                echo '<li>$GLOBALS[\'z\'] = ';
                var_dump($GLOBALS['z']);
                echo '</li>';
                echo '</ul>';
                
            }

            variablesGlobales();

            //Liberar variables del ejercicio 4
            unset($a);
            unset($z);
            unset($b);
            unset($c);



            //EJERCICIO 5
            echo '<h2> Ejercicio 5</h2>';

            echo '<ul>';
            $a = "7 personas";
            echo '<li>Valor de $a= '.$a.'</li>';
            $b = (integer) $a;
            echo '<li>Valor de $b= '.$b.'</li>';
            $a = "9E3";
            echo '<li>Valor de $a= '.$a.'</li>';
            $c = (double) $a;
            echo '<li>Valor de $c= '.$c.'</li>';
            echo '</ul>';

            //Liberar variables del ejercicio 5
            unset($a);
            unset($b);
            unset($c);
            

            //EJERCICIO 6
            
            


        ?>
    </body>
</html>
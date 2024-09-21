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

            echo '<p><i>$_myvar</i>: <b>VALIDA.</b> Comienza con signo de dólar, después un underscore seguido de letras. $_myvar = '.$_myvar.'</p>';
            echo '<p><i>$_7var</i>: <b>VALIDA.</b> Comienza con signo de dolar, después un underscore, posteriormente números y letras. $_7var = '.$_7var.'</p>';
            echo '<p><i>myvar</i>: <b>NO VALIDA.</b> No comienza con signo de dolar.</p>';
            echo '<p><i>$myvar</i>: <b>VALIDA.</b> Comienza con signo de dolar seguido de letras. $myvar = '.$myvar.'</p>';
            echo '<p><i>$var7</i>: <b>VALIDA.</b> Comienza con signo de dolar seguido de letras y números. $var7 = '.$var7.'</p>';
            echo '<p><i>$_element1</i>: <b>VALIDA.</b> Comienza con signo de dolar, después un underscore, posteriormente números y letras. $_element1 = '.$_element1.'</p>';
            echo '<p><i>$house*5</i>: <b>NO VALIDA.</b> Contiene un caracter especial (*3), y deben ser numeros y/o letras.</p>';

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

            echo '<p><b>Contenido de las variables:</b></p>';
            echo '<ul><li>$a = '.$a.'</li>';
            echo '<li>$b = '.$b.'</li>';
            echo '<li>$c = '.$c.'</li>';
            echo '</ul>';

            //Variables modificadas
            $a = "PHP server";
            $b = &$a;

            /*echo '<p><b>Contenido de las variables modificadas:</b></p>';
            echo '<ul><li>$a = '.$a.'</li>';
            echo '<li>$b = '.$b.'</li>';
            echo '<li>$c = '.$c.'</li>';
            echo '</ul>';*/
            echo '<p><b>Contenido de las variables modificadas:</b></p>';
            echo '<ul><li>$a = '.$a.'</li>';
            echo '<li>$b = '.$b.'</li>';
            echo '<li>$c = '.$c.'</li>';
            echo '</ul>';

            //Descripcion de lo sucedido
            echo "<p><b>Explicacion:</b></p>";
            echo '<p>Las primeras asignaciones asignan directamente valores a las variables <i>$a, $b y $c</i> 
            (donde $c contiene la referencia del contenido de $a por medio del operador &amp;). En el segundo bloque se le asigna un 
            nuevo valor a $a, siendo este <b>PHP server</b>, posteriormente se le asigna el contenido de $a
            a la variable $b, y, ya que $c ya se le asignó el contenido de $a anteriormente, ahora se le asigna el 
            nuevo contenido, por lo que todas las variables imprimen <b>PHP server</b></p>';


            //Liberar variables del ejercicio 2
            unset($a);
            unset($b);
            unset($c);

            //EJERCICIO 3
            echo '<h2> Ejercicio 3</h2>';

            //Definicion de variables
            $a = "PHP5";
            echo '<p>Valor de $a= '.$a.'</p>';

            $z[] = &$a;
            echo '<p>Valor de $z[]=';
            foreach ($z as $valor) {
                echo $valor . ' ';
            }
            //print_r($z);
            echo '</p>';

            $b = "5a version de PHP";
            echo '<p>Valor de $b= '.$b.'</p>';         

            $c = (integer)$b * 10;
            echo '<p>Valor de $c= '.$c.'</p>';

            $a .= $b;
            echo '<p>Valor de $a= '.$a.'</p>';

            $b_numeric = (int) $b;
            $b_numeric *= $c;
            //$b *= $c;
            echo '<p>Valor de $b= '.$b.'</p>';

            $z[0] = "MySQL";
            echo '<p>Valor de $z[]=';
            foreach ($z as $valor) {
                echo $valor . ' ';
            }
            //var_dump($z);
            echo '</p>';

            //Liberar variables del ejercicio 3
            unset($a);
            unset($z);
            unset($b);
            unset($b_numeric);
            unset($c);

            
            
            //EJERCICIO 4
            echo '<h2> Ejercicio 4</h2>';
            echo '<p><b>Variables del ejercicio 3 usando $GLOBALS</b></p>';

            $a = "PHP5";
            $z[] = &$a;
            $b = "5a version de PHP";
            $c = (integer)$b*10;
            $a .= $b;
            $b_numeric = (integer)$b;
            $b_numeric *= $c;
            $z[0] = "MySQL";

            function variablesGlobales() {
                echo '<ul>';
                echo '<li>$GLOBALS[\'a\'] = '.$GLOBALS['a'].'</li>';
                echo '<li>$GLOBALS[\'b\'] = '.$GLOBALS['b'].'</li>';
                echo '<li>$GLOBALS[\'c\'] = '.$GLOBALS['c'].'</li>';
                echo '<li>$GLOBALS[\'z\'] = ';
                foreach ($GLOBALS['z'] as $valor) {
                    echo $valor . ' '; 
                }
                //var_dump($GLOBALS['z']);
                echo '</li>';
                echo '</ul>';
                
            }

            variablesGlobales();

            //Liberar variables del ejercicio 4
            unset($a);
            unset($z);
            unset($b);
            unset($b_numeric);
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
            echo '<h2> Ejercicio 6</h2>';

            $a = "0";
            $b = "TRUE";
            $c = FALSE;
            $d = ($a OR $b);
            $e = ($a AND $c);
            $f = ($a XOR $b);

            echo '<ul>';
            echo '<li>Valor de $a= ';
            var_dump($a);
            echo '</li>';

            echo '<li>Valor de $b= ';
            var_dump($b);
            echo '</li>';

            echo '<li>Valor de $c= ';
            var_dump($c);
            echo '</li>';

            echo '<li>Valor de $d= ';
            var_dump($d);
            echo '</li>';

            echo '<li>Valor de $e= ';
            var_dump($e);
            echo '</li>';

            echo '<li>Valor de $f= ';
            var_dump($f);
            echo '</li>';
            echo '</ul>';

            // Convertir variables
            echo '<p><b>Variables convertidas:</b></p>';
            // Convertir $c a cadena
            settype($c, "string");
            echo '<ul>';
            echo '<li>Valor de $c= '.$c.'</li>';
            // Convertir $e a cadena
            settype($e, "string");
            echo '<li>Valor de $e= '.$e.'</li>';
            echo '</ul>';

            echo '<p><i>El valor falso se muestra con una cadena vacía al usar <b>settype()</b>.</i></p>';

            //Liberar variables del ejercicio 5
            unset($a);
            unset($b);
            unset($c);
            unset($d);
            unset($e);
            unset($f);

          
            
            //EJERCICIO 7
            echo '<h2> Ejercicio 7</h2>';

            echo '<p>Versión de PHP y Apache: '.$_SERVER['SERVER_SOFTWARE'].'</p>';
            echo '<p>Versión del sistema operativo (servidor): '.$_SERVER['SERVER_NAME'].'</p>';
            echo '<p>Idioma del navegador (cliente): '.$_SERVER['HTTP_ACCEPT_LANGUAGE'].'</p>';



        ?>
        <p>
            <a href="https://validator.w3.org/markup/check?uri=referer"><img
            src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
        </p>
    </body>
</html>
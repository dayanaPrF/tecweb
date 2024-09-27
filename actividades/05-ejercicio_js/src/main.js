
/*function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}*/

//EJERCICIO 1
function holaMundo()
{
    var vdiv1 = document.getElementById('ej1');
    vdiv1.innerHTML = '<h4>Hola Mundo</h4>';
    //document.write('Hola Mundo');
}

//EJERCICIO 2
function leerVariables()
{
    var vdiv2 = document.getElementById('ej2');
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;
    /*document.write( nombre );
    document.write( '<br>' );
    document.write( edad );
    document.write( '<br>' );
    document.write( altura );
    document.write( '<br>' );
    document.write( casado );*/
    vdiv2.innerHTML = 'Nombre: '+nombre+'<br>Edad:'+edad+'<br>Altura: '+altura+'<br>Casado: '+casado;
}

//EJERCICIO 3
function leerVariables2()
{
    var vdiv3 = document.getElementById('ej3');
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    vdiv3.innerHTML = 'Hola '+nombre+' así que tienes '+edad+' años';
    /*document.write('Hola ');
    document.write(nombre);
    document.write(' así que tienes ');
    document.write(edad);
    document.write(' años');*/
}

//EJERCICIO 4
function estructura1()
{
    var vdiv4 = document.getElementById('ej4');
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    vdiv4.innerHTML = 'La suma es '+suma+'<br>El producto es '+producto;
    /*document.write('La suma es ');
    document.write(suma);
    document.write('<br>');
    document.write('El producto es ');
    document.write(producto);*/
}

//EJERCICIO 5
function estructura2()
{
    var vdiv5 = document.getElementById('ej5');
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) 
    {
        vdiv5.innerHTML = nombre + '  esta aprobado con un ' + nota;
        //document.write(nombre+'  esta aprobado con un '+nota);
    }
}

//EJRCICIO 6
function estructura3()
{
    var vdiv6 = document.getElementById('ej6');
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    if (num1>num2) 
    {
        vdiv6.innerHTML = 'el mayor es '+num1;
        //document.write('el mayor es '+num1);
    } else {
        vdiv6.innerHTML ='el mayor es '+num2;
        //document.write('el mayor es '+num2);
    }
}

//Ejercicio 7
function estructura4()
{
    var vdiv7 = document.getElementById('ej7');
    var nota1,nota2,nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        vdiv7.innerHTML = 'aprobado';
        //document.write('aprobado');
    } else {
        if (pro>=4) {
            vdiv7.innerHTML = 'regular';
            //document.write('regular');
        } else {
            vdiv7.innerHTML = 'reprobado';
            //document.write('reprobado');
        }
    }
}

//EJERCICIO 8
function estructura5()
{
    var vdiv8 = document.getElementById('ej8');
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:','');
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: 
            vdiv8.innerHTML = 'uno';
            //document.write('uno');
            break;

        case 2: 
            vdiv8.innerHTML = 'dos';
            //document.write('dos');
            break;

        case 3: 
            vdiv8.innerHTML = 'tres';
            //document.write('tres');
            break;

        case 4: 
            vdiv8.innerHTML = 'cuatro';
            //document.write('cuatro');
            break;

        case 5: 
            vdiv8.innerHTML = 'cinco';
            //document.write('cinco');
            break;

        default:
            document.write('debe ingresar un valor comprendido entre 1 y 5.');
    }
}

//EJERCICIO 9
function estructura6()
{
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)','');
    switch (col) {
        case 'rojo': 
            document.bgColor='#ff0000';
            break;
        case 'verde': 
            document.bgColor='#00ff00';
            break;
        case 'azul': 
            document.bgColor='#0000ff';
            break;
    }
}

//EJERCICIO 10
function estructuraRep1()
{
    var vdiv10 = document.getElementById('ej10');
    var x;
    x=1;
    while (x<=100) {
        vdiv10.innerHTML += x+'<br>';
        //document.write(x);
        //document.write('<br>');
        x=x+1;
    }
}

//EJERCICIO 11
function estructuraRep2()
{
    var vdiv11 = document.getElementById('ej11');
    var x=1;
    var suma=0;
    var valor;
    while (x<=5){
        valor = prompt('Ingresa el valor:','');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    vdiv11.innerHTML = "La suma de los valores es "+suma+"<br>";
    //document.write("La suma de los valores es "+suma+"<br>");
}


//EJERCICIO 12
function estructuraRep3()
{
    var vdiv12 = document.getElementById('ej12');
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:','');
        valor = parseInt(valor);
        vdiv12.innerHTML += 'El valor '+valor;
        //document.write('El valor '+valor+' tiene ');
        if (valor<10){
            vdiv12.innerHTML += ' tiene 1 dígitos';
            //document.write('Tiene 1 dígitos')
        }else{
            if (valor<100) {
                vdiv12.innerHTML += ' tiene 2 dígitos';
                //document.write('Tiene 2 dígitos');
            }else {
                vdiv12.innerHTML += ' tiene 3 dígitos';
                //document.write('Tiene 3 dígitos');
            }
            
        }
        vdiv12.innerHTML += '<br>';
        //document.write('<br>');
    }while(valor!=0);
}

//EJERCICIO 13
function estructuraRep4()
{
    var vdiv13 = document.getElementById('ej13');
    var f;
    for(f=1; f<=10; f++)
    {
        vdiv13.innerHTML += f+" "
        //document.write(f+" ");
    }
}

//EJERCICIO 14
function funciones1()
{
    var vdiv14 = document.getElementById('ej14');
    vdiv14.innerHTML = "Cuidado<br>"+"Ingresa tu documento correctamente<br>";
    vdiv14.innerHTML += "Cuidado<br>"+"Ingresa tu documento correctamente<br>";
    vdiv14.innerHTML += "Cuidado<br>"+"Ingresa tu documento correctamente<br>";
    /*document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");*/
}

//EJRCICIO 15
function mostrarMensaje(vdiv15) {
    vdiv15.innerHTML += "Cuidado<br>"+"Ingresa tu documento correctamente<br>";
    //document.write("Ingresa tu documento correctamente<br>");
    //document.write("Cuidado<br>");
}

function funciones2()
{
    var vdiv15 = document.getElementById('ej15');
    vdiv15.innerHTML = "";
    mostrarMensaje(vdiv15);
    mostrarMensaje(vdiv15);
    mostrarMensaje(vdiv15);
}

//EJERCICIO 16
function mostrarRango(x1,x2,vdiv16) {
    var inicio;
    for(inicio=x1; inicio<=x2; inicio++) {
        vdiv16.innerHTML += inicio+'';
        //document.write(inicio+'');
    }
}
function funciones3()
{
    var vdiv16 = document.getElementById('ej16');
    vdiv16.innerHTML = "";
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2,vdiv16);
}

//EJERCICIO 17
function convertirCastellano(x) {

    if(x==1)
        return "uno";
    else
        if(x==2)
            return "dos";
        else
            if(x==3)
                return "tres";
            else
                if(x==4)
                    return "cuatro";
                else
                    if(x==5)
                        return "cinco";
                    else
                        return "valor incorrecto";
    
}

function funciones4()
{
    var vdiv17 = document.getElementById('ej17');
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    vdiv17.innerHTML = r;
    //document.write(r);
}

//EJERCICIO 18
function convertirCastellano2(x) {
    switch (x) {
    case 1: return "uno";
    case 2: return "dos";
    case 3: return "tres";
    case 4: return "cuatro";
    case 5: return "cinco";
    default: return "valor incorrecto";
    }
}

function funciones5()
{
    var vdiv18 = document.getElementById('ej18');
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano2(valor);
    vdiv18.innerHTML = r;
}
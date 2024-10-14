// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault(); //Modifica el formulario de manera personalizada

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    //client.send("query=" + encodeURIComponent(id)); // Enviando como 'query'
    client.send("id="+id);
}

// FUNCION CALLBACK DE BOTON "Buscar"
function buscarProducto(e) {
    e.preventDefault(); // Previene el comportamiento predeterminado del formulario

    document.getElementById("lista-productos").innerHTML = ''; //Limpiar lista de productos multiples
    document.getElementById("productos").innerHTML = ''; //Limpiar tabla de un solo producto
    
    // SE OBTIENE EL RESULTADO A BUSCAR
    var resultado = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXION ASINCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        //SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n' + client.responseText);
            
            //SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);
            
            if (Array.isArray(productos) && productos.length === 1) {//Si solo hay un producto, mostrarlo en la tabla inferior
                let producto = productos[0];
                
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>
                `;

                let template = `
                    <tr>
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                    </tr>
                `;

                document.getElementById("productos").innerHTML = template;

            } else if (Array.isArray(productos) && productos.length > 1) {//Si hay varios productos, mostrarlos en la lista superior
                let lista = document.getElementById("lista-productos");
                lista.innerHTML = ''; //Limpiar la lista antes de agregar nuevos resultados

                //li.innerHTML = '<h3>Resultados de busqueda:</h3>'
                productos.forEach(producto => {
                    let li = document.createElement('li');
                    li.innerHTML = `
                        <strong>${producto.nombre}</strong><br>
                        Marca: ${producto.marca}<br>
                        Detalles: ${producto.detalles}<br>
                    `;
                    lista.appendChild(li); //Agregar el elemento li a la lista
                });
            } else {
                // Si no hay resultados, mostrar un mensaje
                document.getElementById("lista-productos").innerHTML = '<li>No se encontraron productos.</li>';
            }
        }
    };
    client.send("query=" + encodeURIComponent(resultado)); //Enviando como 'query'
}

// FUNCIÓN DE VALIDACIÓN
function validarJson(productoJsonString) {
    try {
        // Intenta parsear el JSON
        let jsonObject = JSON.parse(productoJsonString);

        // Valida el nombre
        if (typeof jsonObject.nombre !== 'string' || jsonObject.nombre.trim() === "" || jsonObject.nombre.length > 100) {
            return { valido: false, mensaje: "El nombre es requerido y debe tener 100 caracteres o menos." };
        }

        // Valida la marca
        if (typeof jsonObject.marca !== 'string' || jsonObject.marca.trim() === "" || !isMarcaValida(jsonObject.marca)) {
            return { valido: false, mensaje: "La marca es requerida y debe seleccionarse de la lista de opciones." };
        }

        // Valida el modelo
        if (typeof jsonObject.modelo !== 'string' || jsonObject.modelo.trim() === "" || jsonObject.modelo.length > 25 || !/^[a-zA-Z0-9\s]+$/.test(jsonObject.modelo)) {
            return { valido: false, mensaje: "El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos." };
        }

        // Valida el precio
        if (typeof jsonObject.precio !== 'number' || jsonObject.precio <= 99.99) {
            return { valido: false, mensaje: "El precio es requerido y debe ser mayor a 99.99." };
        }

        // Valida los detalles (opcional)
        if (jsonObject.detalles && (typeof jsonObject.detalles !== 'string' || jsonObject.detalles.length > 250)) {
            return { valido: false, mensaje: "Si se proporcionan, los detalles deben tener 250 caracteres o menos." };
        }

        // Valida las unidades
        if (typeof jsonObject.unidades !== 'number' || jsonObject.unidades < 0) {
            return { valido: false, mensaje: "Las unidades son requeridas y deben ser un número mayor o igual a 0." };
        }

        // Si todas las validaciones pasan, retorna un objeto válido
        return { valido: true, jsonObject };
    } catch (error) {
        return { valido: false, mensaje: "El JSON proporcionado no es válido." };
    }
}


// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;

    // SE VALIDA EL JSON
    var validacion = validarJson(productoJsonString);
    if (!validacion.valido) {
        // Muestra el mensaje de error en el div "mensajeRespuesta"
        const mensajeDiv = document.getElementById('mensajeRespuesta');
        mensajeDiv.textContent = validacion.mensaje;
        mensajeDiv.style.color = 'red'; // Color de texto rojo para error
        return; // Sale de la función si la validación falla
    }

    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);

            // Mostrar el mensaje de respuesta en el div "mensajeRespuesta"
            const mensajeDiv = document.getElementById('mensajeRespuesta');
            const response = JSON.parse(client.responseText);
            mensajeDiv.textContent = response.mensaje; //Muestra el mensaje de respuesta
            mensajeDiv.style.color = response.mensaje.includes('Error') ? 'red' : 'green'; //Cambia el color del texto
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}


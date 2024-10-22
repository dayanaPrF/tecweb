//EN ESTE ESTOY TRABAJANDO

// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

  let editar = false;

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    $('#product-result').hide(); //Ocultamos el cuadro de product-result siempre
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
    
    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
    agregarProducto();
    buscarProducto();
    eliminarProducto();
    editarProducto();
}

function listarProductos(){
    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response){
            //console.log(response);
            let products = JSON.parse(response);
            let template = '';
            products.forEach(product => {

                let descripcion = '';
                descripcion += '<li>precio: '+product.precio+'</li>';
                descripcion += '<li>unidades: '+product.unidades+'</li>';
                descripcion += '<li>modelo: '+product.modelo+'</li>';
                descripcion += '<li>marca: '+product.marca+'</li>';
                descripcion += '<li>detalles: '+product.detalles+'</li>';

                template += `<tr productId = "${product.id}">
                    <td>${product.id}</td>
                    <td>
                        <a href = "#" class = "product-item">${product.nombre}</a>
                    </td>
                    <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
            </tr>`
            });
            $('#products').html(template);
        }
    });
}

function buscarProducto(){
    //Obtenemos la informacion del input de la barra de tareas
    $('#product-result').hide;
    $('#search').keyup(function(e){
        if ($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'backend/product-search.php',
                type: 'GET',
                data: {search},
                success: function(response){
                    //console.log(response);
                    let products = JSON.parse(response);
                    let template = '';
                    products.forEach(product => {
                        template += `<li>
                            ${product.nombre}
                        </li>`
                    });
                    $('#container').html(template);
                    //$('#product-result').show;
                    //Solo mostrar el contenedor si hay resultados
                    if (template) {
                        $('#container').html(template);
                        $('#product-result').show();
                        //listarProductos();
                    } else {
                        $('#product-result').hide();
                    }

                    let productTableTemplate = '';
                    products.forEach(product => { 
                        let descripcion = '';
                        descripcion += '<li>precio: '+product.precio+'</li>';
                        descripcion += '<li>unidades: '+product.unidades+'</li>';
                        descripcion += '<li>modelo: '+product.modelo+'</li>';
                        descripcion += '<li>marca: '+product.marca+'</li>';
                        descripcion += '<li>detalles: '+product.detalles+'</li>';

                        productTableTemplate += `<tr productId="${product.id}">
                            <td>${product.id}</td>
                            <td><a href="#" class = product-item>${product.nombre}</a></td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>`;
                    });
                    $('#products').html(productTableTemplate);
                }
            });
        }
    });
}

function agregarProducto() {
    $('#product-form').submit(function(e) {
        e.preventDefault();
        const jsonData = $('#description').val();
        let productData;
        try {
            productData = JSON.parse(jsonData);
        } catch (error) {
            alert("Error: El JSON no está bien definido.");
            return;
        }
        // Validaciones
        const nombre = $('#name').val().trim();
        const precio = productData.precio;
        const unidades = productData.unidades;
        const modelo = productData.modelo;
        if (!nombre) {
            alert("Error: El nombre es obligatorio");
            return;
        }
        if (!modelo || /[^a-zA-Z0-9\- ]/.test(modelo)) {
            alert("Error: El modelo no puede contener caracteres especiales");
            return;
        }
        if (precio < 100) {
            alert("Error: El precio debe ser mayor o igual a 100");
            return;
        }
        if (unidades < 0) {
            alert("Error: Las unidades no pueden ser menores a 0");
            return;
        }
        if (!nombre || !modelo || !precio || !unidades || !productData.marca || !productData.detalles || !productData.imagen) {
            alert("Error: Todos los campos son obligatorios");
            return;
        }
        
        const postData = {
            id: $('#product-Id').val(),
            nombre: nombre,
            marca: productData.marca,
            modelo: modelo,
            precio: precio,
            unidades: unidades,
            detalles: productData.detalles,
            imagen: productData.imagen
        };
        const jsonPostData = JSON.stringify(postData);

        let url = editar === false ? 'backend/product-add.php' : 'backend/product-edit.php';

        console.log("Enviando a:", url);
        console.log("Datos a enviar:", jsonPostData);

        $.post(url, jsonPostData, function(response) {
            //console.log(response);
            //let result = JSON.parse(response);
            let result = typeof response === 'string' ? JSON.parse(response) : response;
            console.log("Respuesta del servidor:", response);
            if (result.status === "success") {
                alert("Registro exitoso");
                listarProductos();
                $('#product-form').trigger('reset');
                $('#description').val(JSON.stringify(baseJSON, null, 2));
                editar = false;
            } else {
                alert("Error al registrar el producto: " + result.message);
            }
        });
    });
}


function eliminarProducto() {
    $(document).on('click', '.product-delete', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        if (confirm(`¿Estás seguro de eliminar el producto con ID: ${id}?`)) {
            $.get('backend/product-delete.php', { id }, function(response) {
                let result = JSON.parse(response);
                if (result.status === "success") {
                    alert("Eliminado exitosamente");
                } else {
                    alert("Error al eliminar el producto: " + result.message);
                }
                listarProductos();
            });
        }
    });
}

function editarProducto(){
    $(document).on('click', '.product-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');

        $.post('backend/product-single.php', { id }, function(response) {
            console.log(response);
            const producto = JSON.parse(response);
            $('#name').val(producto.product.nombre);
            const descripcionJSON = JSON.stringify({
                precio: producto.product.precio,
                unidades: producto.product.unidades,
                modelo: producto.product.modelo,
                marca: producto.product.marca,
                detalles: producto.product.detalles,
                imagen: producto.product.imagen
            }, null, 2);
            $('#description').val(descripcionJSON);
            $('#product-Id').val(producto.product.id);
            editar = true;
        });
    });

}


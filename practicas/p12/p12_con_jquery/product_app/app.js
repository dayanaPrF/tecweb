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

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
    agregarProducto();
    //buscarProducto();
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

                template += `<tr>
                    <td>${product.id}</td>
                    <td>${product.nombre}</td>
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
                    console.log(template);
                    $('#container').html(template);
                    $('#product-result').show;
                }
            });
        }
    });
}

function agregarProducto(){
    $('#product-form').submit(function(e){
        e.preventDefault();
        //Obtener el JSON de la descripcion
        const jsonData = $('#description').val();
        const productData = JSON.parse(jsonData);
        productData.nombre = $('#name').val();
        const postData = {
            nombre: productData.nombre,
            marca: productData.marca,
            modelo: productData.modelo,
            precio: productData.precio,
            unidades: productData.unidades,
            detalles: productData.detalles,
            imagen: productData.imagen
        };
        const jsonPostData = JSON.stringify(postData);
        console.log(postData);
        $.post('backend/product-add.php', jsonPostData, function(response){
            listarProductos();
            $('#product-form').trigger('reset');
            $('#description').val(JSON.stringify(baseJSON, null, 2));
        });
    });
}

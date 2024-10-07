function show(event){
    var row = event.target.closest('tr'); 
    //var rowId = row.id; 
    var data = row.querySelectorAll("td");
    //var rowId = event.target.parentNode.parentNode.id;
    //var data = document.getElementById(rowId).querySelectorAll("td");
    var nombre = data[0].innerHTML;
    var marca = data[1].innerHTML;
    var modelo = data[2].innerHTML;
    var precio = data[3].innerHTML;
    var unidades = data[4].innerHTML;
    var detalles = data[5].innerHTML;
    var imagen = data[6].innerHTML;
    send2form(nombre, marca, modelo, precio, unidades, detalles, imagen);
}

function send2form(nombre, marca, modelo, precio, unidades, detalles,imagen) {
    var form = document.createElement("form");
    addA(form, 'text', 'nombre', nombre);
    addA(form, 'text', 'marca', marca);
    addA(form, 'text', 'modelo', modelo);
    addA(form, 'number', 'precio', precio);
    addA(form, 'text', 'detalles', detalles);
    addA(form, 'number', 'unidades', unidades);
    var ruta = imagen.match(/src="([^"]+)"/);
    addA(form, 'text', 'imagen', ruta[1]);
    console.log(form);
    form.method = 'POST';
    form.action = 'http://localhost/tecweb/practicas/p10/formulario_productos_v2.php';  

    document.body.appendChild(form);
    form.submit();
}

function addA(form, tipo, nombre, valor) {
    var ValorIn = document.createElement("input");
    ValorIn.type = tipo;
    ValorIn.name = nombre;
    ValorIn.value = valor; 
    form.appendChild(ValorIn);
}
function validarNombre(){
    var nombre = document.getElementById("form-nombre").value;
    var error = document.getElementById("error-nombre");
    if (nombre.length > 100) {
        error.textContent = "El nombre es demasiado largo";
    } else if (nombre.trim() === "") {
        error.textContent = "Inserte un nombre"; 
    } else {
        error.textContent = ""; 
    }
}

function validarMarca(){
    var marca = document.getElementById("form-marca").value;
    var error = document.getElementById("error-marca");
    error.textContent = "";
    if (marca === "") {
        error.textContent = "Selecciona una marca";
    }
}

function validarModelo(){
    var modelo = document.getElementById("form-modelo").value;
    var error = document.getElementById("error-modelo");
    error.textContent = "";
    var alfanumerico = /^[a-zA-Z0-9]+$/;
    if (modelo.length === 0) {
        error.textContent = "El modelo es requerido";
    } else if (modelo.length > 25) {
        error.textContent = "El modelo debe tener 25 caracteres o menos";
    } else if (!alfanumerico.test(modelo)) {
        error.textContent = "El modelo debe ser alfanumérico";
    }
}

function validarPrecio() {
    var precio = document.getElementById("form-precio").value;
    var error = document.getElementById("error-precio");
    error.textContent = "";
    if (precio.trim() === "") {
        error.textContent = "El precio es requerido";
    } else {
        precio = parseFloat(precio);
        if (precio > 99.99) {
        } else {
            error.textContent = "El precio debe de ser mayor a 99.99.";
        }
    }
}

function validarUnidades() {
    var unidades = document.getElementById("form-unidades").value;
    var error = document.getElementById("error-unidades");
    error.textContent = "";
    if (unidades.trim() === "") {
        error.textContent = "Las unidades son requeridas";
    } else {
        unidades = parseInt(unidades, 10);
        if (unidades >= 0) {
        } else {
            error.textContent = "Las unidades deben ser mayor o igual a 0"; 
        }
    }
}


function validarDetalles() {
    var detalles = document.getElementById("form-detalles").value;
    var error = document.getElementById("error-detalles");
    error.textContent = "";
    if (detalles.length > 250) {
        error.textContent = "Los detalles deben tener 250 caracteres o menos";
    }
}

function validarImagen(){
    var inputImagen = document.getElementById("form-imagen");
    var formData = new FormData(document.getElementById("formularioProducto"));
    if (!(inputImagen.files.length === 0)) {
        var file = inputImagen.files[0];
        formData.append("imagen", file);
    }
}





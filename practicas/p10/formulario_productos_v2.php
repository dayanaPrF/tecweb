<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Registro de Producto</title>
    <script src = "validaciones.js"></script>
    <style type="text/css">
        ol, ul {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <h1>Registro de Producto</h1>

    <form id="formularioProducto" action="http://localhost/tecweb/practicas/p10/update_producto.php" method="post" enctype="multipart/form-data">
        <h2>Información del Producto</h2>

        <fieldset>
            <legend>Detalles del Producto</legend>

            <ul>
                <!--NOMBRE-->
                <li>
                    <label for="form-nombre">Nombre:</label> 
                    <input type="text" name="nombre" id="form-nombre" oninput="validarNombre()" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>" required>
                    <div id="error-nombre" style="font-weight: bold;"></div>
                </li>

                <!--MARCA-->
                <li>
                    <label for="form-marca">Marca:</label>
                    <select name="marca" id="form-marca" onchange="validarMarca()" required>
                        <option value="">Selecciona una marca</option>
                        <option value="Funko Pop" value="<?(isset($_POST['marca']) && $_POST['marca']==='Funko Pop')?'selected':''?>">Funko Pop!</option>
                        <option value="Hasbro" value="<?(isset($_POST['marca']) && $_POST['marca']==='Hasbro')?'selected':''?>">Hasbro</option>
                        <option value="Nendoroid" value="<?(isset($_POST['marca']) && $_POST['marca']==='Nendoroid')?'selected':''?>">Nendoroid</option>
                        <option value="Bandai" value="<?(isset($_POST['marca']) && $_POST['marca']==='Bandai')?'selected':''?>">Bandai</option>
                        <option value="Nintendo" value="<?(isset($_POST['marca']) && $_POST['marca']==='Nintendo')?'selected':''?>">Nintendo</option>
                        <option value="Kotobukiya" value="<?(isset($_POST['marca']) && $_POST['marca']==='Kotobukiya')?'selected':''?>">Kotobukiya</option>
                        <option value="Disney Store" value="<?(isset($_POST['marca']) && $_POST['marca']==='Disney Store')?'selected':''?>">Disney Store</option>
                        <option value="Sanrio" value="<?(isset($_POST['marca']) && $_POST['marca']==='Sanrio')?'selected':''?>">Sanrio</option>
                        <option value="Aniplex" value="<?(isset($_POST['marca']) && $_POST['marca']==='Aniplex')?'selected':''?>">Aniplex+</option>
                        <option value="Aurora World" value="<?(isset($_POST['marca']) && $_POST['marca']==='Aurora World')?'selected':''?>">Aurora World</option>
                        <option value="The Amazing Digital Circus" value="<?(isset($_POST['marca']) && $_POST['marca']==='The Amazing Digital Circus')?'selected':''?>">The Amazing Digital Circus</option>
                        <option value="Lego" value="<?(isset($_POST['marca']) && $_POST['marca']==='Lego')?'selected':''?>">Lego</option>
                        <option value="Banpresto" value="<?(isset($_POST['marca']) && $_POST['marca']==='Banpresto')?'selected':''?>">Banpresto</option>
                        <option value="Max Factory " value="<?(isset($_POST['marca']) && $_POST['marca']==='Max Factory ')?'selected':''?>">Max Factory </option>
                    </select>
                    <div id="error-marca" style="font-weight: bold;"></div>
                </li>

                <!--MODELO-->
                <li>
                    <label for="form-modelo">Modelo:</label> 
                    <input type="text" name="modelo" id="form-modelo" oninput="validarModelo()" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>" required>
                    <div id="error-modelo" style="font-weight: bold;"></div>
                </li>

                <!--PRECIO-->
                <li>
                    <label for="form-precio">Precio:</label> 
                    <input type="number" name="precio" id="form-precio" step="0.01" oninput="validarPrecio()" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>" require>
                    <div id="error-precio" style="font-weight: bold;"></div>
                </li>

                <!--UNIDADES-->
                <li>
                    <label for="form-unidades">Unidades:</label> 
                    <input type="number" name="unidades" id="form-unidades" oninput="validarUnidades()" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>" require>
                    <div id="error-unidades" style="font-weight: bold;"></div>
                </li>

                <!--DETALLES-->
                <li>
                    <label for="form-detalles">Detalles:</label><br>
                    <textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="Escribe detalles del producto..." oninput="validarDetalles()"> <?= !empty($_POST['detalles'])? htmlspecialchars($_POST['detalles']):''?>  </textarea>
                    <div id="error-detalles" style="font-weight: bold;"></div>
                </li>

                <!--IMAGEN-->
                <li>
                    <label for="form-imagen">Imagen:</label> 
                    <input type="file" name="imagen" id="form-imagen" accept="image/*" onchange="validarImagen()"> 
                   
                </li>
            </ul>
        </fieldset>

        <p>
            <input type="submit" value="Registrar Producto">
            <input type="reset" value="Limpiar">
        </p>
    </form>
</body>
</html>

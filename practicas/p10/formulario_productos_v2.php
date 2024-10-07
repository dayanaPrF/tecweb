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
                        <option value="Maybelline" value="<?(isset($_POST['marca']) && $_POST['marca']==='Maybelline')?'selected':''?>">Maybelline</option>
                        <option value="LOreal" value="<?(isset($_POST['marca']) && $_POST['marca']==='LOreal')?'selected':''?>">L'Oreal</option>
                        <option value="MAC" value="<?(isset($_POST['marca']) && $_POST['marca']==='MAC')?'selected':''?>">MAC</option>
                        <option value="NARS" value="<?(isset($_POST['marca']) && $_POST['marca']==='NARS')?'selected':''?>">NARS</option>
                        <option value="Revlon" value="<?(isset($_POST['marca']) && $_POST['marca']==='Revlon')?'selected':''?>">Revlon</option>
                        <option value="Clinique" value="<?(isset($_POST['marca']) && $_POST['marca']==='Clinique')?'selected':''?>">Clinique</option>
                        <option value="Estée Lauder" value="<?(isset($_POST['marca']) && $_POST['marca']==='Estée Lauder')?'selected':''?>">Estée Lauder</option>
                        <option value="Urban Decay" value="<?(isset($_POST['marca']) && $_POST['marca']==='Urban Decay')?'selected':''?>">Urban Decay</option>
                        <option value="Benefit" value="<?(isset($_POST['marca']) && $_POST['marca']==='Benefit')?'selected':''?>">Benefit</option>
                        <option value="Sephora Collection" value="<?(isset($_POST['marca']) && $_POST['marca']==='Sephora Collection')?'selected':''?>">Sephora Collection</option>
                        <option value="Fenty Beauty" value="<?(isset($_POST['marca']) && $_POST['marca']==='Fenty Beauty')?'selected':''?>">Fenty Beauty</option>
                        <option value="Too Faced" value="<?(isset($_POST['marca']) && $_POST['marca']==='Too Faced')?'selected':''?>">Too Faced</option>
                        <option value="Anastasia Beverly Hills" value="<?(isset($_POST['marca']) && $_POST['marca']==='Anastasia Beverly Hills')?'selected':''?>">Anastasia Beverly Hills</option>
                        <option value="Kylie Cosmetics" value="<?(isset($_POST['marca']) && $_POST['marca']==='Kylie Cosmetics')?'selected':''?>">Kylie Cosmetics</option>
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

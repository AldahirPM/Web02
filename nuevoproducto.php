<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<body>
<br>
<br>
<form action="nuevo-producto.php" method="POST"> 
    <div class="container center">
    <h1>Ingresa un nuevo producto:</h1>
        <div class="form-group">
            <label for="producto">Nombre de Producto</label>
            <input type="text" class="form-control" name="producto"  placeholder="ejm.sublime">    
        </div>
        <label for="precio">Precio:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">S/</span>
            </div>
            <input type="text" class="form-control"  name="precio"  placeholder=""> 
        </div>
        <div class="combo">
        <label for="categoria">Categoria:</label>
        <select class="form-control form-control-sm" id="" name="categoria"> 
            <?php 
                $categorias =  conseguirCategorias($con);
                while($categoria = mysqli_fetch_assoc($categorias)):
                    $mostrar= $categoria;
            ?>  
                <option value="<?=$mostrar['id_categoria']?>"><?=$mostrar['nomcat']?></option>
            <?php endwhile;?>
        </select>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
</form>
</body>
    

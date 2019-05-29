<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<body>
<?php   $mostrar= mostrarProducto($con , $_GET['id']);        
?>
<br>
<br>
<form action="editar-producto.php?id=<?=$mostrar['id']?>" method="POST">
    <div class="container center">
    <?php if(isset($_SESSION['completado'])):?>
                        
         <div class="alert alert-primary"> 
                            <?=  $_SESSION['completado'];?>   
                        </div>
                        <?php elseif(isset($_SESSION['errores']['general'])):?>
                            <div class="alert alert-danger"> 
                                <?=  $_SESSION['errores']['general'];?>   
                            </div>
                        <?php endif;?>
        
        <h1>Edita tu Producto </h1>
            <div class="">
                <label for="producto">Nombre de Producto</label>
                <input type="text" class="form-control" name="producto"  value="<?=$mostrar['nombre']?>">  
            </div>
            <?php // TENEMOS UN PROBLEMA CON = echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : ''?>
            <div>
                <label for="precio">Precio:</label>
                    <div class="input-group mb-3" >
                        <div class="input-group-prepend">
                            <span class="input-group-text">S/</span>
                        </div>
                        <input type="text" class="form-control"  name="precio"  value="<?=$mostrar['precio']?>" ?>
                    </div>

            </div> 
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'precio') : ''?>

            <div>
                <label for="categoria">Categoria:</label>
                <select name="categoria" id=""  class="form-control form-control-sm">
                    <?php
                        $categorias = conseguirCategorias($con);
                        while($categoria = mysqli_fetch_assoc($categorias)):
                            $mostrar = $categoria;
                    ?>
                    <option value="<?=$mostrar['id_categoria'] ?>"><?=$mostrar['nomcat'] ?></option>
                    <?php  endwhile;?>
                </select>
            </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</form>
<?php borrarMensaje(); ?>
</body>
    

<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<body>
<br>
<br> 
<?php if(isset($_GET['idcli'])):?>
    <form action="nuevo-producto.php?idcliente=<?=$_GET['idcli']?>" method="POST"> 
<?php else: ?>      
    <form action="nuevo-producto.php" method="POST"> 
<?php endif;?>           
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
        <h1>Ingresa un nuevo producto:</h1>
            <div class="form-group">
                <label for="producto">Nombre de Producto</label>
                <input type="text" class="form-control" name="producto"  placeholder="ejm.sublime">   
            </div>
                <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'nombre'):'';?>    
            <label for="precio">Precio:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">S/</span>
                </div>
                <input type="text" class="form-control"  name="precio"  placeholder=""> 
            </div>    
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'precio'): '';?>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="text" class="form-control" name="cantidad" >   
            </div>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'cantidad') : '';?>
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
    <?php borrarMensaje();?>
    </body>


    
  
    

  
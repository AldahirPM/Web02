<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<br>
<form action="registra-cliente.php" method="POST">
    <div class="container">
    <h1>Se nuestro socio:</h1>
        
        <?php if(isset($_SESSION['completado'])):?> 
            <div class="alert alert-primary"> 
                <?=  $_SESSION['completado'];?>   
            </div>
        <?php elseif(isset($_SESSION['usuexiste'])):?> 
            <div class="alert alert-warning"> 
                <?=  $_SESSION['usuexiste'];?>   
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])):?>
            <div class="alert alert-danger"> 
                <?=  $_SESSION['errores']['general'];?>   
            </div>
        <?php endif;?> 
        


        <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="nombre" >
        </div>
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') :''?>

        <div class="form-group">
            <label for="">DNI:</label>
            <input type="text" class="form-control" name="dni" >
        </div>
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'dni') :''?>

        <div class="form-group">
            <label for="">Telefono:</label>
            <input type="text" class="form-control" name="telefono" >
        </div>
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'telefono') :''?>

        <input type="submit" class="btn btn-primary" value="Registrar" >
        <a href="datoscompra.php" class="btn btn-warning">Salir</a>

    </div>
<?php  borrarMensaje();?>
</form>

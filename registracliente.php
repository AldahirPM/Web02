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
        <?php elseif(isset($_SESSION['errores']['general'])):?>
            <div class="alert alert-danger"> 
                <?=  $_SESSION['errores']['general'];?>   
            </div>
        <?php endif;?> 


        <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="nombre" >
        </div>
        <div class="form-group">
            <label for="">DNI:</label>
            <input type="text" class="form-control" name="dni" >
        </div>
        <div class="form-group">
            <label for="">Telefono:</label>
            <input type="text" class="form-control" name="telefono" >
        </div>
        <input type="submit" class="btn btn-primary" value="Registrar" >
        <a href="datoscompra.php" class="btn btn-warning">Salir</a>

    </div>
<?php  borrarMensaje();?>
</form>

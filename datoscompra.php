<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<form action="datos-compra.php" method="post">
<div  class="container">     
    <div class="form-group">
        <br>
        <?php if(isset($_SESSION['completado'])):?>
                        
            <div class="alert alert-primary"> 
                <?=  $_SESSION['completado'];?>   
            </div>
            <?php elseif(isset($_SESSION['errores']['general'])):?>
                <div class="alert alert-danger"> 
                    <?=  $_SESSION['errores']['general'];?>   
                </div>
            <?php endif;?>
            
        <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'dni'): '';?>    
        
        <h1>Realiza tu compra:</h1>

        <label for="dni">DNI:</label>
        <input type="text" class="form-control" name ="dni" placeholder= "74586***">
        <br>
        

        <input type="submit" class="btn btn-success" value="Cliente"> 
        
        <a href="index.php?dato=pee4o" class="btn btn-danger">Sin datos</a>
        <a href="registracliente.php" class="btn btn-primary">Registrar Cliente</a>
    </div>
</div>
</form>
<?php borrarMensaje();?>





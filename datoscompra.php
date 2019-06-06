<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>

<form action="datos-compra.php" method="post">
<div  class="container">     
    <div class="form-group">
        <br>
        <h1>Realiza tu compra:</h1>

        <label for="dni">DNI:</label>
        <input type="text" class="form-control" name ="dni" placeholder= "74586***">
        <br>
        <input type="submit" class="btn btn-success" value="Cliente"> 
        <a href="#" class="btn btn-danger">Sin datos</a>
        <a href="#" class="btn btn-primary">Registrar Cliente</a>
    </div>
</div>
</form>





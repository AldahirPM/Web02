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
    </div>
    <div>
        <tr>
            <td><a href="index.php" class="btn btn-success">Cliente</a></td>
            <td><a href="#" class="btn btn-danger">Sin datos</a></td>  
            <td><a href="#" class="btn btn-primary">Registrar Cliente</a></td>
        </tr>
    </div>
</div>
</form>





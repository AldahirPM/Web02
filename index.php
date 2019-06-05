<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<?php $productos =  mostrarProductos($con) ?>
<?php $total =  sumarProductos($con); ?>
<br>
<div class="container">
    <h1>Tus Produtos:</h1>
    <div class="form-row">
        <div class="col">
            <label for=""><strong>Nombre: Pedro Aldahir Gayoso Machaca</strong></label>
            <br>
            <label for=""><strong>DNI: 701768858</strong></label>
            <br>
            <a href="nuevoproducto.php" class="btn btn-primary">Agregar +</a>
        </div>
        <div class="col">
            <label for=""><strong>Telefono: +51 5411477</strong></label>
            <br>
            <label for=""><strong>Registrado el: 1999-57-96</strong></label>
        </div>
    </div>
    <br>
    <table class="table custab" >
        <thead class=" text-center">
            <tr>   
                <th>ID</th>
                <th>Nombre Producto</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class=" text-center">
            <?php
            if($productos && mysqli_num_rows($productos)>=1):
            while($producto = mysqli_fetch_assoc($productos)):?>
            <?php  $_SESSION['producto'] = $producto  ?>
            <tr>
                <td><?= $_SESSION['producto']['id'] ?></td>
                <td><?= $_SESSION['producto']['nombre'] ?></td>
                <td><?= $_SESSION['producto']['nomcat']?></td>
                <td>S/<?=$_SESSION['producto']['precio']?></td>
                <td class="text-center a">
                    <a href="editarproducto.php?id=<?=$_SESSION['producto']['id']?>" class="btn btn-success"  >E</a>
                    <a href="eliminarproducto.php?id=<?=$_SESSION['producto']['id']?>" class="btn btn-danger">X</a>
                </td>
            </tr>
            <?php endwhile;?>
            <?php else:?>
                <tr>
                    <td>#</td>
                    <td>No</td>
                    <td>realizo </td>
                    <td>compra</td>
                    <td>#</td>
                </tr>           
            <?php endif; ?>
            <tr>
                <td></td>
                <td></td>
                <td><strong>TOTAL</strong></td>
                <?php  while($totalproducto = mysqli_fetch_assoc($total)):?>
                <td><strong>S/<?= round(($totalproducto['total']),2)?></strong></td>
                <td><a href="datoscompra.php" class="btn btn-secondary">Facturar</a></td>
                <?php endwhile;?>
            </tr>
        </tbody>
    </table>
</div> 

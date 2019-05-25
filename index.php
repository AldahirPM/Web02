<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<?php $productos =  mostrarProductos($con) ?>
<?php $total =  sumarProductos($con); ?>         
<div class="container">
    <br>
        <a href="nuevoproducto.php" class="btn btn-primary">Agregar +</a>
    <br>
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
            <?php  while($producto = mysqli_fetch_assoc($productos)):?>
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <?php  while($totalproducto = mysqli_fetch_assoc($total)):?>
                <td><strong>S/<?= round(($totalproducto['total']),2)?></strong></td>
                <td><strong>TOTAL</strong></td>
                <?php endwhile;?>
            </tr>
        </tbody>
    </table>
</div> 
<?php require_once 'includes/footer.php'  ?>
<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>

<?php $productos =  mostrarProductos($con) ?>
            
<div class="container">
    <br>
        <button type="button" class="btn btn-primary"><a href="index.php" class="a">Agregar +</a></button>
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
                    <a href="index.php?id=<?=$_SESSION['producto']['id']?>" class="btn btn-success"  >E</a>
                    <a href="index.php" class="btn btn-danger">X</a>
                </td>
            </tr>
            <?php endwhile;?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>S/300</strong></td>
                <td><strong>TOTAL</strong></td>
            </tr>
        </tbody>
    </table>
    <?php print_r($_GET)?>

</div>

<?php require_once 'asdasda' ?>
<div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h2>Edita tu producto</h2>
                </div>    
                <div class="modal-body">
                    <label for="">Nombre Producto:</label>
                    <input type="text" class="form-control" placeholder="<?= $_SESSION['producto']['nombre'] ?>">
                    <br>
                    <label for="">Categoria:</label>
                    <input type="text" class="form-control">
                    <br>
                    <label for="">Precio:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>q
<?php require_once 'includes/footer.php'  ?>
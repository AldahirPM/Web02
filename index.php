<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>
<?php 

if(isset($_GET['id'])){
$usuario = mostrarUsuario($con,$_GET['id']) ;
$total =  sumarProductos($con , $_GET['id']);
$productos =  mostrarProductos($con,$_GET['id']);
$usu= $_GET['id'];
}else{

 $usuario = false;
 $total =  sumarProductos($con , false, true);
 $productos =  mostrarProductos($con, false , true);
 $usu = false ;
}


?>

<br>
<div class="container">
<h1>Tus Produtos:</h1>
   

    <div class="form-row">
        <div class="col">
            <label for=""><strong>Nombre:   <?php echo isset($usuario['nom']) ? $usuario['nom'] : '-'?> </strong></label>
            <br>
            <label for=""><strong>DNI: <?php echo isset($usuario['dni']) ? $usuario['dni'] : '-'?></strong></label>
            <br>

           <?php if(!isset($_GET['id'])): ?>
                <a href="nuevoproducto.php" class="btn btn-primary">Agregar +</a>
            <?php else: ?>
                <a href="nuevoproducto.php?idcli=<?=$usu?>" class="btn btn-primary">Agregar +</a>
            <?php endif;?> 
        
        </div>
        <div class="col">
            <label for=""><strong>Telefono: <?php echo isset($usuario['telefono']) ? $usuario['telefono'] : '-'?></strong></label>
            <br>
            <label for=""><strong>Fecha de inscripcion:  <?php echo isset($usuario['fecha']) ? $usuario['fecha'] : '-'?></strong></label>
        </div>
    </div>
    
    <br>
    <table class="table custab" >
        <thead class=" text-center">
            <tr>   
                <th>ID</th>
                <th>Nombre Producto</th>
                <th>Categoria</th>
                <th>Cantidad</th>
                <th>Precio.U</th>
                <th>Precio.T</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class=" text-center">
            <?php
            if($productos && mysqli_num_rows($productos)>=1):
            while($producto = mysqli_fetch_assoc($productos)):?>
            <?php  $product = $producto  ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['nombre'] ?></td>
                <td><?= $product['nomcat']?></td>
                <td><?=$product['cant_pro']?></td>
                <td>S/<?=$product['precio']?></td>
                <td>S/<?=$product['Total']?></td>
                <td class="text-center a">
                    <a href="editarproducto.php?&idpro=<?=$producto['id']?>" class="btn btn-success"  >E</a>
                    <?php if(!isset($_GET['id'])): ?>
                    
                        <a href="eliminarproducto.php?idpro=<?=$producto['id']?>" class="btn btn-danger">X</a>
                    <?php else: ?>
                       <a href="eliminarproducto.php?idpro=<?=$producto['id']?>&idcli=<?=$usu?>" class="btn btn-danger">X</a>
                    <?php endif;?>
                    
                   
                </td>
            </tr>
            <?php endwhile;?>
            <?php else:?>
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>NO </td>
                    <td>REALIZO</td>
                    <td>Compra</td>
                    <td>#</td>
                    <td>#</td>
                </tr>           
            <?php endif; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>TOTAL</strong></td>
                <?php  while($totalproducto = mysqli_fetch_assoc($total)):?>    
                    <?php if(empty($totalproducto['Total'])):?>
                            <td><strong>S/<?= round(($totalproducto['Total']),2)?></strong></td>
                            <td>-</td>
                    <?php else: ?>
                        <td><strong>S/<?= ($totalproducto['Total'])?></strong></td>
                        <td><a href="datoscompra.php" class="btn btn-secondary">Facturar</a></td>
                    <?php endif; ?>
                <?php endwhile;?>
            </tr>
        </tbody>
    </table>
</div> 

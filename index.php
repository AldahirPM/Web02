<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>

<div class="container " >
    <br>
    <button type="button" class="btn btn-primary"><a href="index.php" class="a">Agregar +</a></button>
    <br>
    <br>
    <table class="table custab" >
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre Producto</th>
            <th class="text-center">Categoria</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td class="text-center">001</td>
            <td class="text-center">Jabon</td>
            <td class="text-center">Belleza</td>
            <td class="text-center">3.00</td>
            <td lass="text-center">
                <button type="button" class="btn btn-success"><a href="index.php" class="a">Editar</a></button>
                <button type="button" class="btn btn-warning"><a href="index.php" class="a">Eliminar</a></button>
            </td>
        </tr>
        <tr>
            <td class="text-center">001</td>
            <td class="text-center">Jabon</td>
            <td class="text-center">Belleza</td>
            <td class="text-center">3.00</td>
            <td>
                <button type="button" class="btn btn-success"><a href="index.php" class="a">Editar</a></button>
                <button type="button" class="btn btn-warning"><a href="index.php" class="a">Eliminar</a></button>
            </td>
        </tr>
        <tr>
            <td class="text-center">001</td>
            <td class="text-center">Jabon</td>
            <td class="text-center">Belleza</td>
            <td class="text-center">3.00</td>
            <td>
                <button type="button" class="btn btn-success"><a href="index.php" class="a">Editar</a></button>
                <button type="button" class="btn btn-warning"><a href="index.php" class="a">Eliminar</a></button>
            </td>
        </tr>
        <tr>
            <td class="text-center">001</td>
            <td class="text-center">Jabon</td>
            <td class="text-center">Belleza</td>
            <td class="text-center">3.00</td>
            <td>
                <button type="button" class="btn btn-success"><a href="index.php" class="a">Editar</a></button>
                <button type="button" class="btn btn-warning"><a href="index.php" class="a">Eliminar</a></button>
            </td>
        </tr>
    </tbody>
    </table>
</div>



<?php require_once 'includes/footer.php'  ?>
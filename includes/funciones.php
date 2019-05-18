<?php 

function mostrarProductos($con){
    $sql= "select p.id, p.nombre, p.precio, c.nomcat from producto p inner join categoria c on c.id_categoria = p.id_cat";
    $producto=mysqli_query($con , $sql);
    $resultado = array();
    if($producto && mysqli_num_rows($producto) >=1){
        $resultado = $producto;   
    }
    return $resultado;
}

?>
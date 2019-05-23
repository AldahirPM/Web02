<?php 

function mostrarProductos($con , $id  = null ){
    $sql= "select p.id, p.nombre, p.precio, c.nomcat from producto p inner join categoria c on c.id_categoria = p.id_cat group by id ";
    $producto=mysqli_query($con , $sql);

    $resultado = array();
    if($producto && mysqli_num_rows($producto) >=1){
        $resultado = $producto;   
      
    }
    return $resultado;
}
function sumarProductos($con){
    $sql= "select sum(precio) as total from producto";
    $producto=mysqli_query($con , $sql);
    $resultado = $producto;
    return $resultado;
}


?>
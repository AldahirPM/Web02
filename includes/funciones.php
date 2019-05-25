<?php 

function mostrarErrore($errores , $campo)
{
    $alerta= '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta ="<div class='alert alert-danger' role='alert'> A simple danger alert—check it out! </div>" ;
    }
    return $alerta;
}
function mostrarProductos($con ){
    $sql= "select p.id, p.nombre, p.precio, c.nomcat from producto p inner join categoria c on c.id_categoria = p.id_cat   order by id ";
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
function conseguirCategorias($con){
    $sql= "select  * from categoria  order by  id_categoria   asc" ;
    $producto=mysqli_query($con , $sql);
    $resultado =  array();
    if($producto && mysqli_num_rows($producto) >=1 ){
        $resultado = $producto;
    }
    return $resultado;
}
function mostrarProducto($con , $id){
    $sql= "select *  from  producto where id  = $id";
    $producto=mysqli_query($con , $sql);
    $resultado = array();
    if($producto && mysqli_num_rows($producto)){
        $resultado = mysqli_fetch_assoc($producto) ;   
      
    }
    return $resultado;
}


?>
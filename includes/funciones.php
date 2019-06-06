<?php  
function mostrarError($error, $campo)
{
    $alerta= '';
    if(isset($error[$campo]) && !empty($campo)){
        $alerta ="<div class='alert alert-danger' role='alert'>".$error[$campo].'</div>';
    }
    return $alerta;
}
function borrarMensaje(){
    $borrar=false;
    $_SESSION['completado']=null;
   
      if(isset($_SESSION['errores']))
      {
        $_SESSION['errores'] = null;
         $borrar = true;
      }
      /*if(isset($_SESSION['errores_entrada']))
      {
        $_SESSION['errores_entrada'] = null;
        $borrar = true;
      }*/
  
      if(isset($_SESSION['errores']))
      {
        $_SESSION['completado'] = null;
        $borrar = true;
      }
   // $borrar = session_unset($_SESSION['errores']);
    
    return $borrar;
  }
function mostrarProductos($con ){
    $sql= "select  p.id , p.nombre , c.nomcat  ,p.cant_pro, p.precio , (p.precio * p.cant_pro)as Total  from producto p  inner join  categoria c  on c.id_categoria =  p.id_cat inner join usuario u on u.id_u = p.id_usu order by id ";
    $producto=mysqli_query($con , $sql);

    $resultado = array();
    if($producto && mysqli_num_rows($producto) >=1){
        $resultado = $producto;   
      
    }
    return $resultado;
}
function sumarProductos($con){
    $sql= "select sum(precio * cant_pro)  as Total FROM producto";
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
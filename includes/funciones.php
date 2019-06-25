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
    $_SESSION['usuexiste']=null;
   
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
function mostrarProductos($con , $id = null , $sincod= null){
    $sql= "select  id , nombre ,  precio  , cant_pro,id_cat,id_usu , round((precio * cant_pro),2) as Total  from insert_producto  ";
   // $sql= "select  p.id , p.nombre , c.nomcat  ,p.cant_pro, p.precio , p.id_usu , round((p.precio * p.cant_pro),2)as Total  from producto p  inner join  categoria c  on c.id_categoria =  p.id_cat ";
    if(!empty($sincod)){
        $sql.="where id_usu  is null";
    }
    if(!empty($id)){
        $sql.="where id_usu = $id";
    }
    $sql.=" order by id";
    $producto=mysqli_query($con , $sql);
    $resultado = array();
    if($producto && mysqli_num_rows($producto) >=1){
        $resultado = $producto;   
      
    }
    return $resultado;
}
function sumarProductos($con, $id = null  ,$sincod= null ){
    $sql= "select round(sum(precio * cant_pro),2)  as Total FROM insert_producto ";
    if(!empty($sincod)){
        $sql.="where id_usu  is null";
    }
    if(!empty($id)){
        $sql.="where id_usu = $id";
    }
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
    $sql= "select *  from  producto where id = $id";
    $producto=mysqli_query($con , $sql);
    $resultado = array();
    if($producto && mysqli_num_rows($producto)){
        $resultado = mysqli_fetch_assoc($producto) ;   
      
    }
    return $resultado;
}
//mostrar usuario DNI
function mostrarUsuario($con , $id){
    $sql= "select *  from  usuario where id_u = $id";
    $producto=mysqli_query($con , $sql);
    $resultado = array();
    if($producto && mysqli_num_rows($producto)){
        $resultado = mysqli_fetch_assoc($producto) ;   
      
    }
    return $resultado;
}


?>
<?php 
 require_once 'includes/conexion.php';
if(isset($_POST)){
    $nombre = isset($_POST['producto']) ? $_POST['producto'] : false;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
    $categoria =isset($_POST['categoria']) ? (int)($_POST['categoria']):false;

    if(!empty($nombre)  && !is_numeric($nombre) &&  !preg_match("/[0-9]/", $nombre )){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $error['nombre']= "Porfavor escroba el nombre del producto.";
    }
    
    if(!empty($precio)  && is_numeric($precio) &&  preg_match("/[0-9]/", $precio )){
        $precio_validado = true;
    }else{
        $precio_validado = false;
        $error['precio']= "Por favor indique el precio.";
    }
    
    if(count($errores) == 0)
    {

    }        
    $sql = "insert into producto values(null, '$nombre',$precio , $categoria)";
    $consulta =mysqli_query($con , $sql);
}
header("Location: index.php")
?>
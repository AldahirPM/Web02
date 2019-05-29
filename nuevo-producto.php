<?php 
 require_once 'includes/conexion.php';
if(isset($_POST)){
    
    $nombre = isset($_POST['producto']) ? $_POST['producto'] : false;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
    $categoria =isset($_POST['categoria']) ? (int)($_POST['categoria']):false;

    $error= array();
    if(!empty($nombre)  && !is_numeric($nombre) &&  !preg_match("/[0-9]/", $nombre )){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $error['nombre']= "Porfavor escriba el nombre del producto.";
    }
    
    if(!empty($precio)  && is_numeric($precio) &&  preg_match("/[0-9]/", $precio )){
        $precio_validado = true;
    }else{
        $precio_validado = false;
        $error['precio']= "Por favor indique el precio.";
    }
    
    $guardar_datos =  false;
    if(count($error) == 0)
    {
        $guardar_datos =  true;

        $sql = "insert into producto values(null, '$nombre',$precio , $categoria)";
        $consulta =mysqli_query($con , $sql); 
        
        if($consulta){-
            $_SESSION['completado'] ="¡Su producto se  guardo con exito!, puedes ver tu producto en ".'<a href="index.php">CRUD-PEDRO</a>';
        
        }
        else{
            $_SESSION['errores']['general'] = "Fallo en la insercion  del producto";
        }
        
    }else{

        $_SESSION['errores'] = $error;
    }
} 
header("location:nuevoproducto.php");
 
?>

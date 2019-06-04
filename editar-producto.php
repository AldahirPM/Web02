<?php
if(isset($_GET)){
    require_once 'includes/conexion.php';
    $id = ($_GET['id']) ?  $_GET['id']: false;
    $nombre =  isset($_POST['producto']) ? $_POST['producto']: false;
    $precio =  isset($_POST['precio']) ? $_POST['precio']: false;
    $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;

    $error = array();
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)){

        $nombre_validado= true;
    }else{ 
        $nombre_validado = false ;
        $error['nombre']= "Por favor ingrese el nombre del producto";
    }
    if(!empty($precio) && is_numeric($precio) ){
        $precio_validado= true;
    }
    else{
        $precio=0;
        $precio_validado = false;
        $error['precio'] = "Por favor ingrese el precio del producto ";
    }
    $guardar_producto = false;

    if(count($error) == 0){
        $guardar_producto= true ;

        $sql = "update producto set  nombre = '$nombre'  , precio =  $precio , id_cat = $categoria where id = $id";
        $consulta = mysqli_query($con , $sql);
        if($consulta){

            $_SESSION['completado'] = "¡Su producto se  guardo con exito!, puedes ver tu producto en ".'<a href="index.php">CRUD-PEDRO</a>';
        }else{
            $_SESSION['errores']['general'] = "Fallo en la insercion del producto ";
        }


    }else{

        $_SESSION['errores']= $error;
    }
} 
header("Location: editarproducto.php?id=$id");

?>
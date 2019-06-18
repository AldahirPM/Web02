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
        if(isset($_GET['idcli'])){
            $idcli=$_GET['idcli'];
       
            $sql = "update producto set  nombre = '$nombre'  , precio =  $precio ,id_usu= $idcli , id_cat = $categoria where id = $id";


        }elseif(!isset($_GET['idcli'])){
            
            $sql = "update producto set  nombre = '$nombre'  , precio =  $precio ,id_usu= null , id_cat = $categoria where id = $id";
        }

        $consulta = mysqli_query($con , $sql);
        if($consulta){

            if(isset($_GET['idcli'])){
               //resolver problema de envios
                header("location:editarproducto.php?idpro=$id&idcli=$idcli");
                $_SESSION['completado'] ="¡Su producto se  guardo con exito!, puedes ver tu producto en "."<a href='index.php?id=$idcli'>CRUD-PEDRO</a>";
                

            }else{
                header("location:editarproducto.php?idpro=$id");
                $_SESSION['completado'] ="¡Su producto se  guardo con exito!, puedes ver tu producto en "."<a href='index.php'>CRUD-PEDRO</a>";
                
            }
        }
        else{
            
            $_SESSION['errores']['general'] = "Fallo en la insercion  del producto";
            
        }

    }else{
        header("location:editarproducto.php?idpro=$id");
        $_SESSION['errores']= $error;
    }
} 


?>
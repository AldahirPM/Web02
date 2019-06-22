<?php 
 require_once 'includes/conexion.php';
if(isset($_POST)){
   

    $nombre = isset($_POST['producto']) ? $_POST['producto'] : false;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
    $categoria =isset($_POST['categoria']) ? (int)($_POST['categoria']):false;
    $cantidad =isset($_POST['cantidad']) ? (int)($_POST['cantidad']):false;


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
    if(!empty($cantidad) && is_numeric($cantidad)){
        $cantidad_validada = true ;
    }else{
        $cantidad_validada = false;
        $error['cantidad']= "Ingrese una cantidad";
    }
    
    $guardar_datos =  false;
    if(count($error) == 0)
    {
        $guardar_datos =  true;
        
        if(isset($_GET['idcliente'])){
            $idcli=$_GET['idcliente'];
            $sql = "insert into producto values(null, '$nombre',$precio , $categoria,$idcli, $cantidad )";
            

        }elseif(!isset($_GET['idcliente'])){
            
            $sql = "insert into producto values(null, '$nombre',$precio , $categoria,null, $cantidad )";
        }
            $consulta =mysqli_query($con , $sql); 
        if($consulta){

            if(isset($_GET['idcliente'])){
               //resolver problema de envios
                header("location:nuevoproducto.php?idcli=".$idcli);
                $_SESSION['completado'] ="¡Su producto se  guardo con exito!, puedes ver tu producto en "."<a href='index.php?id=$idcli'>CRUD-PEDRO</a>";
                

            }else{
                $_SESSION['completado'] ="¡Su producto se  guardo con exito!, puedes ver tu producto en "."<a href='index.php?dato=pee4o'>CRUD-PEDRO</a>";
                header("location:nuevoproducto.php");
            }
        }
        else{
            $_SESSION['errores']['general'] = "Fallo en la insercion  del producto";
        }
        
    }else{ 
           $_SESSION['errores'] = $error;
    }
} 
var_dump($consulta);
?>

<?php 
if(isset($_POST))
{
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $dni =  isset($_POST['dni']) ? $_POST['dni'] : false;
    $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : false;

    $error =  array();
    if(!empty($nombre) && !is_numeric($nombre)){
        $nombre_validado = true;

    }else{
        $nombre_validado = false;
        $error['nombre'] ="Escribe tu nombre";
    }
    if(!empty($dni) && is_numeric($dni)){
        $dni_validado = true;

    }else{
        $dni_validado = false;
        $error['dni'] ="Escribe tu DNI";
    }
    if(!empty($telefono) && is_numeric($telefono)){
        $telefono_validado = true;

    }else{
        $telefono_validado = false;
        $error['telefono'] ="Escribe tu telefono";
    }
    $guardar_cliente = false ; 
    if(count($error) == 0){
        $guardar_cliente = true;
        
        $vali_dni = "select* from usuario  where  dni =  $dni";
        $verifica = mysqli_query($con , $vali_dni);

        if($verifica && mysqli_num_rows($verifica) >= 1){
            
            header("location:registracliente.php");
            $_SESSION['usuexiste'] = "El DNI $dni  ya existe, por favor ingrese otro DNI"; 
        }else{
            $sql= "insert into usuario values(null,$dni, '$nombre' , $telefono ,NOW())";      
            $guardar= mysqli_query($con,$sql);
            if($guardar){
                $_SESSION['completado'] = "Registrado"; 
            }else{
                $_SESSION['errores']['general'] = "Fallo en el registro";
            }
        }    
    }else{
        $_SESSION['errores'] = $error;
    }
}
header("location:registracliente.php");
?>
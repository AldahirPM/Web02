<?php 
if($_POST){
    require_once 'includes/conexion.php';

    $buscar = isset($_POST['dni']) ? (int) $_POST['dni'] : false;

    $error= array();
    if(!empty($buscar) && is_numeric($buscar)){
        $buscador = true;
    }else{
        $buscador=  false;
        $error['dni']= "Escribe tu dni";
        
    }
    $buscar_dni = false;
    if(count($error) == 0 ){
        $buscador_dni= true;

        $sql= "select *  from  usuario  where  dni = $buscar";
        $verifica = mysqli_query($con , $sql);

        if($verifica && mysqli_num_rows($verifica)==1){
            $cliente = mysqli_fetch_assoc($verifica);
            $_SESSION['cliente']=$cliente;
            $url=$_SESSION['cliente']['id_u']; //usar el md5s
            header("location:index.php?id=$url");
        }else{
            header("location:datoscompra.php");
            if(isset($verifica)){
                $_SESSION['errores']['general'] = "Usted no es cliente";
            }
        }
        
    }else{
        $_SESSION['errores'] = $error;
        header("location:datoscompra.php");
    }
}




?>
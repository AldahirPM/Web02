<?php 
if($_POST){
    require_once 'includes/conexion.php';

    $buscar = isset($_POST['dni']) ? $_POST['dni'] : false;

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

        $sql= "select *  from  producto  where  dni = $buscar";
        $consulta = mysqli_query($con , $sql);
        if($consulta){
            $_SESSION['completado'] = "index.php">CRUD-PEDRO</a>';
        }else{
            $_SESSION['errores']['general'] = "Fallo en la insercion del producto ";
        }



    }




}

?>
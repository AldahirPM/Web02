<?php 
if(isset($_GET)){
    require_once 'includes/conexion.php';

    $id =$_GET['idpro'];
    $sql="delete from producto where id = $id";
    $sqldos="delete from insert_producto where id = $id";
    $eliminar = mysqli_query($con , $sql);
    $eliminardos = mysqli_query($con , $sqldos);


    if(isset($_GET['idcli'])){
        header("Location: index.php?id=".$_GET['idcli']);
        
    }else{
        header("Location: index.php?dato=pee4o");
    }
}
?>
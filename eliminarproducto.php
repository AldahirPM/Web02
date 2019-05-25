<?php 
if(isset($_GET)){
    require_once 'includes/conexion.php';

    $id =$_GET['id'];
    $sql="delete from producto where id = $id";
    $eliminar = mysqli_query($con , $sql);

}
header("Location: index.php");
?>
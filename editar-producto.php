<?php
if(isset($_GET)){
    require_once 'includes/conexion.php';
    $id = isset($_GET['id']) ?  $_GET['id']: false;
    $nombre =  isset($_POST['producto']) ? $_POST['producto']: false;
    $precio =  isset($_POST['precio']) ? $_POST['precio']: false;
    $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;

    $sql = "update producto set  nombre = '$nombre'  , precio =  $precio , id_cat = $categoria where id = $id";
    $consulta = mysqli_query($con , $sql);
        
} 
header("Location:index.php");
?>
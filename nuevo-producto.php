<?php 
 require_once 'includes/conexion.php';
if(isset($_POST)){
   
    $nombre = isset($_POST['producto']) ? $_POST['producto'] : false;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
    //$categoria = $_POST['categoria'];

    $sql = "insert into producto values(null, '$nombre',$precio ,1)";
    $consulta =mysqli_query($con , $sql);
}
header("Location: index.php")



?>
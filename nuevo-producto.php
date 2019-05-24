<?php 
 require_once 'includes/conexion.php';
if(isset($_POST)){
   
    $nombre = isset($_POST['producto']) ? $_POST['producto'] : false;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
    $categoria =isset($_POST['categoria']) ? (int)($_POST['categoria']):false;

     

    $sql = "insert into producto values(null, '$nombre',$precio , $categoria)";
    $consulta =mysqli_query($con , $sql);
}

header("Location: index.php")



?>
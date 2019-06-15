<?php
require_once 'includes/conexion.php';
$sql ="create event  eliminar on schedule at current_timestamp() + interval 1 second do truncate  table insert_producto" ;
$evento= mysqli_query($con,$sql);
header("location:datoscompra.php");
?>

<?php
require_once 'includes/conexion.php';
$sql ="CREATE EVENT eliminar
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 5 second
DO truncate  table insert_producto  
" ;
$consulta 
?>

<?php   
require_once 'conexion.php';
if(!isset($_SESSION['cliente'])){
    header("Location:datoscompra.php");
}
?>
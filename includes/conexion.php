<?php 
$con =  new mysqli('localhost','root','', 'sysbasic' );
/*if(isset($con)){
    echo "conexion establecida ";
}else{
    echo "error en la conexion";
}*/
$sql = "SET GLOBAL event_scheduler = ON";
$on= mysqli_query($con,$sql);
session_start();
?>      
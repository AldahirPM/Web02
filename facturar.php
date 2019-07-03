<?php
require __DIR__ .'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$condicion = true;
ob_start();  
require 'index.php';
$pedro =isset($usuario['nom']) ? $usuario['nom'] : '-';
?>

<label for=""><strong>Nombre:   <?php echo $pedro?> </strong></label>

<?php

$html = ob_get_clean();


$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8'); //papel , tamaño , español , verdadero, acentos
$html2pdf->writeHTML($html);
$html2pdf->output('pdf_generate.pdf');  
 
    /*require_once 'includes/conexion.php';
    $sql ="create event  eliminar on schedule at current_timestamp() + interval 1 second do truncate  table insert_producto" ;
    $evento= mysqli_query($con,$sql);
   header("location:datoscompra.php");*/
?>

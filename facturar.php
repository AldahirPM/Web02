<?php
require __DIR__ .'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$condicion = true;
ob_start();  
require 'index.php';


?>  
<style type="text/css">
 
    .celda{
        width: 366px;
        height: 20px;
    }  
    #main-container{
        margin:100px;
        
    }
    table{
        background:white;
        margin:auto;
        text-align:left;
    }
    .result,.titulo{
        padding:10px;
        
        text-align:center;
        
    }
    .titulo{
        background-color:#246255;
        border-botton:solid 1px #0f362d;
        color:white;
    }
   
    img{
        width:190px;
    }
    

    
.table-header{
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: none;
    margin-top:25px;
    margin-bottom:0;
}
.table-header tr td{
    padding:0;
}

.right{
    text-align:right;
    right:20px;
}
.td {
    color: rgba(31, 31, 31, 0.972);
    font-weight: bold;
    width: 120px;
}
.td-2{
    color: rgba(31, 31, 31, 0.972);
    font-weight: bold;
}
/* .td-cont{
    width: 120px;
}
.td-cont-2{
    width: 170px;
}
.titulo{
    color:#0a2973bd;
    / font-size: 16.5px; 
    font-weight: normal;
    margin: 30px 0px 10px 0px;
} */

    
    
    
</style>
        <table class='table-header'>
            <tr>
                <td rowspan="3" style='width:45px;'>
                    <img src="https://mir-s3-cdn-cf.behance.net/projects/404/8a497a61038275.Y3JvcCwxMTAyLDg2Miw3OCww.png" alt="" height='50px'>
                </td>
                <td>
                    UNIVERSIDAD NACIONAL DE INGENIERIA
                </td>
                <td class="right">
                    <?php echo "FECHA: ".date("d/m/Y") ?>
                </td>
            </tr>
            <tr>
                <td>FACULTAD DE INGENIERIA MECANICA</td>
                <td class="right">
                    <?php echo "HORA: ".date("h:m:s A");?>
                </td>
            </tr>
            <tr>
                <td>OERAAE</td>
                <td></td>
            </tr>
        </table>
        <!-- <div id="header-tabla"> -->
            <!-- <table border="0"  id="img-logo">
                <tr>
                    <td width="800px"><img src="https://mir-s3-cdn-cf.behance.net/projects/404/8a497a61038275.Y3JvcCwxMTAyLDg2Miw3OCww.png" alt=""></td>
                    
                    <td><h1>Reporte de Pedro Macaco SAC</h1></td>
                    
                </tr>
                
            </table> -->
        <!-- </div> -->
    
        <table> 
        <tr>
            <td class="celda">
            <label for=""><strong>Empresa:</strong> Tambo S.A.C </label>
            </td>
            <td>
                <label for=""><strong>Local:</strong> Tambo Independencia </label>
            </td>
        </tr>
        <tr>
            <td  class="celda">
            <label for=""><strong>N° RUC:</strong> 10103830482</label>
            </td>
            <td>
                <label for=""><strong>Fecha de inscripcion:</strong><?php echo isset($usuario['fecha']) ? $usuario['fecha'] : '-'?></label>
            </td>
        </tr>
        <tr>
            <td  class="celda">
                <label for=""><strong>Nombre:</strong><?php echo isset($usuario['nom']) ? $usuario['nom'] : '-';?></label>
            </td>  
            <td>
                <label for=""><strong>DNI:</strong><?php echo isset($usuario['dni']) ? $usuario['dni'] : '-' ?> </label>
            </td> 
        </tr>
        <tr>
            <td  class="celda">
                <label for=""><strong>Telefono:</strong><?php echo isset($usuario['telefono']) ? $usuario['telefono'] : '-'?></label>
            </td>
            <td>
                <strong>Fecha de la compra:</strong>  <?php echo date("d/m/Y"); ?>
            </td>
        </tr>
    </table>

    <div id="main-container">
        <table id="tabla-producto">
            <thead>
                <tr>
                    <th class="titulo">Nombre del Producto</th>
                    <th class="titulo">Cantidad</th>
                    <th class="titulo">Precio Unitario</th>
                    <th class="titulo">Precio Total</th>
                    
                </tr>
            </thead>
            <tbody >
                        <?php
                        if($productos && mysqli_num_rows($productos)>=1):
                        while($producto = mysqli_fetch_assoc($productos)):?>
                        <?php  $product = $producto  ?>
                        <tr>
                            
                            <td class="result"><?= $product['nombre'] ?></td>
                            <!-- <td><?= $product['nomcat']?></td> -->
                            <td class="result"><?=$product['cant_pro']?></td>
                            <td class="result">S/<?=$product['precio']?></td>
                            <td class="result">S/<?=$product['Total']?></td>
                            
                        </tr>
                        <?php endwhile;?>
                        <?php else:?>
                            <tr>
                                <td>#</td>
                                <td>#</td>
                                <!-- <td>NO </td> -->
                                <td>REALIZO</td>
                                <td>Compra</td>
                                <td>#</td>
                                <td>#</td>
                            </tr>           
                        <?php endif; ?>
                        <tr>
                            <td class="result" ></td>
                            <!-- <td></td> -->
                            <td class="result"></td>
                            <td class="result"><strong>TOTAL</strong></td>
                            <?php while($totalproducto = mysqli_fetch_assoc($total)):?>    
                                <?php //if(empty($totalproducto['Total'])):?>
                                        <td class="result"><strong>S/<?= round(($totalproducto['Total']),2)?></strong></td>
                                        
                                <?php //endif; ?>
                            <?php endwhile;?>
                        </tr>
                    </tbody>
        </table>
    </div>





<?php

$html = ob_get_clean();


$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8'); //papel , tamaño , español , verdadero, acentos
$html2pdf->writeHTML($html);
$html2pdf->output('pdf_generate.pdf');  
//  ECHO $html;
    /*require_once 'includes/conexion.php';
    $sql ="create event  eliminar on schedule at current_timestamp() + interval 1 second do truncate  table insert_producto" ;
    $evento= mysqli_query($con,$sql);
   header("location:datoscompra.php");*/

   header("location=datoscompra.php");
?>
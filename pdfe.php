<?php
require_once './vendor/autoload.php';
setlocale(LC_TIME, 'spanish');
setlocale(LC_TIME, 'es_ES.UTF-8');
date_default_timezone_set('America/Bogota');
ob_start();
require './index.php';
$html= ob_get_clean();
$mpdf = new \Mpdf\Mpdf([
    "format" => "",
    'default_font' => 'tharlon',
    'mode' => 'c',
    'margin_left'=>12,
    'margin_right'=>12,
    'margin_top'=>18,
    'margin_bottom'=>13
]);
//print_r($html);
    
$mpdf->allow_charset_conversion=true;
//$mpdf->WriteHTML(file_get_contents('public/assets/matricula/css/boleta.css'),1);
//$mpdf->WriteHTML($html,0);
//$mpdf->setHtmlHeader("Soy Pedro");
$mpdf->setHtmlFooter(utf8_encode('
          <table style="width:100%;font-size:9px;">
                  <tr>
                      <td>'.strtoupper(strftime("%A, %d de %B del %Y a las %I:%M ",time()).((strftime("%H",time())>=12)?"PM":"AM")).'
                      </td>
                      <td><b>PAG. {PAGENO} / {nbpg}</b></td>
                  </tr>
          </table>'));
$mpdf->WriteHTML($html);
$mpdf->Output('miprueba.pdf', 'I');
?>
<!DOCTYPE html>

<?php

require_once("class/config.php"); 

  if(isset($_SESSION["backend_id"]) and isset($_SESSION["nombre"]) and isset($_SESSION["cedula"])){

require_once("class/ventasModulo.php");
require_once("class/configuracionModulo.php");

$ventas=new Ventas();

$informacion_empresa=new Configuracion();


$datos=$ventas->get_ventas();

$datos_empresa=$informacion_empresa->get_configuracion();


ob_start();

error_reporting(E_ERROR);
?>
<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon.ico">
<link type="text/css" rel="stylesheet" href=""/>
<style type="text/css">

.Estilo7 {font-size: 12px}
.Estilo8 {
  font-size: 10px;
  font-weight: bold;
}
.Estilo9 {font-size: 10px}
.Estilo10 {font-size: 9px; font-weight: bold; }
.Estilo11 {color: #FFFFFF}
</style>

<table style="width: 100%;" class="header">
	<tr>
		<td width="54%" height="111"><h1 style="text-align: left; margin-right:20px;"><img src="public/images/logo sena sistema.png" width="340" height="109"  /></h1></td>
		<td width="46%">
	</tr>
	</table>
 
<table width="100%" class="change_order_items" align="center">
 	<tr>
  		<th colspan="7">LISTADO GENERAL DE VENTAS </th>
  	</tr>
 	<tr>
 		<th width="10%" bgcolor="#317eac"><span class="Estilo11">N&ordm;</span></th>
		<th width="30%" bgcolor="#317eac"><span class="Estilo11">PRODUCTO</span></th>
		<th width="10%" bgcolor="#317eac"><span class="Estilo11">CANTIDAD</span></th>
		<th width="15%" bgcolor="#317eac"><span class="Estilo11">PRECIO</span></th>
		<th width="15%" bgcolor="#317eac"><span class="Estilo11">PRECIO TOTAL</span></th>
		<th width="20%" bgcolor="#317eac"><span class="Estilo11">FECHA</span></th>
 	</tr>
 	<?php
	  	for($i=0;$i<sizeof($datos);$i++) {
  	?>
 	<tr>
		<td><div align="center"><span class="Estilo3"><?php echo $datos[$i]['idventas']; ?></span></div></td>
		<td><div align="center"><span class="Estilo3"><?php echo $datos[$i]['venta_producto']; ?></span></div></td>
		<td style="text-align: center"><div align="center"><span><?php echo $datos[$i]['cantidad']; ?></span></div></td>
		<td style="text-align: center"><div align="center"><span><?php echo $datos[$i]['venta_precio']; ?></span></div></td>
		<td style="text-align: center"><div align="center"><span><?php $precio_total=$datos[$i]["cantidad"]*$datos[$i]["venta_precio"]; echo $precio_total; ?></span></div></td>
		<td style="text-align: right"><div align="center"><span><?php echo $datos[$i]['fecha']; ?></span></div></td>
	</tr>
	<?php } ?> 	
 </table></html>
 
 <?php

require_once("public/dompdf/dompdf_config.inc.php");
$dompdf=new DOMPDF();
$dompdf->set_paper(array(0,0,1000,1000));
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf=$dompdf->output();
$filename="recibo.pdf";
$dompdf->stream($filename, array("Attachment"=>0));
	  } else{

     require_once("index.php");
  }
    
    
?>
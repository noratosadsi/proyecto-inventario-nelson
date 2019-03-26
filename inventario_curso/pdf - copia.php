<!DOCTYPE html>

<?php

require_once("class/config.php"); 

  if(isset($_SESSION["backend_id"]) and isset($_SESSION["nombre"]) and isset($_SESSION["cedula"])){

require_once("class/clientesModulo.php");
require_once("class/configuracionModulo.php");

$clientes=new Clientes();

$informacion_empresa=new Configuracion();


$datos=$clientes->get_clientes();

$datos_empresa=$informacion_empresa->get_configuracion();


ob_start();
?>
<!--
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
 
<table width="100%" class="change_order_items">
 	<tr>
  		<th colspan="7">LISTADO GENERAL DE VENTAS </th>
  	</tr>
 	<tr>
 		<th width="5%" bgcolor="#317eac"><span class="Estilo11">N&ordm;</span></th>
		<th width="8%" bgcolor="#317eac"><span class="Estilo11">PRODUCTO</span></th>
		<th width="15%" bgcolor="#317eac"><span class="Estilo11">CANTIDAD</span></th>
		<th width="15%" bgcolor="#317eac"><span class="Estilo11">DESCRIPCION PRODUCTO</span></th>
		<th width="7%" bgcolor="#317eac"><span class="Estilo11">PRECIO</span></th>
		<th width="38%" bgcolor="#317eac"><span class="Estilo11">PRECIO TOTAL</span></th>
		<th width="30%" bgcolor="#317eac"><span class="Estilo11">FECHA</span></th>
 	</tr>
 	<?php
	  	//for($i=0;$i<sizeof($datos);$i++) {
  	?>
 	<tr>
		<td><div align="center"><span class="Estilo3"><?php echo $datos[$i]['cod_cliente']; ?></span></div></td>
		<td><div align="center"><span class="Estilo3"><?php echo $datos[$i]['ced_cliente']; ?></span></div></td>
		<td style="text-align: center"><div align="center"><span><?php echo $datos[$i]['nom_cliente']; ?></span></div></td>
		<td style="text-align: center"><div align="center"><span><?php echo $datos[$i]['ape_cliente']; ?></span></div></td>
		<td style="text-align: center"><div align="center"><span><?php echo $datos[$i]['tlf_cliente']; ?></span></div></td>
		<td style="text-align: right"><div align="center"><span><?php echo $datos[$i]['direc_cliente']; ?></span></div></td>
		<td style="text-align:center"><div align="center"><span><?php echo $datos[$i]['fecha']; ?></span></div></td>
	</tr>
	<?php //} ?> 	
 </table></html>-->
 
 <?php
  
 $salida_html = ob_get_contents();
  ob_end_clean(); 

    require_once("public/dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("pdf.pdf", array('Attachment'=>'0'));

	  } else{

     require_once("index.php");
  }
    
    
?>
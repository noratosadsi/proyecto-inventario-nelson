<!DOCTYPE html>

<?php

ob_start(); 

   
?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	</head></html>
 
  
<html><table style="width: 100%;" class="header">
<tr><td width="54%" height="111"><h1 style="text-align: left; margin-right:20px;"><img src="public/images/logo_vertical.jpg" width="340" height="109"  /></h1></td>
<td width="46%"></tr>
</table></html>
 
 
<html><table width="100%" class="change_order_items">
<tbody>
<tr>
  <th colspan="7">LISTADO GENERAL DE CLIENTES </th>
  </tr>
<tr>
<th width="5%" bgcolor="#317eac"><span class="Estilo11">N&ordm;</span></th>
<th width="8%" bgcolor="#317eac"><span class="Estilo11">CEDULA</span></th>
<th width="15%" bgcolor="#317eac"><span class="Estilo11">NOMBRES</span></th>
<th width="15%" bgcolor="#317eac"><span class="Estilo11">APELLIDOS</span></th>
<th width="7%" bgcolor="#317eac"><span class="Estilo11">TELEFONO</span></th>
<th width="38%" bgcolor="#317eac"><span class="Estilo11">DIRECCIÓN</span></th>
<th width="30%" bgcolor="#317eac"><span class="Estilo11">FECHA</span></th>
</tr>
<?php
for($i=0;$i<sizeof($datos);$i++) {
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
<?php } ?>
</tbody>
</table></html>

 <?php
  
  $salida_html = ob_get_contents();
  ob_end_clean(); 

    require_once("public/dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Listado de Clientes.pdf", array('Attachment'=>'0'));

    
?>
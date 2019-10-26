<?php
  
  require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

  	require_once("class/ventasModulo.php");

  	$ventas=new Ventas();

  	$datos=$ventas->get_ventas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php require_once("head.php");?>
	<?php require_once("header_css_tabla.php");?>
</head>
<body>

	<div class="container-fluid">
		
		 <?php require_once("menu_principal.php");?>

		 <div class="container-fluid">
		 	 <div class="row">
		 	 	<div class="col-sm-1">
		 	 		<?php require_once("menu_lateral.php");?>
		 	 	</div>

		 	 	<div class="col-sm-11">
		 	 		
		 	 		<div class="panel-cliente">
		 	 			<ol class="breadcrumb">
						  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>ventas.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> VENTAS</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>agregar_venta.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> NUEVA VENTA</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>PDF.PHP"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>LISTADO DE VENTAS EN PDF</a></li>
						</ol>
		 	 		</div>

		 	 		<div class="panel panel-default">
		 	 			
                       <div class="panel-heading">
                       	 <h3 class="panel-title"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> CONSULTA GENERAL DE VENTAS</h3>
                       </div>

                       <div class="panel-body">
                       	    
                       	    <table class="table" id="myTable">
                       	    	
                       	      <thead>
                       	      	<tr>
	                       	      	<th>ID VENTAS</th>
	                       	      	<th>VENTA</th>		
	                       	      	<th>DESCRIPCION</th>		
	                       	      	<th>CANTIDAD</th>
	                       	      	<th>PRECIO UNIDAD</th>
									<th>PRECIO TOTAL</th>
	                       	      	<th>FECHA</th>
	                       	      	<th>CLIENTE</th>
	                       	     <!-- 	<th>Acciones</th>-->
                       	        </tr>
                       	      </thead>
                             
                       	      <tbody>
                       	      	<?php for($i=0;$i<sizeof($datos);$i++){?>
                       	      	 <tr>
                       	      	 	<td><?php echo $datos[$i]["idventas"];?></td>
                       	      	 	<td><?php echo $datos[$i]["venta_producto"];?></td>
                       	      	 	<td><?php echo $datos[$i]["venta_descripcion"];?></td>
                       	      	 	<td><?php echo $datos[$i]["cantidad"];?></td>
                       	      	 	<td><?php echo $datos[$i]["venta_precio"];?></td>
                       	      	 	<td name="precio_total"><?php $precio_total=$datos[$i]["cantidad"]*$datos[$i]["venta_precio"]; echo $precio_total;?></td>
                       	      	 	<td><?php echo Conectar::invierte_fecha($datos[$i]["fecha_ventas"])?></td>
                       	      	 	<td><?php echo $datos[$i]["nombre"];?></td>
									<!--
                       	      	 	<td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_venta.php?id_venta=<?php echo $datos[$i]["idventas"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>  <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_cliente.php?id_cliente=<?php echo $datos[$i]["cod_cliente"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></td>
									-->
                       	      	 </tr>
                       	      	 <?php } ?>
                       	      </tbody>
                       	    </table>
                       </div>
		 	 		</div><!--panel default-->
		 	 	</div><!--col-sm-8-->
		 	 </div><!--row-->
		 </div><!--container-fluid-->
	</div>


	

	<?php require_once("footer_js_tabla.php");?>

	
</body>
</html>

<?php
  
  } else {

  	   header("Location:".Conectar::ruta()."index.php");
  	   
  }

?>
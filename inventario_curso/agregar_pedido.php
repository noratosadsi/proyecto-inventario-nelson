<?php
  
  require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

  	require_once("class/proveedoresModulo.php");

  	$pedido=new Proveedores();

    $proveedor=$pedido->get_proveedores();
	
	//ver los productos
	
	require_once("class/entradasModulo.php");
	$productos=new Entradas();
	$producto=$productos->get_entradas();

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
	  $pedido->agregar_orden();
	  //$pedido->get_orden();
      $pedido->agregar_pedido();
       exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php require_once("head.php");?>
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

	 	   	  	  	<div class="panel-pedido">
		  				 <ol class="breadcrumb">
							  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>proveedores.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Proveedores</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_proveedor.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nuevos Proveedores</a></li>
							  <li><a href="<?php echo Conectar::ruta()?>pedidos.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Pedidos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_pedido.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Nuevos Pedidos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>reporte_pedidos.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Reporte Pedidos</a></li>
						</ol>
		  			</div>

		  			<?php if(isset($_GET["m"]))
                       
                       switch($_GET["m"]){
                          
                          case "1";
                          ?>
                          <h2>los campos estan vacios</h2>
                          <?php 
                          break;

                          case "2";
                          ?>
                          <h2>se agregó el pedido</h2>
                          <?php 
                          break;
                       }
		  			?>

		  			<div class="panel panel-default">
		  				 
		  				 <div class="panel-heading">
		  				 	<h3 class="panel-title">
		  				 		<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar Pedido
		  				 	</h3>
		  				 </div>

		  				 <div class="panel-body">
		  				 	  
		  				 	  <form action="" class="form-horizontal" method="post">
		  				 	  	<!-- Ingresaba cualquier producto sin estar registrado en la tabla productos
		  				 	  	  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	<input type="text" name="pedido_producto" class="form-control" placeholder="pedido producto">
		  				 	  	     </div>
		  				 	  	  </div>
								-->

								 <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">PRODUCTO</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	 
		  				 	  	     	 <select name="producto" class="form-control" >
		  				 	  	     	 	
		  				 	  	     	 	<option value="0">SELECCIONE</option>

		  				 	  	     	 	 <?php
                                                for($i=0; $i<sizeof($producto);$i++){
                                                    
                                                    ?>
                                                     <option value="<?php echo $producto[$i]["idproductos"];?>"><?php echo $producto[$i]["nombre"];?></option>
                                                    <?php
                                                }
		  				 	  	     	 	 ?>
		  				 	  	     	 </select>
		  				 	  	     </div>
		  				 	  	  </div>

		  				 	  	  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Descripción Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	<input type="text" name="pedido_descripcion" class="form-control" placeholder="descripcion producto">
		  				 	  	     </div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Cantidad Pedido</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	<input type="text" name="cantidad_pedido" class="form-control" placeholder="cantidad pedido">
		  				 	  	     </div>
		  				 	  	  </div>
								  
								  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">PRECIO UNIDAD</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	<input type="text" name="precio_pedido" class="form-control" placeholder="precio unidad">
		  				 	  	     </div>
		  				 	  	  </div>
								  
								 
								  

		  				 	  	  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Proveedor Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	 
		  				 	  	     	 <select name="proveedor" class="form-control" >
		  				 	  	     	 	
		  				 	  	     	 	<option value="0">SELECCIONE</option>

		  				 	  	     	 	 <?php
                                                for($i=0; $i<sizeof($proveedor);$i++){
                                                    
                                                    ?>
                                                     <option value="<?php echo $proveedor[$i]["idproveedor"];?>"><?php echo $proveedor[$i]["nombre_proveedor"];?></option>
                                                    <?php
                                                }
		  				 	  	     	 	 ?>
		  				 	  	     	 </select>
		  				 	  	     </div>
		  				 	  	  </div>

		  				 	  	  
		  				 	  	     
		  				   

		  				 	  	  <input type="hidden" name="grabar" value="si">

		  				 	  	  <button type="submit" class="btn btn-default col-sm-offset-2">REGISTRAR</button>
		  				 	  </form>
		  				 </div>
		  			</div>
	 	   	  	  	
	 	   	  	  </div><!--col sm 8-->
	 	   	  </div>
	 	   </div><!--container fluid-->
	 </div>
	    
	    <?php //require_once("footer.php");?>
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>
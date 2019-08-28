<?php
  
  require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

  	require_once("class/proveedoresModulo.php");

  	$pedido=new Proveedores();

  	$datos=$pedido->get_pedido_por_id($_GET["id_pedido"]);

    $proveedor=$pedido->get_proveedores();
	
	if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
       $pedido->editar_pedido();
       exit();
    }
	require_once("class/entradasModulo.php");
	$productos=new Entradas;
	$producto=$productos->get_entradas();
	
  
	

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
							  <li><a href="<?php echo Conectar::ruta();?>"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Reporte Pedidos</a></li>
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
                          <h2>se editó el pedido</h2>
                          <?php 
                          break;
                       }
		  			?>

		  			<div class="panel panel-default">
		  				 
		  				 <div class="panel-heading">
		  				 	<h3 class="panel-title">
		  				 		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar Pedido
		  				 	</h3>
		  				 </div>

		  				 <div class="panel-body">
		  				 	  
		  				 	  <form action="" class="form-horizontal" method="post">
								  
								 
		  				 	  	
		  				 	  	  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Pedido Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
										 
										  <script>
 
									/**
									* Función que recibe el objeto seleccionado
									*
									* objeto.value contiene el value del elemento seleccionado
									* objeto[value].innerHTML contiene el texto del valor seleccionado
									*/
									function mostrar(objeto)
									{
										if(objeto.value==0)
										{
											document.getElementById("idSeleccionado").value="";
											document.getElementById("textoSeleccionado").value="";
										}else{
												document.getElementById("idSeleccionado").value=objeto.value;
												document.getElementById("textoSeleccionado").value=objeto[objeto.value].innerHTML;
											}
									}
									</script>
										 
										<select name="cod_material" class="form-control" onchange="mostrar(this)">
											 
		  				 	  	     	 	<?php
												for($i=0; $i<sizeof($producto);$i++){
													if($datos[0]["idproductos"]==$proveedor[$i]["idproductos"]){
																			
											?>
										<option value="<?php echo $producto[$i]["idproductos"];?>" selected="selected"><?php echo $producto[$i]["nombre"];?></option>
                      
											<?php
                                                
												} else { 
                                                 
											?>
										<option value="<?php echo $producto[$i]["idproductos"];?>"><?php echo $producto[$i]["nombre"];?></option>
                    
											<?php

												}

												}
											?>
		  				 	  	     	</select>
		  				 	  	     </div>
		  				 	  	  </div>
							
		  				 	  	  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Descripción Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	<input type="text" name="material_pedido" class="form-control" placeholder="descripcion producto" value="<?php echo $datos[0]["descripcion_pedido"];?>">
		  				 	  	     </div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Cantidad Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	<input type="text" name="cantidad_pedido" class="form-control" placeholder="cantidad producto" value="<?php echo $datos[0]["cantidad_pedido"];?>">
		  				 	  	     </div>
		  				 	  	  </div>

		  				 	  	  <div class="form-group">
		  				 	  	  	 <label for="" class="col-sm-2 control-label">Proveedor Producto</label>
		  				 	  	     
		  				 	  	     <div class="col-sm-6">
		  				 	  	     	 
		  				 	  	     <select name="proveedor" class="form-control">
		  				 	  	     	 	
		  				 	  	     	

		  				 	  	     	 	 <?php
                                   for($i=0; $i<sizeof($proveedor);$i++){


           if($datos[0]["idproveedor"]==$proveedor[$i]["idproveedor"]){
                                                    
                        ?>
    <option value="<?php echo $proveedor[$i]["idproveedor"];?>" selected="selected"><?php echo $proveedor[$i]["nombre_proveedor"];?></option>
                      
                      <?php
                                                
                     } else { 
                                                 
                     ?>
                   <option value="<?php echo $proveedor[$i]["idproveedor"];?>"><?php echo $proveedor[$i]["nombre_proveedor"];?></option>
                    
                     <?php

                     }

                    }
		           ?>
		  				 	  	     	 </select>
		  				 	  	     </div>
		  				 	  	  </div>

		  				 	  	  
		  				 	  	     
		  				   

		  				 	  	  <input type="hidden" name="grabar" value="si">

		  				 	  <input type="hidden" name="id" value="<?php echo $_GET["id_pedido"];?>">

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